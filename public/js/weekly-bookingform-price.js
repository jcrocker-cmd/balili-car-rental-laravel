const startDateInput_W = document.getElementById('startdate_weekly');
const totalDaysInput_W = document.getElementById('total_days_select_W');
const totalWeeksInput_W = document.getElementById('total_weeks_select_W');
const returnDateInput_W = document.getElementById('returndate_weekly');
const carPriceInputDaily_W = document.getElementById('car_price_daily_W');
const carPriceInputWeekly_W = document.getElementById('car_price_weekly_W');
const totalRatesParagraph_W = document.getElementById('total_rates_W');
const _opt1_W = document.getElementById("opt1_W");
const _opt2_W = document.getElementById("opt2_W");
const _opt3_W = document.getElementById("opt3_W");
const _opt4_W = document.getElementById("opt4_W");
const _opt5_W = document.getElementById("opt5_W");
const _cashBondInput_W = document.getElementById("cashbondAmount_input_W");
const _deliveryFeeInput_W = document.getElementById("delivery_fee_value_input_W");
const _totalAmountPayableInput_W = document.getElementById("total_amount_payable_input_W");
const _totalAmountPayableText_W = document.getElementById("totalAmountPayable_W");
const cashRadio_W = document.getElementById("pay1_W");
const gCashRadio_W = document.getElementById("pay2_W");
const cardRadio_W = document.getElementById("pay3_W");
const vatParagraph_W = document.getElementById("vat_W");
const vatInput_W = document.getElementById("vat_input_W");
const totalRatesInput_W = document.getElementById("total_rates_input_W");
const cashbondCheckbox_W = document.getElementById('cashbond_W');


const today_W = new Date().toISOString().split("T")[0];
startDateInput_W.setAttribute("min", today_W);

// Initialize previous delivery mode price to 0
let previousOptionValue_W = 0;
const deliveryOptions_W = document.querySelectorAll('input[del="mode_del_W"]');

// Add event listener to each radio button
deliveryOptions_W.forEach(option => {
  option.addEventListener('click', () => {
    // Get the value of the selected delivery option
    const selectedOptionValue = option.getAttribute('data-delivery-price');

    // Calculate the new total price by subtracting the previous delivery mode price and adding the new one
    const totalPriceElement = document.getElementById('delivery_fee_value_W');
    const currentPrice = parseFloat(totalPriceElement.innerText);
    const newPrice = currentPrice - previousOptionValue_W + parseFloat(selectedOptionValue);
    totalPriceElement.innerText = newPrice.toFixed(2);

    // Update the input field value as well
    const deliveryFeeInputElement = document.getElementById('delivery_fee_value_input_W');
    deliveryFeeInputElement.value = newPrice;

    // Update the previous delivery mode price to the current one
    previousOptionValue_W = parseFloat(selectedOptionValue);
  });
});



cashbondCheckbox_W.addEventListener('change', () => {
  const cashbondValue = parseInt(cashbondCheckbox_W.value);
  const cashbondAmountElement = document.getElementById('cashbondAmount_W');
  const cashbondInputElement = document.getElementById('cashbondAmount_input_W');

  if (cashbondCheckbox_W.checked) {
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
  updateTotalAmountPayable_W();
});



function updateReturnDateAndTotalRates_W() {
    // Get the selected start date
    const startDate = new Date(startDateInput_W.value);
    if (!startDateInput_W.value) return;

    const totalWeeks = parseInt(totalWeeksInput_W.value) || 0;
    const totalDays = parseInt(totalDaysInput_W.value) || 0;
    const weeklyRate = parseFloat(carPriceInputWeekly_W.value) || 0;
    const dailyRate = parseFloat(carPriceInputDaily_W.value) || 0;

    // Calculate total rental days
    const totalRentalDays = totalWeeks * 7 + totalDays;

    // Calculate return date
    const returnDate = new Date(startDate.getTime() + totalRentalDays * 24 * 60 * 60 * 1000);
    returnDateInput_W.value = returnDate.toISOString().split('T')[0];

    // Calculate total rate (weeks * weekly rate + days * daily rate)
    const totalRates = totalWeeks * weeklyRate + totalDays * dailyRate;

    // Update total rates input and paragraph
    totalRatesInput_W.value = totalRates;
    totalRatesParagraph_W.innerText = totalRates.toLocaleString("en-US", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    const rateTypeAlert = document.getElementById('rateTypeAlert_W');
    if (totalDays > 0) {
        rateTypeAlert.innerHTML = 'You are using <strong>WEEKLY + DAILY RATE</strong>';
    } else {
        rateTypeAlert.innerHTML = 'You are using <strong>WEEKLY RATE</strong>';
    }

    const parts = [
    totalWeeks && `${totalWeeks} week${totalWeeks > 1 ? "s" : ""}`,
    totalDays && `${totalDays} day${totalDays > 1 ? "s" : ""}`
    ];

    const durationText = parts.filter(Boolean).join(" ") || "0 days";
    
    document.getElementById("rental_duration_display_W").innerText = durationText;
    document.getElementById("rental_duration_input_W").value = durationText;
    updateTotalAmountPayable_W();
}




function updateTotalAmountPayable_W() {
  const totalRate = parseFloat(totalRatesInput_W.value);
  const cashBond = parseFloat(_cashBondInput_W.value);
  const deliveryFee = parseFloat(_deliveryFeeInput_W.value);
  const vat = cardRadio_W.checked ? totalRate * 0.0275 : 0;
  vatParagraph_W.textContent = vat.toLocaleString("en-US", {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  });
  vatInput_W.value = vat.toFixed(2);
  const totalAmountPayable = totalRate + cashBond + deliveryFee + vat;
  _totalAmountPayableInput_W.value = totalAmountPayable.toFixed(2);
  _totalAmountPayableText_W.textContent = totalAmountPayable.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}


startDateInput_W.addEventListener('change', () => {
  updateReturnDateAndTotalRates_W();
  updateTotalAmountPayable_W();
});
totalDaysInput_W.addEventListener('change', updateReturnDateAndTotalRates_W);
totalWeeksInput_W.addEventListener('change', updateReturnDateAndTotalRates_W);
carPriceInputWeekly_W.addEventListener('change', updateReturnDateAndTotalRates_W);
cashRadio_W.addEventListener("change", updateTotalAmountPayable_W);
gCashRadio_W.addEventListener("change", updateTotalAmountPayable_W);
cardRadio_W.addEventListener("change", updateTotalAmountPayable_W);
totalRatesInput_W.addEventListener("input", updateTotalAmountPayable_W);
returnDateInput_W.addEventListener("change", updateTotalAmountPayable_W);
cashbondCheckbox_W.addEventListener("change", updateTotalAmountPayable_W);
_opt1_W.addEventListener("change", updateTotalAmountPayable_W);
_opt2_W.addEventListener("change", updateTotalAmountPayable_W);
_opt3_W.addEventListener("change", updateTotalAmountPayable_W);
_opt4_W.addEventListener("change", updateTotalAmountPayable_W);
_opt5_W.addEventListener("change", updateTotalAmountPayable_W);
_cashBondInput_W.addEventListener("input", updateTotalAmountPayable_W);
_deliveryFeeInput_W.addEventListener("input", updateTotalAmountPayable_W);

