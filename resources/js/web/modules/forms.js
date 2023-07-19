var Forms = (function() {
	
	// selectors
	var selectors = {
    html:       'html',
    body:       'body',
    datePicker: '.js-datepicker',
    dateTimePicker: '.js-datetimepicker',
	};

  // Init
  var _initialize = function() {
    _bind();
  };

  // Bind events
  var _bind = function() {

    $(selectors.dateTimePicker).flatpickr({
      enableTime: true,
      dateFormat: "d.m.Y H:i",
      locale: "de",
      minDate: new Date().toLocaleDateString()
    });

    $(selectors.datePicker).flatpickr({
      enableTime: false,
      dateFormat: "d.m.Y",
      locale: "de",
      minDate: new Date().toLocaleDateString()
    });
  };


  /* --------------------------------------------------------------
    * RETURN PUBLIC METHODS
    * ------------------------------------------------------------ */

  return {
    init:  _initialize,
  };
	
})();

// Initialize
$(function() {
  Forms.init();
});

