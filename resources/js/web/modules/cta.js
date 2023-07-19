import debounce from '../vendor/debounce';

var Cta = (function() {
	
	// selectors
	var selectors = {
    html:       'html',
    body:       'body',
    main:       'main',
    footer:     'footer',
    btnCta:     '.js-btn-cta',
    wrapperCta: '.js-wrapper-cta',
	};

  var classes = {
    hidden: 'is-hidden',
  };

  // Init
  var _initialize = function() {
    _bind();
  };

  // Bind events
  var _bind = function() {

    $(selectors.body).on('click', selectors.btnCta, function(){
      _scrollToCta();
    });

    window.addEventListener('scroll', _scroll);
    window.addEventListener('resize', _resize);
  };

  var _scrollToCta = function(btn){
    var offset = $(selectors.wrapperCta).offset().top - 80;
    $.scrollTo(offset, 500);
  };

  var _scroll = debounce(function() {
    var treshold = $(selectors.wrapperCta).height() + $(selectors.footer).height();
    
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - treshold) {
      _showBtn();
    }
    else {
      _hideBtn();
    }
  }, 100);

  var _resize = debounce(function(){
    var treshold = $(selectors.wrapperCta).height() + $(selectors.footer).height();

    if ($(window).height() <= ($(selectors.main).height() + treshold)) {
      _hideBtn();
    }
    else {
      _showBtn();
    }

  }, 100);

  var _showBtn = function() {
    $(selectors.btnCta).addClass(classes.hidden);
  };

  var _hideBtn = function() {
    $(selectors.btnCta).removeClass(classes.hidden);
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
  Cta.init();
});

