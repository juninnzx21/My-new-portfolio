<form action="{{ route('contact.store') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200" id="form">
    @csrf
    <div class="row gy-4">
        <!-- Mensagens de status dinâmicas -->
        <div class="col-md-12">
            <div class="alert alert-danger d-none error-message"></div> <!-- Mensagem de erro -->
            <div class="alert alert-success d-none sent-message"></div> <!-- Mensagem de sucesso -->
        </div>

        <!-- Campos do formulário -->
        <div class="col-md-6">
            <label for="name-field" class="pb-2">Your Name</label>
            <input type="text" name="name" id="name-field" class="form-control" required />
        </div>

        <div class="col-md-6">
            <label for="telefone-field" class="pb-2">Your Telephone</label>
            <input type="text" name="telefone" id="telefone-field" class="form-control" required />
        </div>        

        <div class="col-md-12">
            <label for="email-field" class="pb-2">Your Email</label>
            <input type="email" class="form-control" name="email" id="email-field" required />
        </div>
        <div class="col-md-6 d-none">
            <label for="cpf-field" class="pb-2">Your CPF (optional)</label>
            <input type="text" name="cpf" id="cpf-field" class="form-control" maxlength="11" />
        </div>
        <div class="col-md-12">
            <label for="subject-field" class="pb-2">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject-field" required />
        </div>

        <div class="col-md-12">
            <label for="message-field" class="pb-2">Message</label>
            <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
        </div>

        <div class="col-md-12 text-center">
            <div class="loading d-none">Loading...</div> <!-- Mostra enquanto está processando -->
            <button type="submit" id="submit-button" class="btn btn-primary">Send Message</button>
        </div>
    </div>
</form>
