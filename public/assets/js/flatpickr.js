// npm package: flatpickr
// github link: https://github.com/flatpickr/flatpickr

$(function() {
  'use strict';

  // date picker
  if($('#flatpickr-date').length) {
    flatpickr("#flatpickr-date", {
      wrap: true,
    //   minDate: "today",
      dateFormat: "Y-m-d",
    //   disable: ["2023-07-19", "2023-08-17", "2023-09-28", "2023-10-01", ],
    });
  }


  // time picker
  if($('#flatpickr-time').length) {
    flatpickr("#flatpickr-time", {
      wrap: true,
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
    });
  }

});
