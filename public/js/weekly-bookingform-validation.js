// Add custom methods for start and return dates and times
$.validator.addMethod('startdate', function(value, element) {
  var startDate = new Date(value);
  var today = new Date();
  return startDate >= today;
}, 'Start date cannot be in the past.');

$.validator.addMethod('returndate', function(value, element) {
  var returnDate = new Date(value);
  var startDate = new Date($('#startdate').val());
  return returnDate >= startDate;
}, 'Return date must be after start date.');

$(document).ready(function() {
  // Initialize the validator
  var validator = $('#weekly_bookingForm').validate({
      rules: {
          start_date: {
              required: true,
              startdate: true
          },
          start_time: {
              required: true
          },
          return_date: {
              required: true,
              returndate: true
          },
          return_time: {
              required: true
          }
      },
      messages: {
          start_date: {
              required: 'Please enter a start date.'
          },
          start_time: {
              required: 'Please enter a start time.'
          },
          return_date: {
              required: 'Please enter a return date.'
          },
          return_time: {
              required: 'Please enter a return time.'
          }
      },
      errorPlacement: function(error, element) {
          if (element.attr("name") === "start_date") {
              error.insertAfter(element.next('#errorsd'));
          } else if (element.attr("name") === "start_time") {
              error.insertAfter(element.next('#errorst'));
          } else if (element.attr("name") === "return_date") {
              error.insertAfter(element.next('#errorrd'));
          } else if (element.attr("name") === "return_time") {
              error.insertAfter(element.next('#errorrt'));
          }
      },
      submitHandler: function(form) {
          form.submit();
      }
  });

  // Validate the form fields before submitting
  $('#daily_bookingForm').on('submit', function() {
      return validator.form();
  });

  // Validate the form fields on change and blur events
  $('#startdate, #starttime, #returndate, #returntime').on('change blur', function() {
      validator.element(this);
  });
});
