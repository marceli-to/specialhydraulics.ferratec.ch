var Product = (function() {
	
	// selectors
	var selectors = {
    html:     'html',
    body:     'body',
    btnBack:  '.js-btn-back',
    dropdown: '.js-product-dd',
	};

  // Init
  var _initialize = function() {
    _bind();
  };

  // Bind events
  var _bind = function() {
    $(selectors.body).on('change', selectors.dropdown, function(){
      let target = $(this).val();
      if (target.length > 0 && target != 'null') {
        document.location.href = $(this).val();
      }
    });

    $(selectors.body).on('click', selectors.btnBack, function(){
      history.back();
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
  Product.init();
});

