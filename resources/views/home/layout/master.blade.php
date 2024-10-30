<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Meta Description for SEO -->
    <meta name="description" content="Balili Cebu Car Car Rental offers a wide selection of affordable and reliable cars for rent. Book your ride today and enjoy a seamless experience.">

    <!-- Meta Keywords (Optional) -->
    <meta name="keywords" content="car rental, cebu car rental, affordable car rental, car rental Bohol, Balili car rental, rent a car">

    <link rel="shortcut icon" href="images/tire.png" type="image/x-icon">
    @yield('styles')
</head>
<body>

<a href="#" class="scrollup" id="scroll-up" aria-label="Scroll to top of the page"><i class="fas fa-arrow-up"></i></a>

<!-- PRELOADER -->

<div class="loader-wrapper" id="loads">
    <a href="/" class="brand"><img src="/images/LOGO.webp" class="preloader_logo pb-2"></a>
    <div class="linePreloader"></div>
</div>



@yield('content')

@if (session('message'))
<div class="bg-success text-white request-alert" id="myAlert">
{{ session('message') }}
</div>
@endif

@yield('script')

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
$(window).on("load",function(){
    $(".loader-wrapper").delay(500).fadeIn("slow").fadeOut("slow");
});
</script>

</body>

</html>