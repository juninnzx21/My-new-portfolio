<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>{{ $portfolioItem->title }} | Online Portfolio</title>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <x-Import-default-header-portifolio />
    </head>

    <x-header />

    <main class="main">
        <div class="page-title dark-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">{{ $portfolioItem->title }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/portifolio') }}">Home</a></li>
                        <li class="current">Portfolio Details</li>
                    </ol>
                </nav>
            </div>
        </div>

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
                                @foreach ($portfolioItem->detailImageUrls() as $imageUrl)
                                    <div class="swiper-slide">
                                        <img src="{{ $imageUrl }}" alt="{{ $portfolioItem->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $portfolioItem->detail_category ?: $portfolioItem->eyebrow }}</li>
                                <li><strong>Client</strong>: {{ $portfolioItem->detail_client ?: 'N/A' }}</li>
                                <li><strong>Project date</strong>: {{ $portfolioItem->detail_project_date ?: 'N/A' }}</li>
                                <li><strong>Project URL</strong>: <a href="{{ $portfolioItem->live_url }}" target="_blank" rel="noopener noreferrer">Portfolio URL</a></li>
                            </ul>
                        </div>
                        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
                            <h2>{{ $portfolioItem->detail_heading ?: 'Why this project was created' }}</h2>
                            <div style="white-space: pre-line;">
                                {{ $portfolioItem->detail_body ?: 'Project details not configured yet.' }}
                            </div>
                        </div>
                    </div>
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
