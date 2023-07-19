var RentForm = (function() {
	
	// selectors
	var selectors = {
    html:       'html',
    body:       'body',
    form:       '.js-rent-form',
    datePicker: '.js-datepicker',
    selectPeriode: '.js-select-periode',
    inputDateStart: '.js-input-date-start',
    inputDateEnd: '.js-input-date-end',
    wrapperDates: '.js-wrapper-dates',
    product: '.js-product',
	};

  var required = {
    productId: '.js-error-productId',
    periode: '.js-error-periode',
    name: '.js-error-name',
    firstname: '.js-error-firstname',
    company: '.js-error-company',
    email: '.js-error-email',
    phone: '.js-error-phone',
  }

  // Init
  var _initialize = function() {
    _bind();
  };

  // Bind events
  var _bind = function() {
    $(selectors.datePicker).flatpickr({
      enableTime: false,
      dateFormat: "d.m.Y",
      locale: "de",
      minDate: new Date().toLocaleDateString(),
      onChange: function(selectedDates, dateStr, instance) {
        _setEndDate(dateStr)
      }
    });

    $(selectors.selectPeriode).on('change', function() {

      // if the selected value is null, hide the date wrapper
      if (!$(this).val()) {
        $(selectors.wrapperDates).hide();
        return;
      }

      // if there is already a start date, set end date
      if ($(selectors.inputDateStart).val()) {
        _setEndDate($(selectors.inputDateStart).val());
      }
      $(selectors.wrapperDates).show();
    });

    $(selectors.product).on('click', function() {
      var productId = $(this).data('product');
      $('[name="product_id"]').val(productId);
      $(selectors.product).parent().parent().parent().removeClass('is-selected');
      $(this).parent().parent().parent().addClass('is-selected');
      $(required.productId).hide();
    });

    // on submit validate the form
    $(selectors.form).on('submit', function(e) {
      if (!_validateForm()) {
        e.preventDefault();
        return false;
      }
    });

  };

  var _setEndDate = function(startDate) {
    var periode = parseInt($(selectors.selectPeriode).val());
    
    // format startDate to yyyy-mm-dd
    startDate = startDate.split('.').reverse().join('-');

    // create timestamp of start date
    var startDateTimestamp = new Date(startDate).getTime();

    // add periode to start date
    var endDateTimestamp = startDateTimestamp + (periode * 24 * 60 * 60 * 1000);

    // create new date object
    var endDateObject = new Date(endDateTimestamp);

    // format to dd.mm.yyyy using 'toLocaleDateString' method with leading zeros
    var endDateFormatted = endDateObject.toLocaleDateString('de-DE', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric' 
    });

    // set end date
    $(selectors.inputDateEnd).val(endDateFormatted);

    $(required.periode).hide();

  };

  var _validateForm = function() {
    var isValid = true;

    // Product
    if ($('[name="product_id"]').val() == '') {
      $(required.productId).show();
      isValid = false;
    }

    // Periode
    if ($(selectors.selectPeriode).val() == '' || $(selectors.selectPeriode).val() == 'null' || $(selectors.inputDateStart).val() == '' || $(selectors.inputDateEnd).val() == '') {
      $(required.periode).show();
      isValid = false;
    }

    // Name
    if ($('[name="name"]').val() == '') {
      $(required.name).parent().addClass('has-error');
      isValid = false;
    }

    // Firstname
    if ($('[name="firstname"]').val() == '') {
      $(required.firstname).parent().addClass('has-error');
      isValid = false;
    }

    // Company
    if ($('[name="company"]').val() == '') {
      $(required.company).parent().addClass('has-error');
      isValid = false;
    }

    // Phone
    if ($('[name="phone"]').val() == '') {
      $(required.phone).parent().addClass('has-error');
      isValid = false;
    }

    // Email
    if ($('[name="email"]').val() == '' || !_validateEmail($('[name="email"]').val())) {
      $(required.email).parent().addClass('has-error');
      isValid = false;
    }

    if (!isValid) {
      $('html, body').animate({
        scrollTop: $('.error-message').offset().top - 100
      }, 500);
      return false;
    }

    if (isValid) {
      $(selectors.form).submit();
    }
  };

  var _validateEmail = function(email) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
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
  RentForm.init();
});

