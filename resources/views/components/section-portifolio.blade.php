@php
  $portfolioItems = $portfolioItems ?? \App\Models\PortfolioItem::publicPortfolioItems();
@endphp

<section id="portfolio" class="portfolio section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolios</h2>
    <p>Below are some of the projects and live systems featured in my portfolio.</p>
  </div>

  <div class="container">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($portfolioItems as $item)
          @php
            $eyebrow = data_get($item, 'eyebrow');
            $title = data_get($item, 'title');
            $liveUrl = data_get($item, 'live_url');
            $detailsUrl = data_get($item, 'details_url');
            $imagePath = method_exists($item, 'imageUrl')
              ? $item->imageUrl()
              : asset(ltrim(data_get($item, 'image_path'), '/'));
            $isExternalDetails = str_starts_with($detailsUrl, 'http://') || str_starts_with($detailsUrl, 'https://');
          @endphp

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
            <div class="portfolio-content h-100">
              <img src="{{ $imagePath }}" class="img-fluid" alt="{{ $title }}">
              <div class="portfolio-info">
                <h4>{{ $eyebrow }}</h4>
                <p>{{ $title }}</p>
                <a href="{{ $liveUrl }}" title="Open live project" target="_blank" rel="noopener noreferrer" class="preview-link">
                  <i class="bi bi-box-arrow-up-right"></i>
                </a>
                <a href="{{ $detailsUrl }}" title="More Details" class="details-link" @if ($isExternalDetails) target="_blank" rel="noopener noreferrer" @endif>
                  <i class="bi bi-link-45deg"></i>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
