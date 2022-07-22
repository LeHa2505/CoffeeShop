<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.elements.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.elements.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.elements.sidebar')
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @yield('content')
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@include('admin.elements.footer')
@yield('modal')
@include('admin.elements.scripts')
@yield('script')
</body>
</html>
