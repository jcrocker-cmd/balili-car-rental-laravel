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
<div class="booking-form-wrapper">
    <div class="booking-form-buttons">
        <a href="javascript:void(0)" class="btn-daily button active" data-form="daily">DAILY BOOKING FORM</a>
        <a href="javascript:void(0)" class="btn-weekly button" data-form="weekly">WEEKLY BOOKING FORM</a>
        <a href="javascript:void(0)" class="btn-monthly button" data-form="monthly">MONTHLY BOOKING FORM</a>
    </div>

    <div class="booking-form-content">
        <div id="dailyForm" class="booking-form-section">
            @include('main.components.bookingforms-content')
        </div>
        <div id="weeklyForm" class="booking-form-section d-none">
            @include('main.components.weekly-bookingforms-content')
        </div>
        <div id="monthlyForm" class="booking-form-section d-none">
            @include('main.components.monthly-bookingforms-content')
        </div>
    </div>
</div>
@include('main.layout.footer')
@endsection

@section('script')
@include('main.assets.script')
@include('main.assets.bootstrapjs')
@endsection

@push('script')

<script>
    const formButtons = document.querySelectorAll(".booking-form-buttons a");
    const forms = {
        daily: document.getElementById("dailyForm"),
        weekly: document.getElementById("weeklyForm"),
        monthly: document.getElementById("monthlyForm")
    };

    formButtons.forEach(btn => {
        btn.addEventListener("click", function() {
            document.querySelector(".booking-form-buttons a.active").classList.remove("active");
            this.classList.add("active");

            const formType = this.dataset.form;

            // Hide all forms
            Object.values(forms).forEach(f => f.classList.add("d-none"));

            // Show selected form
            forms[formType].classList.remove("d-none");
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<!-- <script src="https://unpkg.com/validator@latest/validator.min.js"></script> -->

<!-- <script src="/js/parsley.js"></script> -->

<script src="/js/daily-bookingform-validation.js"></script>
<script src="/js/daily-bookingform-price.js"></script>
<!-- <script src="/js/weekly-bookingform-validation.js"></script>
<script src="/js/weekly-bookingform-price.js"></script> -->
<script src="/js/monthly-bookingform-validation.js"></script>
<script src="/js/monthly-bookingform-price.js"></script>
<!-- <script src="/js/moment-library.js"></script> -->

<!-- Include the intl-tel-input library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>
<script src='/js/itl-tel-daily.js'></script>
<script src='/js/itl-tel-weekly.js'></script>
<script src='/js/itl-tel-monthly.js'></script>

@endpush