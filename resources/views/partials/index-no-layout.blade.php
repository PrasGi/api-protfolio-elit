<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.layouts.head')
  @yield('head')
</head>

<body class="g-sidenav-show  bg-gray-100">
  @yield('content')


  @include('partials.layouts.body')
  @include('components.alert')
  @yield('body')
</body>

</html>
