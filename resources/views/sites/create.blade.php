<form action="{{ route('sites.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nome_site">Nome do Site</label>
    <input type="text" name="nome_site" id="nome_site" required><br>

    <label for="url_site">URL do Site</label>
    <input type="url" name="url_site" id="url_site" required><br>

    <label for="foto_principal">Foto Principal</label>
    <input type="file" name="foto_principal" id="foto_principal" required><br>

    <label for="imagens">Imagens do Site</label>
    <input type="file" name="imagens[]" id="imagens" multiple><br>

    <button type="submit">Criar Site</button>
</form>
