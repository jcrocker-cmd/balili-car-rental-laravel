const input_monthly = document.querySelector("#whatsapp_viberNumber_monthly");
const fullPhoneInput_monthly = document.querySelector("#fullPhoneNumber_monthly");

const iti_monthly = window.intlTelInput(input_monthly, {
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

function setPhoneDataMonthly() {
    fullPhoneInput_monthly.value = iti_monthly.getNumber();
}

input_monthly.addEventListener("input", setPhoneDataMonthly);
input_monthly.addEventListener("countrychange", setPhoneDataMonthly);

input_monthly.addEventListener("blur", function () {
  if (!iti_monthly.isValidNumber()) {
    input_monthly.setCustomValidity("Enter a valid WhatsApp/Viber number.");
  } else {
    input_monthly.setCustomValidity("");
  }
});