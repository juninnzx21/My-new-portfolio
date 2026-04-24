<footer class="mc-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5>MulticredBH</h5>
                <p>
                    Projeto demonstrativo de site institucional focado em serviços financeiros,
                    atendimento digital e captação de leads.
                </p>
            </div>
            <div class="col-lg-4">
                <h6>Links rápidos</h6>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url() ?>">Início</a></li>
                    <li><a href="<?= base_url() ?>sobre">Sobre</a></li>
                    <li><a href="<?= base_url() ?>servicos">Serviços</a></li>
                    <li><a href="<?= base_url() ?>atendimento-ao-cliente">Atendimento</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6>Contato</h6>
                <p>WhatsApp comercial: <a href="https://api.whatsapp.com/send?phone=553191739320" target="_blank" rel="noopener noreferrer">(31) 9173-9320</a></p>
                <p>Instagram: <a href="https://www.instagram.com/multicredbh/" target="_blank" rel="noopener noreferrer">@multicredbh</a></p>
                <form method="post" action="<?= base_url() ?>includes/process2.php" class="mt-3">
                    <div class="input-group">
                        <input name="email" class="form-control" placeholder="Seu e-mail" type="email" required>
                        <button type="submit" class="btn btn-primary">Receber novidades</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mc-footer-note text-center">
            © <?= date('Y') ?>. Demo institucional modernizada para o portfólio de Junior Rodrigues.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
