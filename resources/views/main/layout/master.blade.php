<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Balili Cebu Car Rental | Affordable and Convenient Car Rentals</title>

    <!-- Meta Description for SEO -->
    <meta name="description" content="Balili Cebu Car Car Rental offers a wide selection of affordable and reliable cars for rent. Book your ride today and enjoy a seamless experience.">

    <!-- Meta Keywords (Optional) -->
    <meta name="keywords" content="car rental, cebu car rental, affordable car rental, car rental Bohol, Balili car rental, rent a car">

<!-- Robots Meta Tag (Indexing & Following Links) -->
<meta name="robots" content="index, follow">
    <!-- <link rel="shortcut icon" href="images/tire.png" type="image/x-icon"> -->
    @yield('styles')
    @stack('style')
</head>
<body>


<!-- PRELOADER -->

<div class="loader-wrapper" id="loads">
    <a href="/" class="brand"><img src="/images/LOGO.webp" class="preloader_logo pb-2"></a>
    <div class="linePreloader"></div>
</div>

    @yield('content')
    @yield('script')
    @stack('script')

<script>
  $(window).on("load",function(){
      $(".loader-wrapper").delay(500).fadeIn("slow").fadeOut("slow");
  });
</script>



</body>

</html>