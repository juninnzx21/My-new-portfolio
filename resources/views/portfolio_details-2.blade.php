<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-Import-default-header-portifolio />
    </head>

    <x-header />

  <main class="main">

    <x-page-title />
    <section id="portfolio-details" class="portfolio-details section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="case-study-hero">
          <div class="row gy-4 align-items-start">
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper init-swiper case-study-gallery">
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
              <aside class="portfolio-info case-study-sidebar">
                <h3>Project Snapshot</h3>
                <ul>
                  <li><strong>Category</strong>: Task Management System</li>
                  <li><strong>Project Type</strong>: Laravel application and portfolio case</li>
                  <li><strong>Date</strong>: February 2025</li>
                  <li><strong>Stack</strong>: Laravel, Blade, PHP, JavaScript, jQuery, Bootstrap, SweetAlert</li>
                  <li><strong>Live Project</strong>: <a href="https://www.juninnzxtec.com.br/login" target="_blank" rel="noopener noreferrer">Open demo</a></li>
                </ul>
              </aside>
            </div>
          </div>
        </div>

        <div class="case-study-grid">
          <section class="case-study-card">
            <span class="case-label">Context</span>
            <h2>A workflow-oriented Laravel application</h2>
            <p>This project was built to demonstrate my Laravel skills through a realistic application flow involving user access, task management, categories, and account actions.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Problem</span>
            <p>The goal was not just to show separate screens, but to create a connected user journey where actions had persistence, logic, and visible feedback.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Solution</span>
            <p>I implemented a complete Laravel and Blade workflow with authentication, profile management, task CRUD, category creation, and alert-driven feedback to simulate the behavior of a practical internal system.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Responsibilities</span>
            <ul>
              <li>Authentication and access flow</li>
              <li>Task and category CRUD implementation</li>
              <li>User profile and account actions</li>
              <li>Responsive interface and interaction feedback</li>
            </ul>
          </section>

          <section class="case-study-card">
            <span class="case-label">What I Learned</span>
            <p>This project reinforced how important it is to connect backend rules, interface behavior, and user flow consistency when building systems intended for regular operational use.</p>
          </section>
        </div>
      </div>
    </section>

  </main>
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <x-import-default-vendor-js/>
  <x-footer-portifolio />

</body>
</html>
