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
    @include('main.layout.header-main')
    @include('main.layout.header2-main')
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

    <script>
    const input = document.querySelector("#whatsapp_viberNumber");
    const iti = window.intlTelInput(input, {
        initialCountry: "ph", // Auto detect user's country
        separateDialCode: true, // Show country dial code separately
        preferredCountries: ["us", "gb", "ph"], // Optional: you can add preferred countries
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Optional: Validation to ensure correct format
    input.addEventListener('blur', function() {
        if (iti.isValidNumber()) {
            input.setCustomValidity(""); // Number is valid
        } else {
            input.setCustomValidity("Enter a WhatsApp/Viber number.");
        }
    });

    function setPhoneData() {
        const input = document.querySelector("#whatsapp_viberNumber");
        const iti = window.intlTelInputGlobals.getInstance(input);
        const countryData = iti.getSelectedCountryData();

        // Get the phone number and country code
        const phoneNumber = input.value;
        const countryCode = countryData.dialCode;

        // Set the values of the hidden fields
        document.querySelector("#countryCode").value = countryCode;
        
        // Combine country code and phone number for the full phone number
        document.querySelector("#fullPhoneNumber").value = `+${countryCode}${phoneNumber}`;
    }
    </script>   

@endpush
