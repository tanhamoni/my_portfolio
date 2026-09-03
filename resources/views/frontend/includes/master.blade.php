<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tanha</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  
  @include('frontend.includes.style')

</head>

<body class="index-page">
@include('frontend.includes.header')
@yield('content')

 

 @include('frontend.includes.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 @include('frontend.includes.script')
 @stack('script')

</body>

</html>