@php
  $pageTitle = match (request()->path()) {
      'projeto' => 'Course Catalog Management',
      'projeto-1' => 'Institutional Business Website',
      'projeto-2' => 'Task Management System',
      default => 'Project Details',
  };
@endphp

  {{-- <!-- Page Title --> --}}
  <div class="page-title dark-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">{{ $pageTitle }}</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">{{ $pageTitle }}</li>
        </ol>
      </nav>
    </div>
  </div>
  {{-- <!-- End Page Title --> --}}
