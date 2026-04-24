<section class="mc-section">
    <div class="container mc-login-shell">
        <div class="mc-surface mc-auth-card">
            <h1>Área do cliente</h1>
            <p>
                Esta tela faz parte da demonstração do fluxo institucional. O objetivo aqui é mostrar uma
                área de login com visual mais atual e navegação coerente com o restante do site.
            </p>
            <form class="mt-4">
                <div class="mb-3">
                    <label class="form-label">E-mail ou usuário</label>
                    <input type="text" class="form-control" placeholder="Digite seu acesso">
                </div>
                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Digite sua senha">
                </div>
                <div class="d-flex flex-column flex-md-row gap-3 mt-4">
                    <button type="submit" class="mc-btn-primary border-0">
                        <i class="fas fa-sign-in-alt"></i>
                        Entrar
                    </button>
                    <a href="<?= base_url() ?>cadastre-se" class="mc-btn-ghost text-dark border border-primary-subtle">
                        <i class="fas fa-user-plus"></i>
                        Criar cadastro
                    </a>
                </div>
            </form>
            <div class="mt-4">
                <a href="<?= base_url() ?>esqueci-minha-senha">Esqueceu sua senha?</a>
            </div>
        </div>
    </div>
</section>
