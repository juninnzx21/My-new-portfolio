<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">      
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <title>Online Portfolio</title>
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
                  <img src="assets/img/portfolio/imp_finc(1).png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/imp_finc(2).png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/imp_finc(3).png" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/imp_finc(4).png" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/portfolio/imp_finc(5).png" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/portfolio/imp_finc(6).png" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: Business Website</li>
                <li><strong>Client</strong>: N/A</li>
                <li><strong>Project date</strong>: 10 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="https://www.juninnzxtec.com.br/all-portifolios/site/">Portfolio URL</a></li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Why this project was created</h2>
              <p>
                  This project was originally developed to present the work and services offered by a company.
                  However, because the company closed its operations after financial difficulties, the project was never completed.
              </p>
              
              <p>
                  I decided to keep it as part of my portfolio after removing confidential and copyright-sensitive material.
                  It now serves as a demonstration of my skills and ability to build complete web solutions.
              </p>
              
              <p>
                  This project was developed using HTML5, CSS, Bootstrap, PHP, and JavaScript. It includes several features, such as:
              </p>
              
              <ul>
                  <li>Contact form integrated with Google Forms;</li>
                  <li>Interactive cards and modals;</li>
                  <li>
                      Several well-structured pages and sections, such as:
                      <ul>
                          <li>Information pages with relevant project content;</li>
                          <li>Testimonials and reviews;</li>
                          <li>Additional supporting content.</li>
                      </ul>
                  </li>
              </ul>
              
            <p>
                The design is responsive, ensuring an optimized browsing experience across different devices.
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
