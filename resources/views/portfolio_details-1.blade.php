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
              <aside class="portfolio-info case-study-sidebar">
                <h3>Project Snapshot</h3>
                <ul>
                  <li><strong>Category</strong>: Institutional Business Website</li>
                  <li><strong>Project Type</strong>: Portfolio case study</li>
                  <li><strong>Date</strong>: March 2020</li>
                  <li><strong>Stack</strong>: HTML, CSS, Bootstrap, PHP, JavaScript</li>
                  <li><strong>Live Project</strong>: <a href="https://www.juninnzxtec.com.br/all-portifolios/site/index.php" target="_blank" rel="noopener noreferrer">Open demo</a></li>
                </ul>
              </aside>
            </div>
          </div>
        </div>

        <div class="case-study-grid">
          <section class="case-study-card">
            <span class="case-label">Context</span>
            <h2>A website designed to communicate services and capture leads</h2>
            <p>This project started as a business presentation website intended to explain services clearly and encourage user contact through a structured and responsive interface.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Problem</span>
            <p>The challenge was to organize information in a way that made the business look credible, easy to understand, and accessible across different devices.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Solution</span>
            <p>I structured content sections, CTAs, layout blocks, and a contact flow with the goal of improving clarity and conversion. Even after the original company ceased operations, the project remained a strong portfolio example of institutional design and front-end organization.</p>
          </section>

          <section class="case-study-card">
            <span class="case-label">Responsibilities</span>
            <ul>
              <li>Responsive page structure</li>
              <li>Marketing-oriented content organization</li>
              <li>Contact and lead capture flow</li>
              <li>UI composition for desktop and mobile</li>
            </ul>
          </section>

          <section class="case-study-card">
            <span class="case-label">What I Learned</span>
            <p>This case helped me understand how layout hierarchy, content sequencing, and visual clarity directly affect how users perceive trust and relevance on business websites.</p>
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
