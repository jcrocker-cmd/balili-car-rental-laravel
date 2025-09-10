const startDateInput_M = document.getElementById("startdate_monthly");
const totalDaysInput_M = document.getElementById("total_days_select_M");
const totalWeeksInput_M = document.getElementById("total_weeks_select_M");
const totalMonthsInput_M = document.getElementById("total_months_select_M");
const returnDateInput_M = document.getElementById("returndate_monthly");
const carPriceInputDaily_M = document.getElementById("car_price_daily_M");
const carPriceInputWeekly_M = document.getElementById("car_price_weekly_M");
const carPriceInputMonthly_M = document.getElementById("car_price_monthly_M");
const totalRatesParagraph_M = document.getElementById("total_rates_M");
const _opt1_M = document.getElementById("opt1_M");
const _opt2_M = document.getElementById("opt2_M");
const _opt3_M = document.getElementById("opt3_M");
const _opt4_M = document.getElementById("opt4_M");
const _opt5_M = document.getElementById("opt5_M");
const _cashBondInput_M = document.getElementById("cashbondAmount_input_M");
const _deliveryFeeInput_M = document.getElementById(
    "delivery_fee_value_input_M"
);
const _totalAmountPayableInput_M = document.getElementById(
    "total_amount_payable_input_M"
);
const _totalAmountPayableText_M = document.getElementById(
    "totalAmountPayable_M"
);
const cashRadio_M = document.getElementById("pay1_M");
const gcashRadio_M = document.getElementById("pay2_M");
const cardRadio_M = document.getElementById("pay3_M");
const vatParagraph_M = document.getElementById("vat_M");
const vatInput_M = document.getElementById("vat_input_M");
const totalRatesInput_M = document.getElementById("total_rates_input_M");
const cashbondCheckbox_M = document.getElementById("cashbond_M");

const today_M = new Date().toISOString().split("T")[0];
startDateInput_M.setAttribute("min", today_M);

// Initialize previous delivery mode price to 0
let previousOptionValue_M = 0;
const deliveryOptions_M = document.querySelectorAll('input[name="mode_del"]');

// Add event listener to each radio button
deliveryOptions_M.forEach((option) => {
    option.addEventListener("click", () => {
        // Get the value of the selected delivery option
        const selectedOptionValue = option.getAttribute("data-delivery-price");

        // Calculate the new total price by subtracting the previous delivery mode price and adding the new one
        const totalPriceElement = document.getElementById(
            "delivery_fee_value_M"
        );
        const currentPrice = parseFloat(totalPriceElement.innerText);
        const newPrice =
            currentPrice -
            previousOptionValue_M +
            parseFloat(selectedOptionValue);
        totalPriceElement.innerText = newPrice.toFixed(2);

        // Update the input field value as well
        const deliveryFeeInputElement = document.getElementById(
            "delivery_fee_value_input_M"
        );
        deliveryFeeInputElement.value = newPrice;

        // Update the previous delivery mode price to the current one
        previousOptionValue_M = parseFloat(selectedOptionValue);
    });
});

cashbondCheckbox_M.addEventListener("change", () => {
    const cashbondValue = parseInt(cashbondCheckbox_M.value);
    const cashbondAmountElement = document.getElementById("cashbondAmount_M");
    const cashbondInputElement = document.getElementById(
        "cashbondAmount_input_M"
    );

    if (cashbondCheckbox_M.checked) {
        // Checked → set cashbond
        cashbondAmountElement.innerText = cashbondValue.toLocaleString(
            "en-US",
            {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }
        );
        cashbondInputElement.value = cashbondValue;
    } else {
        // Unchecked → reset to 0
        cashbondAmountElement.innerText = (0).toLocaleString("en-US", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2,
        });
        cashbondInputElement.value = 0;
    }

    // Recalculate totals
    updateTotalAmountPayable_M();
});

function updateReturnDateAndTotalRates_M() {
    const startDate = new Date(startDateInput_M.value);
    const totalMonths = parseInt(totalMonthsInput_M.value) || 0;
    const totalWeeks = parseInt(totalWeeksInput_M.value) || 0;
    const totalDays = parseInt(totalDaysInput_M.value) || 0;

    const monthlyRate = parseFloat(carPriceInputMonthly_M.value) || 0;
    const weeklyRate = parseFloat(carPriceInputWeekly_M.value) || 0;
    const dailyRate = parseFloat(carPriceInputDaily_M.value) || 0;

    if (startDate) {
        // Calculate return date
        const returnDate = new Date(startDate);
        returnDate.setMonth(returnDate.getMonth() + totalMonths);
        returnDate.setDate(returnDate.getDate() + totalWeeks * 7 + totalDays);
        const returnDateString = returnDate.toISOString().split("T")[0];
        returnDateInput_M.value = returnDateString;

        // Calculate total rate
        const totalRates =
            totalMonths * monthlyRate +
            totalWeeks * weeklyRate +
            totalDays * dailyRate;
        totalRatesInput_M.value = totalRates;
        totalRatesParagraph_M.innerText = `${totalRates
            .toFixed(2)
            .replace(/\d(?=(\d{3})+\.)/g, "$&,")}`;

        // Update alert
        let alertText = "You are using ";
        if (totalMonths > 0) alertText += "<strong>MONTHLY</strong>";
        if (totalWeeks > 0)
            alertText +=
                (totalMonths > 0 ? " + " : "") + "<strong>WEEKLY</strong>";
        if (totalDays > 0)
            alertText +=
                (totalMonths > 0 || totalWeeks > 0 ? " + " : "") +
                "<strong>DAILY</strong>";
        document.getElementById(
            "rateTypeAlert"
        ).innerHTML = `${alertText} <strong>RATE</strong>`;

        const parts = [
            totalMonths && `${totalMonths} month${totalMonths > 1 ? "s" : ""}`,
            totalWeeks && `${totalWeeks} week${totalWeeks > 1 ? "s" : ""}`,
            totalDays && `${totalDays} day${totalDays > 1 ? "s" : ""}`,
        ];
        const durationText = parts.filter(Boolean).join(" ") || "0 days";
        document.getElementById("rental_duration_display_M").innerText =
            durationText;
        document.getElementById("rental_duration_input_M").value = durationText;
        updateTotalAmountPayable_M();
    }
}

function updateTotalAmountPayable_M() {
    const totalRate = parseFloat(totalRatesInput_M.value);
    const cashBond = parseFloat(_cashBondInput_M.value);
    const deliveryFee = parseFloat(_deliveryFeeInput_M.value);
    const vat = cardRadio_M.checked ? totalRate * 0.0275 : 0;
    vatParagraph_M.textContent = vat.toLocaleString("en-US", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });
    vatInput_M.value = vat.toFixed(2);
    const totalAmountPayable = totalRate + cashBond + deliveryFee + vat;
    _totalAmountPayableInput_M.value = totalAmountPayable.toFixed(2);
    _totalAmountPayableText_M.textContent = totalAmountPayable
        .toFixed(2)
        .replace(/\d(?=(\d{3})+\.)/g, "$&,");
}

startDateInput_M.addEventListener("change", () => {
    updateReturnDateAndTotalRates_M();
    updateTotalAmountPayable_M();
});
// Months, Weeks, Days change
totalMonthsInput_M.addEventListener("change", updateReturnDateAndTotalRates_M);
totalWeeksInput_M.addEventListener("change", updateReturnDateAndTotalRates_M);
totalDaysInput_M.addEventListener("change", updateReturnDateAndTotalRates_M);

// Car rates change
carPriceInputDaily_M.addEventListener(
    "change",
    updateReturnDateAndTotalRates_M
);
carPriceInputWeekly_M.addEventListener(
    "change",
    updateReturnDateAndTotalRates_M
);
carPriceInputMonthly_M.addEventListener(
    "change",
    updateReturnDateAndTotalRates_M
);

cashRadio_M.addEventListener("change", updateTotalAmountPayable_M);
gcashRadio_M.addEventListener("change", updateTotalAmountPayable_M);
cardRadio_M.addEventListener("change", updateTotalAmountPayable_M);
totalRatesInput_M.addEventListener("input", updateTotalAmountPayable_M);
returnDateInput_M.addEventListener("change", updateTotalAmountPayable_M);
cashbondCheckbox_M.addEventListener("change", updateTotalAmountPayable_M);
_opt1_M.addEventListener("change", updateTotalAmountPayable_M);
_opt2_M.addEventListener("change", updateTotalAmountPayable_M);
_opt3_M.addEventListener("change", updateTotalAmountPayable_M);
_opt4_M.addEventListener("change", updateTotalAmountPayable_M);
_opt5_M.addEventListener("change", updateTotalAmountPayable_M);
_cashBondInput_M.addEventListener("input", updateTotalAmountPayable_M);
_deliveryFeeInput_M.addEventListener("input", updateTotalAmountPayable_M);
