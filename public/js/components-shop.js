// BEGIN: Layout Checkbox Visibility Toggle
var LayoutCheckboxVisibilityToggle = function () {

  return {
    //main function to initiate the module
    init: function () {
      $('.c-toggle-hide').each(function () {
        var $checkbox = $(this).find('input.c-check'),
          $speed = $(this).data('animation-speed'),
          $object = $('.' + $(this).data('object-selector'));

        $object.hide();

        if (typeof $speed === 'undefined') {
          $speed = 'slow';
        }

        $($checkbox).on('change', function () {
          if ($($object).is(':hidden')) {
            $($object).show($speed);
          } else {
            $($object).slideUp($speed);
          }
        });
      });
    }
  };

}();

// PRODUCT GALLERY
var LayoutProductGallery = function () {
  return {
    //main function to initiate the module
    init: function () {
      $('.c-product-gallery-content .c-zoom').toggleClass('c-hide'); // INIT FUNCTION - HIDE ALL IMAGES

      // SET GALLERY ORDER
      var i = 1;
      $('.c-product-gallery-content .c-zoom').each(function () {
        $(this).attr('img_order', i);
        i++;
      });

      // INIT ZOOM MASTER PLUGIN
      $('.c-zoom').each(function () {
        $(this).zoom();
      });

      // ASSIGN THUMBNAIL TO IMAGE
      var i = 1;
      $('.c-product-thumb img').each(function () {
        $(this).attr('img_order', i);
        i++;
      });

      // INIT FIRST IMAGE
      $('.c-product-gallery-content .c-zoom[img_order="1"]').toggleClass('c-hide');

      // CHANGE IMAGES ON THUMBNAIL CLICK
      $('.c-product-thumb img').click(function () {
        var img_target = $(this).attr('img_order');

        $('.c-product-gallery-content .c-zoom').addClass('c-hide');
        $('.c-product-gallery-content .c-zoom[img_order="' + img_target + '"]').removeClass('c-hide');
      });

      // SET THUMBNAIL HEIGHT
      var thumb_width = $('.c-product-thumb').width();
      $('.c-product-thumb').height(thumb_width);

    }
  }
}();

// Main theme initialization
$(document).ready(function () {
  // init layout handlers
  LayoutCheckboxVisibilityToggle.init();
  LayoutProductGallery.init();
});