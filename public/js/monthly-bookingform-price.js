const startDateInput = document.getElementById('startdate');
const totalDaysInput = document.getElementById('total_days_select');
const totalWeeksInput = document.getElementById('total_weeks_select');
const totalMonthsInput = document.getElementById('total_months_select');
const returnDateInput = document.getElementById('returndate');
const carPriceInputDaily = document.getElementById('car_price_daily');
const carPriceInputWeekly = document.getElementById('car_price_weekly');
const carPriceInputMonthly = document.getElementById('car_price_monthly');
const totalRatesParagraph = document.getElementById('total_rates');
const _opt1 = document.getElementById("opt1");
const _opt2 = document.getElementById("opt2");
const _opt3 = document.getElementById("opt3");
const _opt4 = document.getElementById("opt4");
const _opt5 = document.getElementById("opt5");
const _cashBondInput = document.getElementById("cashbondAmount_input");
const _deliveryFeeInput = document.getElementById("delivery_fee_value_input");
const _totalAmountPayableInput = document.getElementById("total_amount_payable_input");
const _totalAmountPayableText = document.getElementById("totalAmountPayable");
const cashRadio = document.getElementById("pay1");
const gCashRadio = document.getElementById("pay2");
const cardRadio = document.getElementById("pay3");
const vatParagraph = document.getElementById("vat");
const vatInput = document.getElementById("vat_input");
const totalRatesInput = document.getElementById("total_rates_input");
const cashbondCheckbox = document.getElementById('cashbond');


const today = new Date().toISOString().split("T")[0];
startDateInput.setAttribute("min", today);

// Initialize previous delivery mode price to 0
let previousOptionValue = 0;
const deliveryOptions = document.querySelectorAll('input[name="mode_del"]');

// Add event listener to each radio button
deliveryOptions.forEach(option => {
  option.addEventListener('click', () => {
    // Get the value of the selected delivery option
    const selectedOptionValue = option.getAttribute('data-delivery-price');

    // Calculate the new total price by subtracting the previous delivery mode price and adding the new one
    const totalPriceElement = document.getElementById('delivery_fee_value');
    const currentPrice = parseFloat(totalPriceElement.innerText);
    const newPrice = currentPrice - previousOptionValue + parseFloat(selectedOptionValue);
    totalPriceElement.innerText = newPrice.toFixed(2);

    // Update the input field value as well
    const deliveryFeeInputElement = document.getElementById('delivery_fee_value_input');
    deliveryFeeInputElement.value = newPrice;

    // Update the previous delivery mode price to the current one
    previousOptionValue = parseFloat(selectedOptionValue);
  });
});




cashbondCheckbox.addEventListener('change', () => {
  const cashbondValue = parseInt(cashbondCheckbox.value);
  const cashbondAmountElement = document.getElementById('cashbondAmount');
  const cashbondInputElement = document.getElementById('cashbondAmount_input');

  if (cashbondCheckbox.checked) {
    // Checked → set cashbond
    cashbondAmountElement.innerText = cashbondValue.toLocaleString("en-US", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
    cashbondInputElement.value = cashbondValue;
  } else {
    // Unchecked → reset to 0
    cashbondAmountElement.innerText = (0).toLocaleString("en-US", {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
    cashbondInputElement.value = 0;
  }

  // Recalculate totals
  updateTotalAmountPayable();
});



function updateReturnDateAndTotalRates() {
    const startDate = new Date(startDateInput.value);
    const totalMonths = parseInt(totalMonthsInput.value) || 0;
    const totalWeeks = parseInt(totalWeeksInput.value) || 0;
    const totalDays = parseInt(totalDaysInput.value) || 0;

    const monthlyRate = parseFloat(carPriceInputMonthly.value) || 0;
    const weeklyRate = parseFloat(carPriceInputWeekly.value) || 0;
    const dailyRate = parseFloat(carPriceInputDaily.value) || 0;

    if (startDate) {
        // Calculate return date
        const returnDate = new Date(startDate);
        returnDate.setMonth(returnDate.getMonth() + totalMonths);
        returnDate.setDate(returnDate.getDate() + totalWeeks * 7 + totalDays);
        const returnDateString = returnDate.toISOString().split('T')[0];
        returnDateInput.value = returnDateString;

        // Calculate total rate
        const totalRates = (totalMonths * monthlyRate) + (totalWeeks * weeklyRate) + (totalDays * dailyRate);
        totalRatesInput.value = totalRates;
        totalRatesParagraph.innerText = `${totalRates.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`;

        // Update alert
        let alertText = "You are using ";
        if (totalMonths > 0) alertText += "<strong>MONTHLY</strong>";
        if (totalWeeks > 0) alertText += (totalMonths > 0 ? " + " : "") + "<strong>WEEKLY</strong>";
        if (totalDays > 0) alertText += ((totalMonths > 0 || totalWeeks > 0) ? " + " : "") + "<strong>DAILY</strong>";
        document.getElementById('rateTypeAlert').innerHTML = `${alertText} <strong>RATE</strong>`;

        const parts = [
          totalMonths && `${totalMonths} month${totalMonths > 1 ? "s" : ""}`,
          totalWeeks && `${totalWeeks} week${totalWeeks > 1 ? "s" : ""}`,
          totalDays && `${totalDays} day${totalDays > 1 ? "s" : ""}`
        ];
        const durationText = parts.filter(Boolean).join(" ") || "0 days";
        document.getElementById("rental_duration_display").innerText = durationText;
        document.getElementById("rental_duration_input").value = durationText;
        updateTotalAmountPayable();
    }
}


function updateTotalAmountPayable() {
  const totalRate = parseFloat(totalRatesInput.value);
  const cashBond = parseFloat(_cashBondInput.value);
  const deliveryFee = parseFloat(_deliveryFeeInput.value);
  const vat = cardRadio.checked ? totalRate * 0.0275 : 0;
  vatParagraph.textContent = vat.toLocaleString("en-US", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  });
  vatInput.value = vat.toFixed(2);
  const totalAmountPayable = totalRate + cashBond + deliveryFee + vat;
  _totalAmountPayableInput.value = totalAmountPayable.toFixed(2);
  _totalAmountPayableText.textContent = totalAmountPayable.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}


startDateInput.addEventListener('change', () => {
  updateReturnDateAndTotalRates();
  updateTotalAmountPayable();
});
// Months, Weeks, Days change
totalMonthsInput.addEventListener('change', updateReturnDateAndTotalRates);
totalWeeksInput.addEventListener('change', updateReturnDateAndTotalRates);
totalDaysInput.addEventListener('change', updateReturnDateAndTotalRates);

// Car rates change
carPriceInputDaily.addEventListener('change', updateReturnDateAndTotalRates);
carPriceInputWeekly.addEventListener('change', updateReturnDateAndTotalRates);
carPriceInputMonthly.addEventListener('change', updateReturnDateAndTotalRates);

cashRadio.addEventListener("change", updateTotalAmountPayable);
gCashRadio.addEventListener("change", updateTotalAmountPayable);
cardRadio.addEventListener("change", updateTotalAmountPayable);
totalRatesInput.addEventListener("input", updateTotalAmountPayable);
returnDateInput.addEventListener("change", updateTotalAmountPayable);
cashbondCheckbox.addEventListener("change", updateTotalAmountPayable);
_opt1.addEventListener("change", updateTotalAmountPayable);
_opt2.addEventListener("change", updateTotalAmountPayable);
_opt3.addEventListener("change", updateTotalAmountPayable);
_opt4.addEventListener("change", updateTotalAmountPayable);
_opt5.addEventListener("change", updateTotalAmountPayable);
_cashBondInput.addEventListener("input", updateTotalAmountPayable);
_deliveryFeeInput.addEventListener("input", updateTotalAmountPayable);


