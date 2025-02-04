{{-- resources/views/site/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Site</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sites.update', $site->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome do Site</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $site->nome) }}" required>
        </div>

        <div class="form-group">
            <label for="url">URL do Site</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $site->url) }}" required>
        </div>

        <div class="form-group">
            <label for="foto_principal">Foto Principal</label>
            <input type="file" name="foto_principal" id="foto_principal" class="form-control">
            @if($site->foto_principal)
                <img src="{{ asset('storage/' . $site->foto_principal) }}" alt="Foto Principal" class="img-fluid mt-2">
            @endif
        </div>

        <div class="form-group">
            <label for="imagens">Imagens do Site</label>
            <input type="file" name="imagens[]" id="imagens" class="form-control" multiple>
            @foreach($imagens as $imagem)
                <img src="{{ asset('storage/' . $imagem->imagem) }}" alt="Imagem do site" class="img-fluid mt-2">
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Site</button>
    </form>
</div>
@endsection
