const input_weekly = document.querySelector("#whatsapp_viberNumber_weekly");
const fullPhoneInput_weekly = document.querySelector("#fullPhoneNumber_weekly");

const iti_weekly = window.intlTelInput(input_weekly, {
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

function setPhoneDataWeekly() {
    fullPhoneInput_weekly.value = iti_weekly.getNumber();
}

input_weekly.addEventListener("input", setPhoneDataWeekly);
input_weekly.addEventListener("countrychange", setPhoneDataWeekly);

input_weekly.addEventListener("blur", function () {
  if (!iti_weekly.isValidNumber()) {
    input_weekly.setCustomValidity("Enter a valid WhatsApp/Viber number.");
  } else {
    input_weekly.setCustomValidity("");
  }
});