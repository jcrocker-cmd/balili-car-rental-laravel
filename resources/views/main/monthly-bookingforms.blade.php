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
    @include('main.components.monthly-bookingforms-content')
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
    
    <script src="/js/monthly-bookingform-validation.js"></script>
    <script src="/js/monthly-bookingform-price.js"></script>
    <script src="/js/moment-library.js"></script>
    <!-- <script src="/js/ajax-user-booking.js"></script> -->

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

        // Get the country code
        const countryCode = countryData.dialCode;

        // Get the raw phone number entered by the user
        const rawPhoneNumber = input.value;

        // Set the country code in the hidden input
        document.querySelector("#countryCode").value = countryCode;

        // Prepare the full phone number for the hidden field
        const fullPhoneNumber = `+${countryCode}${rawPhoneNumber.replace(/^\+/, '')}`; // Remove existing "+" if present
        document.querySelector("#fullPhoneNumber").value = fullPhoneNumber;

        // Handle input field display
        if (rawPhoneNumber.length === 0) {
            // If input is empty, set input to placeholder (optional)
            input.value = ""; // Keep it empty
        } else {
            // If there's any input, retain user input
            input.value = rawPhoneNumber; // Keep user input intact
        }
    }
  
    </script>   

@endpush
