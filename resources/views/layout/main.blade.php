<!DOCTYPE html>
<html>
<head>
  @include('layout.head')
</head>
<body>
  @yield('content')
  
  @include('layout.footer-scripts')

  @stack('scripts')
</body>
</html>