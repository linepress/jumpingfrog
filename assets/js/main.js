// ==========================================================================
// Include own script here
// ==========================================================================

;(function ($) {

  $( document ).ready( function() {

  });

})(jQuery);

// ==========================================================================
// Function returns an array with viewport width and height, that can be used
// to activate JS on certain CSS viewports. How to use: get_viewport_size().height
//
// $(document).width(), $(body).width can return different values between
// browsers, this function always returns the same value
// ==========================================================================

get_viewport_size = function() {
  var e = window, a = 'inner';
  if (!('innerWidth' in window )) {
    a = 'client';
    e = document.documentElement || document.body;
  }
  return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
};

// ==========================================================================
// Include plugins here (the minified version as much as possible)
// ==========================================================================