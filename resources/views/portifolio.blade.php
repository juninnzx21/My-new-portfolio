<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>      
        <title>Portifolio Online</title>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-Import-default-header-portifolio />
        
    </head>

<body class="index-page">
    <x-header />
    <main class="main">
        <x-section-hero />
        <x-section-about />
        <x-section-skills />
        <x-section-resume />
        <x-section-portifolio />
        <x-section-contact-me />:
    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   
    <script>
    $('#form').submit(function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        var submitButton = $('#submit-button');
        $('.loading').removeClass('d-none');
        submitButton.prop('disabled', true);

        $.ajax({
            url: '{{ route('contact.store') }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: response.message,
                    confirmButtonText: 'OK',
                });
                $('#form')[0].reset(); // Reseta o formulário
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    let errorMessages = Object.values(errors).join('\n');
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro de Validação!',
                        text: errorMessages,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: xhr.responseJSON?.message || 'Algo deu errado. Tente novamente.',
                    });
                }
            },
            complete: function () {
                $('.loading').addClass('d-none');
                submitButton.prop('disabled', false);
            },
        });
    });

    </script>

  <div id="preloader"></div>
     
    <x-import-default-vendor-js/>

    <x-footer-portifolio />


</body>

</html>