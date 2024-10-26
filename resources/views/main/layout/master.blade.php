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

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>


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

 
<script>
var chatbox = document.getElementById('fb-customer-chat');
chatbox.setAttribute("page_id", "1057071350970751");
chatbox.setAttribute("attribution", "biz_inbox");
</script>


<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "122087324217539");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v16.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


</body>

</html>