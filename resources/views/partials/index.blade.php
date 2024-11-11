<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.layouts.head')
  @yield('head')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('partials.sidebar.index')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('partials.navbar.index')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('content')

      @include('partials.footer.index')
    </div>
  </main>
  @include('partials.configurator.index')

  @include('partials.layouts.body')

  @include('components.alert')

  @yield('body')
</body>

</html>
