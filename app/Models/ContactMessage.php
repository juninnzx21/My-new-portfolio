<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    // Lista de atributos que podem ser preenchidos em massa
    protected $fillable = ['name', 'email', 'telefone', 'cpf', 'subject', 'message'];

    /**
     * Valida o formato e a autenticidade do CPF.
     *
     * @param string $cpf
     * @return bool
     */

  
     // Mutator para validar CPF antes de salvar
     public function setCpfAttribute($value)
     {
         if (!empty($value) && !self::validateCpf($value)) {
             throw new \InvalidArgumentException('O CPF informado é inválido.');
         }
         $this->attributes['cpf'] = $value;
     }


    public static function validateCpf(string $cpf): bool
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $cpf);

        // Verifica se o CPF possui 11 dígitos ou é uma sequência repetida
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula os dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
