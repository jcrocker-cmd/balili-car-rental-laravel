// Add custom methods for start and return dates and times
$.validator.addMethod(
    "startdate_monthly",
    function (value, element) {
        var startDate = new Date(value);
        var today = new Date();
        return startDate >= today;
    },
    "Start date cannot be in the past."
);

$.validator.addMethod(
    "returndate_monthly",
    function (value, element) {
        var returnDate = new Date(value);
        var startDate = new Date($("#startdate_monthly").val());
        return returnDate >= startDate;
    },
    "Return date must be after start date."
);

$(document).ready(function () {
    // Initialize the validator
    var validator = $("#monthly_bookingForm").validate({
        rules: {
            start_date_monthly: {
                required: true,
                startdate_monthly: true,
            },
            start_time_monthly: {
                required: true,
            },
            return_date_monthly: {
                required: true,
                returndate_monthly: true,
            },
            return_time_monthly: {
                required: true,
            },
        },
        messages: {
            start_date_monthly: {
                required: "Please enter a start date.",
            },
            start_time_monthly: {
                required: "Please enter a start time.",
            },
            return_date_monthly: {
                required: "Please enter a return date.",
            },
            return_time_monthly: {
                required: "Please enter a return time.",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "start_date_monthly") {
                error.insertAfter(element.next("#errorsd_monthly"));
            } else if (element.attr("name") === "start_time_monthly") {
                error.insertAfter(element.next("#errorst_monthly"));
            } else if (element.attr("name") === "return_date_monthly") {
                error.insertAfter(element.next("#errorrd_monthly"));
            } else if (element.attr("name") === "return_time_monthly") {
                error.insertAfter(element.next("#errorrt_monthly"));
            }
        },
        submitHandler: function (form) {
            showLoading();
            $(form).find('button[type="submit"]').prop("disabled", true);
            form.submit();
        },
    });

    // Validate the form fields before submitting
    $("#monthly_bookingForm").on("submit", function () {
        return validator.form();
    });

    // Validate the form fields on change and blur events
    $(
        "#startdate_monthly, #starttime_monthly, #returndate_monthly, #returntime_monthly"
    ).on("change blur", function () {
        validator.element(this);
    });
});

function showLoading() {
    if ($("#loadingOverlay").length === 0) {
        $("body").append(`
            <div id="loadingOverlay" style="
                position: fixed;
                top: 0; left: 0;
                width: 100%; height: 100%;
                background: rgba(0,0,0,0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 999;
            ">
                <div style="color:white; 
                    font-size:20px; font-family: 
                    poppins, sans-serif;">
                    Processing your booking...
                </div>
            </div>
        `);
    }
}

window.addEventListener("pageshow", function (event) {
    const overlay = document.getElementById("loadingOverlay");
    if (overlay) {
        overlay.remove();
    }
});
