/* BACK TO TOP */

jQuery(document).ready(function ($) {
  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $('.windowtop');

  //hide or show the "back to top" link
  $(window).scroll(function () {
    $(this).scrollTop() > offset
      ? $back_to_top.addClass('cd-is-visible')
      : $back_to_top.removeClass('cd-is-visible cd-fade-out');
    if ($(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass('cd-fade-out');
    }
  });

  //smooth scroll to top
  $back_to_top.on('click', function (event) {
    event.preventDefault();
    $('body,html').animate(
      {
        scrollTop: 0,
      },
      scroll_top_duration
    );
  });
});

// function sizer() {
//   if ($(document).scrollTop() > 0) {
//     $('header .top').toggleClass('reduced', $(document).scrollTop() > 0);
//     // $('header .top ').stop().animate(
//     //   {
//     //     lineHeight: '85px',
//     //   },
//     //   30
//     // );
//   } else {
//     $('header .top').toggleClass('reduced', $(document).scrollTop() > 0);
//     // $('header .top').stop().animate(
//     //   {
//     //     lineHeight: '115px',
//     //   },
//     //   30
//     // );
//   }
// }

// $(window).scroll(function () {
//   sizer();
// });

// sizer();

// FAQ accordion functionality
(function () {
  var d = document,
    accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
    setAria,
    setAccordionAria,
    switchAccordion,
    touchSupported = 'ontouchstart' in window,
    pointerSupported = 'pointerdown' in window;

  skipClickDelay = function (e) {
    e.preventDefault();
    e.target.click();
  };

  setAriaAttr = function (el, ariaType, newProperty) {
    el.setAttribute(ariaType, newProperty);
  };
  setAccordionAria = function (el1, el2, expanded) {
    switch (expanded) {
      case 'true':
        setAriaAttr(el1, 'aria-expanded', 'true');
        setAriaAttr(el2, 'aria-hidden', 'false');
        break;
      case 'false':
        setAriaAttr(el1, 'aria-expanded', 'false');
        setAriaAttr(el2, 'aria-hidden', 'true');
        break;
      default:
        break;
    }
  };
  //function
  switchAccordion = function (e) {
    console.log('triggered');
    e.preventDefault();
    var thisAnswer = e.target.parentNode.nextElementSibling;
    var thisQuestion = e.target;
    if (thisAnswer.classList.contains('is-collapsed')) {
      setAccordionAria(thisQuestion, thisAnswer, 'true');
    } else {
      setAccordionAria(thisQuestion, thisAnswer, 'false');
    }
    thisQuestion.classList.toggle('is-collapsed');
    thisQuestion.classList.toggle('is-expanded');
    thisAnswer.classList.toggle('is-collapsed');
    thisAnswer.classList.toggle('is-expanded');

    thisAnswer.classList.toggle('animateIn');
  };
  for (var i = 0, len = accordionToggles.length; i < len; i++) {
    if (touchSupported) {
      accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
    }
    if (pointerSupported) {
      accordionToggles[i].addEventListener(
        'pointerdown',
        skipClickDelay,
        false
      );
    }
    accordionToggles[i].addEventListener('click', switchAccordion, false);
  }
})();

/* MOBILE MENU */

(function ($) {
  var $window = $(window),
    $body = $('body'),
    $header = $('#header'),
    $banner = $('#banner');

  // Breakpoints.
  // breakpoints({
  //   xlarge: '(max-width: 1680px)',
  //   large: '(max-width: 1280px)',
  //   medium: '(max-width: 980px)',
  //   small: '(max-width: 736px)',
  //   xsmall: '(max-width: 480px)',
  // });

  // Play initial animations on page load.
  $window.on('load', function () {
    window.setTimeout(function () {
      $body.removeClass('is-preload');
    }, 100);
  });

  // Header.
  if ($banner.length > 0 && $header.hasClass('alt')) {
    $window.on('resize', function () {
      $window.trigger('scroll');
    });

    $banner.scrollex({
      bottom: $header.outerHeight(),
      terminate: function () {
        $header.removeClass('alt');
      },
      enter: function () {
        $header.addClass('alt');
      },
      leave: function () {
        $header.removeClass('alt');
      },
    });
  }

  // Menu.
  var $menu = $('#menu');

  $menu._locked = false;

  $menu._lock = function () {
    if ($menu._locked) return false;

    $menu._locked = true;

    window.setTimeout(function () {
      $menu._locked = false;
    }, 350);

    return true;
  };

  $menu._show = function () {
    if ($menu._lock()) $body.addClass('is-menu-visible');
  };

  $menu._hide = function () {
    if ($menu._lock()) $body.removeClass('is-menu-visible');
  };

  $menu._toggle = function () {
    if ($menu._lock()) $body.toggleClass('is-menu-visible');
  };

  $menu
    .appendTo($body)
    .on('click', function (event) {
      event.stopPropagation();

      // Hide.
      $menu._hide();
    })
    .find('.inner')
    .on('click', '.close', function (event) {
      event.preventDefault();
      event.stopPropagation();
      event.stopImmediatePropagation();

      // Hide.
      $menu._hide();
    })
    .on('click', function (event) {
      event.stopPropagation();
    })
    .on('click', 'a', function (event) {
      var href = $(this).attr('href');

      event.preventDefault();
      event.stopPropagation();

      // Hide.
      $menu._hide();

      // Redirect.
      window.setTimeout(function () {
        window.location.href = href;
      }, 350);
    });

  $body
    .on('click', 'a[href="#menu"]', function (event) {
      event.stopPropagation();
      event.preventDefault();

      // Toggle.
      $menu._toggle();
    })
    .on('keydown', function (event) {
      // Hide on escape.
      if (event.keyCode == 27) $menu._hide();
    });
})(jQuery);

// $(document).ready(function () {

//    // Desktop widget circle-button logic
//    $(".collapsible-desktop").click(function(e) {
//     e.preventDefault();
//     var tab = $(this).attr("id");
//     var self = $(this);
//     $(".content.desktop").not(tab).css("display", "none");
//     $(this).toggleClass("active");
//     $(".collapsible-desktop").not(self).removeClass("active");
//     $(tab).toggle();
//   });
// }
