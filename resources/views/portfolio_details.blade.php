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
                    <img src="assets/img/portfolio/cursos_full_stack.png" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img src="assets/img/portfolio/cursos_full_stack_1.png" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img src="assets/img/portfolio/cursos_full_stack_ 2.png" alt="">
                  </div>
                  <div class="swiper-slide">
                    <img src="assets/img/portfolio/cursos_full_stack_ 3.png" alt="">
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <aside class="portfolio-info case-study-sidebar">
                <h3>Project Snapshot</h3>
                <ul>
                  <li><strong>Category</strong>: Course Catalog Management</li>
                  <li><strong>Project Type</strong>: Study project and portfolio case</li>
                  <li><strong>Date</strong>: March 2020</li>
                  <li><strong>Stack</strong>: PHP, HTML, CSS, Bootstrap, JavaScript, MySQL</li>
                  <li><strong>Live Project</strong>: <a href="https://www.juninnzxtec.com.br/all-portifolios/site2/index.php" target="_blank" rel="noopener noreferrer">Open demo</a></li>
                </ul>
              </aside>
            </div>
          </div>
        </div>

        <div class="case-study-grid">
          <section class="case-study-card">
            <span class="case-label">Context</span>
            <h2>Building a simple workflow around structured data</h2>
            <p>This project was created to practice a complete CRUD flow around a straightforward but realistic business need: managing a course catalog with editable records and persistent storage.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Problem</span>
            <p>The challenge was to move beyond static pages and implement a real interaction cycle where records could be added, updated, and removed in a clean and understandable interface.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Solution</span>
            <p>I built a PHP-based project with database persistence, form flows, validation, and user-facing feedback for each operation. The goal was clarity: users should understand what they are changing and see the result immediately.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Responsibilities</span>
            <ul>
              <li>CRUD flow implementation</li>
              <li>Server-side form handling</li>
              <li>Database persistence and updates</li>
              <li>Responsive UI structure with Bootstrap</li>
            </ul>
          </section>

          <section class="case-study-card">
            <span class="case-label">What I Learned</span>
            <p>This project strengthened my understanding of server-rendered interfaces, validation flows, state changes after user actions, and how even a small operational system benefits from clear interaction design.</p>
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
