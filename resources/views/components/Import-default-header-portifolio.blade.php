@php
    $path = request()->path();

    $meta = match ($path) {
        '/' => [
            'title' => 'Junior Rodrigues | Full Stack PHP/Laravel Developer',
            'description' => 'Portfolio of Junior Rodrigues, a Full Stack PHP/Laravel Developer focused on business systems, internal tools, and reliable web applications.',
        ],
        'projeto' => [
            'title' => 'Course Catalog Management Project | Junior Rodrigues',
            'description' => 'Course catalog management project built with PHP, HTML, CSS, Bootstrap, and database-driven CRUD flows.',
        ],
        'projeto-1' => [
            'title' => 'Institutional Business Website Project | Junior Rodrigues',
            'description' => 'Responsive business website case study focused on service presentation, lead capture, and clear communication.',
        ],
        'projeto-2' => [
            'title' => 'Task Management System | Junior Rodrigues',
            'description' => 'Laravel and Blade task management project with authentication, CRUD workflows, categories, and responsive screens.',
        ],
        default => [
            'title' => 'Junior Rodrigues | Full Stack Developer',
            'description' => 'Portfolio and professional profile of Junior Rodrigues.',
        ],
    };

    $canonical = url()->current();
    $ogImage = asset('assets/img/eu.jpg');
@endphp

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $meta['title'] }}</title>
<meta name="description" content="{{ $meta['description'] }}">
<meta name="keywords" content="Junior Rodrigues, Laravel Developer, PHP Developer, Full Stack Developer, Portfolio, Brazil">
<meta name="author" content="Junior Rodrigues">
<link rel="canonical" href="{{ $canonical }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $meta['title'] }}">
<meta property="og:description" content="{{ $meta['description'] }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:site_name" content="JuninnzxTEC">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $meta['title'] }}">
<meta name="twitter:description" content="{{ $meta['description'] }}">
<meta name="twitter:image" content="{{ $ogImage }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Main CSS File -->
<link href="assets/css/main.css" rel="stylesheet">


 <script src="assets/vendor/alert/sweetalert.js"></script>
