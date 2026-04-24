<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="assets/img/eu.jpg" alt="Portrait of Junior Rodrigues" class="img-fluid rounded-circle">
    </div>

    <a href="{{ url('/') }}" class="logo d-flex align-items-center justify-content-center">
       <h1 class="sitename">Junior Rodrigues</h1>
    </a>

    <div class="social-links text-center">
        <a target="_blank" rel="noopener noreferrer" href="https://api.whatsapp.com/send?phone=5531993239198&amp;" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://x.com/Juninnzx1" class="twitter" aria-label="X"><i class="bi bi-twitter-x"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/juninnzx.1/" class="instagram" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/junior-rodrigues-68961b288/" class="linkedin" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://github.com/juninnzx21" class="github" aria-label="GitHub"><i class="bi bi-github"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}" class="active"><i class="bi bi-house navicon"></i><span data-i18n="nav.home">Home</span></a></li>
        <li><a href="{{ url('/') }}#about"><i class="bi bi-person navicon"></i> <span data-i18n="nav.about">About</span></a></li>
        <li><a href="{{ url('/') }}#resume"><i class="bi bi-file-earmark-text navicon"></i> <span data-i18n="nav.experience">Experience</span></a></li>
        <li><a href="{{ url('/') }}#portfolio"><i class="bi bi-images navicon"></i> <span data-i18n="nav.projects">Projects</span></a></li>
        <li><a href="{{ url('/') }}#contact"><i class="bi bi-envelope navicon"></i> <span data-i18n="nav.contact">Contact</span></a></li>
      </ul>
    </nav>

    <div class="language-switch language-switch--subtle" aria-label="Language switcher">
        <button type="button" class="lang-btn active" data-lang="en">EN</button>
        <button type="button" class="lang-btn" data-lang="pt-BR">PT-BR</button>
    </div>

</header>
