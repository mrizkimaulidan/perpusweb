@include('layouts.stisla.header')

@include('layouts.stisla.sidebar')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>{{ $section_header }}</h1>
    </div>

    <div class="section-body">
      @yield('content')
    </div>
  </section>
</div>

@include('layouts.stisla.footer')