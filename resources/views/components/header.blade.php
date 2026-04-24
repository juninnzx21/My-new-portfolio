<header id="header" class="header dark-background d-flex flex-column " style="margin-right: 20px;">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="assets/img/eu.jpg" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="{{ url('/') }}" class="logo d-flex align-items-center justify-content-center">
       <h1 class="sitename">Junior Rodrigues</h1>
    </a>

    <div class="social-links text-center">
        <a target="_blank" rel="noopener noreferrer" href="https://api.whatsapp.com/send?phone=5531993239198&amp;"><i class="bi bi-whatsapp"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://x.com/Juninnzx1" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/juninnzx.1/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/junior-rodrigues-68961b288/" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a target="_blank" rel="noopener noreferrer" href="https://github.com/juninnzx21" class="github"><i class="bi bi-github"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="{{ url('/') }}#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="{{ url('/') }}#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
        <li><a href="{{ url('/Junior_Rodrigues_CV.pdf') }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-file-person navicon"></i> CV PDF</a></li>
        <li><a href="{{ url('/Junior_Rodrigues_CV.pdf') }}" download><i class="bi bi-download navicon"></i> Download CV</a></li>
        <li><a href="{{ url('/') }}#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
        <li><a href="{{ url('/') }}#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
      </ul>
    </nav>

</header>
