/**
 Core layout handlers and component wrappers
 **/

// BEGIN: Layout Brand
var LayoutBrand = function () {

  return {
    //main function to initiate the module
    init: function () {
      $('body').on('click', '.c-hor-nav-toggler', function () {
        var target = $(this).data('target');
        $(target).toggleClass("c-shown");
      });
    }

  };
}();
// END

// BEGIN: Layout Brand
var LayoutHeaderCart = function () {

  return {
    //main function to initiate the module
    init: function () {
      var cart = $('.c-cart-menu');

      if (cart.size() === 0) {
        return;
      }

      if (App.getViewPort().width < App.getBreakpoint('md')) { // mpbile mode
        $('body').on('click', '.c-cart-toggler', function (e) {
          e.preventDefault();
          e.stopPropagation();
          $('body').toggleClass("c-header-cart-shown");
        });

        $('body').on('click', function (e) {
          if (!cart.is(e.target) && cart.has(e.target).length === 0) {
            $('body').removeClass('c-header-cart-shown');
          }
        });
      } else { // desktop
        $('body').on('hover', '.c-cart-toggler, .c-cart-menu', function (e) {
          $('body').addClass("c-header-cart-shown");
        });

        $('body').on('hover', '.c-mega-menu > .navbar-nav > li:not(.c-cart-toggler-wrapper)', function (e) {
          $('body').removeClass("c-header-cart-shown");
        });

        $('body').on('mouseleave', '.c-cart-menu', function (e) {
          $('body').removeClass("c-header-cart-shown");
        });
      }
    }
  };
}();
// END

// BEGIN: Layout Header
var LayoutHeader = function () {
  var offset = parseInt($('.c-layout-header').attr('data-minimize-offset') > 0 ? parseInt($('.c-layout-header').attr('data-minimize-offset')) : 0);
  var _handleHeaderOnScroll = function () {
    if ($(window).scrollTop() > offset) {
      $("body").addClass("c-page-on-scroll");
    } else {
      $("body").removeClass("c-page-on-scroll");
    }
  }

  var _handleTopbarCollapse = function () {
    $('.c-layout-header .c-topbar-toggler').on('click', function (e) {
      $('.c-layout-header-topbar-collapse').toggleClass("c-topbar-expanded");
    });
  }

  return {
    //main function to initiate the module
    init: function () {
      if ($('body').hasClass('c-layout-header-fixed-non-minimized')) {
        return;
      }

      _handleHeaderOnScroll();
      _handleTopbarCollapse();

      $(window).scroll(function () {
        _handleHeaderOnScroll();
      });
    }
  };
}();
// END

var LayoutCartMenu = function () {

  return {
    //main function to initiate the module
    init: function () {
      // desktop mode
      $('.c-layout-header').on('mouseenter', '.c-mega-menu .c-cart-toggler-wrapper', function (e) {
        e.preventDefault();

        $('.c-cart-menu').addClass('c-layout-cart-menu-shown');

      });

      $('.c-cart-menu, .c-layout-header').on('mouseleave', function (e) {
        e.preventDefault();

        $('.c-cart-menu').removeClass('c-layout-cart-menu-shown');

      });

      // mobile mode
      $('.c-layout-header').on('click', '.c-brand .c-cart-toggler', function (e) {
        e.preventDefault();

        $('.c-cart-menu').toggleClass('c-layout-cart-menu-shown');

      });
    }
  };
}();
// END

// BEGIN: Layout Go To Top
var LayoutGo2Top = function () {

  var handle = function () {
    var currentWindowPosition = $(window).scrollTop(); // current vertical position
    if (currentWindowPosition > 300) {
      $(".c-layout-go2top").show();
    } else {
      $(".c-layout-go2top").hide();
    }
  };

  return {

    //main function to initiate the module
    init: function () {

      handle(); // call headerFix() when the page was loaded

      if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
        $(window).bind("touchend touchcancel touchleave", function (e) {
          handle();
        });
      } else {
        $(window).scroll(function () {
          handle();
        });
      }

      $(".c-layout-go2top").on('click', function (e) {
        e.preventDefault();
        $("html, body").animate({
          scrollTop: 0
        }, 600);
      });
    }

  };
}();
// END: Layout Go To Top

// BEGIN : DATEPICKERS
var ContentDatePickers = function () {

  var handleDatePickers = function () {

    $('.date-picker').each(function () {
      $(this).datepicker({
        rtl: $(this).data('rtl'),
        orientation: "left",
        autoclose: true,
        container: $(this),
        format: $(this).data('date-format'),
      });
    });
  };

  return {
    //main function to initiate the module
    init: function () {
      handleDatePickers();
    }
  };

}();
// END : DATEPICKERS


// BEGIN: ContentCubeLatestPortfolio
var ContentCubeLatestPortfolio = function () {

  var _initInstances = function () {

    // init cubeportfolio
    $('.c-content-latest-works').cubeportfolio({
      filters: '#filters-container',
      loadMore: '#loadMore-container',
      loadMoreAction: 'click',
      layoutMode: 'grid',
      defaultFilter: '*',
      animationType: 'quicksand',
      gapHorizontal: 20,
      gapVertical: 23,
      gridAdjustment: 'responsive',
      mediaQueries: [{
        width: 1100,
        cols: 4
      }, {
        width: 800,
        cols: 3
      }, {
        width: 500,
        cols: 2
      }, {
        width: 320,
        cols: 1
      }],
      caption: 'zoom',
      displayType: 'lazyLoading',
      displayTypeSpeed: 100,

      // lightbox
      lightboxDelegate: '.cbp-lightbox',
      lightboxGallery: true,
      lightboxTitleSrc: 'data-title',
      lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

      // singlePage popup
      singlePageDelegate: '.cbp-singlePage',
      singlePageDeeplinking: true,
      singlePageStickyNavigation: true,
      singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
      singlePageCallback: function (url, element) {
        // to update singlePage content use the following method: this.updateSinglePage(yourContent)
        var t = this;

        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'html',
          timeout: 5000
        })
          .done(function (result) {
            t.updateSinglePage(result);
          })
          .fail(function () {
            t.updateSinglePage("Error! Please refresh the page!");
          });
      },
    });

    $('.c-content-latest-works-fullwidth').cubeportfolio({
      loadMoreAction: 'auto',
      layoutMode: 'grid',
      defaultFilter: '*',
      animationType: 'fadeOutTop',
      gapHorizontal: 0,
      gapVertical: 0,
      gridAdjustment: 'responsive',
      mediaQueries: [{
        width: 1600,
        cols: 5
      }, {
        width: 1200,
        cols: 4
      }, {
        width: 800,
        cols: 3
      }, {
        width: 500,
        cols: 2
      }, {
        width: 320,
        cols: 1
      }],
      caption: 'zoom',
      displayType: 'lazyLoading',
      displayTypeSpeed: 100,

      // lightbox
      lightboxDelegate: '.cbp-lightbox',
      lightboxGallery: true,
      lightboxTitleSrc: 'data-title',
      lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    });

  };

  return {

    //main function to initiate the module
    init: function () {
      _initInstances();
    }

  };
}();
// END: ContentCubeLatestPortfolio

// Main theme initialization
$(document).ready(function () {
  LayoutBrand.init();
  LayoutHeaderCart.init();
  LayoutCartMenu.init();
  LayoutGo2Top.init();
  LayoutHeader.init();

  ContentDatePickers.init();
  ContentCubeLatestPortfolio.init();
});