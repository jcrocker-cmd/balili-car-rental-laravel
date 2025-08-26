const startDateInput = document.getElementById('startdate');
const totalWeeksInput = document.getElementById('total_months_select');
const returnDateInput = document.getElementById('returndate');
const carPriceInput = document.getElementById('car_price');
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
  // Get the selected start date
  const startDate = new Date(startDateInput.value);

  const totalMonths = parseInt(totalWeeksInput.value);
  const carPrice = parseFloat(carPriceInput.value);

  // Calculate the return date and total rates
  if (startDate && !isNaN(totalMonths) && !isNaN(carPrice)) {
    const returnDate = new Date(startDate);
    returnDate.setMonth(returnDate.getMonth() + totalMonths);
    const returnDateString = returnDate.toISOString().split('T')[0];
    const totalRates = totalMonths * carPrice;
    
    // Update the return date, total rates input, and paragraph elements
    returnDateInput.value = returnDateString;
    totalRatesInput.value = totalRates;
    totalRatesParagraph.innerText = `${totalRates.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`;
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
totalWeeksInput.addEventListener('change', updateReturnDateAndTotalRates);
carPriceInput.addEventListener('change', updateReturnDateAndTotalRates);
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


