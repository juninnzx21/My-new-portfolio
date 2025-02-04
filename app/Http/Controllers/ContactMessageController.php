<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'cpf' => 'nullable|string|size:11|regex:/^\d{11}$/',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'cpf.regex' => 'O CPF deve conter apenas números (11 dígitos).',
            'cpf.size' => 'O CPF deve ter exatamente 11 dígitos.',
        ]);

        // Validar o CPF com método personalizado
        if ($validated['cpf'] && !ContactMessage::validateCpf($validated['cpf'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'O CPF informado é inválido.',
            ], 422);
        }

        // Verificar se já existe uma solicitação aberta
        $existingRequest = ContactMessage::where('telefone', $validated['telefone'])
            ->orWhere('email', $validated['email'])
            ->first();

        if ($existingRequest) {
            return response()->json([
                'status' => 'error',
                'message' => 'Já existe uma solicitação aberta com o mesmo telefone ou e-mail.',
            ], 400);
        }

        try {
            // Criar e salvar o contato
            ContactMessage::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Sua mensagem foi enviada com sucesso. Obrigado!',
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Erro ao salvar contato: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Algo deu errado. Tente novamente mais tarde.',
            ], 500);
        }
    }
}
