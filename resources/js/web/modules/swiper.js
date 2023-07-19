/**
 * Dependencies
 */
import Swiper from '../vendor/swiper.js';

var SwiperUi = (function() {

  var mySwiper;
     
  // media queries
  var bp = window.matchMedia( '(min-width:960px)' );

  var _initialize = function() {
    _bind();
  };

  var _bind = function() {
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      speed: 800,
      autoplay: {
        delay: 3000,
      },
      spaceBetween: 10,
      breakpoints: {
        // 1440: {
        //   spaceBetween: 20
        // }
      }
    });
  };
  
  return {
    init:  _initialize,
  };
	
})();

// Initialize
$(function() {
  if ($('body').find('.swiper-container').length) {
    SwiperUi.init();
  }
});