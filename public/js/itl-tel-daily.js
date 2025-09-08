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