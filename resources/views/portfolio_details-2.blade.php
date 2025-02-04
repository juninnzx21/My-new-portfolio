<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">      
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <title>Portifolio Online</title>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      
        <x-Import-default-header-portifolio />
    </head>

    <x-header />

  <main class="main">

    <x-page-title />
     {{-- <!-- Portfolio Details Section --> --}}
     <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/crud3.png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/crud.png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/crud1.png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/crud2.png" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <h4>To log in to the system, you must create an account when you reach the login area and click register</h4>
              <ul>
                <li><strong>Category</strong>: Task Log and Editing or Deleting</li>
                <li><strong>Client</strong>: N/a</li>
                <li><strong>Project date</strong>: 03 February, 2025</li>
                <li><strong>Project URL</strong>: <a href="https://www.juninnzxtec.com.br/login">Portfolio URL</a></li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Explanation of what the system was created for.</h2>
              <p>
                This project was originally developed to showcase my Laravel skills.
              </p>
                           
              <p>
                This project is developed using Laravel, Blade, Bootstrap, PHP, Css, Jquery, SweetAlert and JavaScript. It contains several features including:
              </p>
              
              <ul>
                  <li>Login page with authentication</li>
                  <li>Personal Information Edit Page</li>
                  <li>Logout system</li>
                  <li>
                    User registration page
                  </li>
                  <li>
                    To recover password
                  </li>
                  <li>
                    Tasks page
                    <ul>
                      <li>Parte de criação de novas tarefas</li>
                      <li>Edição de tarefas</li>
                      <li>Exclusão de tarefas</li>
                      <li>Criação de novas categorias</li>
                    </ul>
                  </li>
                  
              </ul>
              
            <p>
                The design is responsive, ensuring an optimized browsing experience for different devices.
            </p>
            
            </div>
          </div>

        </div>

      </div>

    </section>
    {{-- <!-- /Portfolio Details Section --> --}}

  </main>
  {{-- <!-- Scroll Top --> --}}
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <div id="preloader"></div>
  <x-import-default-vendor-js/>
    
  <x-footer-portifolio />

</body>

</html>