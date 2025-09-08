@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/formvalidation/dist/css/formValidation.min.css">

    <!-- Include the intl-tel-input library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

 @endsection

@section('content') 
    @include('main.layout.topheader')
    @include('main.layout.header')
    @include('main.components.bookingforms-content')
    @include('main.layout.footer')
@endsection

@section('script')
    @include('main.assets.script')
    @include('main.assets.bootstrapjs')
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <!-- <script src="https://unpkg.com/validator@latest/validator.min.js"></script> -->
    
    <!-- <script src="/js/parsley.js"></script> -->
    
    <script src="/js/daily-bookingform-validation.js"></script>
    <script src="/js/daily-bookingform-price.js"></script>
    <script src="/js/moment-library.js"></script>
    <script src="/js/ajax-user-booking.js"></script>

    <!-- Include the intl-tel-input library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
    <script>
    const input = document.querySelector("#whatsapp_viberNumber");
    const fullPhoneInput = document.querySelector("#fullPhoneNumber");

    const iti = window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: function (callback) {
        fetch("https://ipapi.co/json/")
        .then(res => res.json())
        .then(data => callback(data.country_code))
        .catch(() => callback("ph")); // fallback
    },
    nationalMode: false,   // allow full international formatting
    autoPlaceholder: "aggressive",
    separateDialCode: true,
    preferredCountries: ["us", "gb", "ph"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    function setPhoneData() {
        fullPhoneInput.value = iti.getNumber();
    }

    input.addEventListener("input", setPhoneData);
    input.addEventListener("countrychange", setPhoneData);

    input.addEventListener("blur", function () {
    if (!iti.isValidNumber()) {
        input.setCustomValidity("Enter a valid WhatsApp/Viber number.");
    } else {
        input.setCustomValidity("");
    }
    });
    </script>
 

@endpush
