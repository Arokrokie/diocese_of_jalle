(function($) {
  'use strict';

  /*-------------------------------------------------------------------------------
  Preloader — Fast & Responsive Dismiss
  -------------------------------------------------------------------------------*/
  function dismissPreloader() {
    var $preloader = $('.sigma_preloader');
    if ($preloader.length && !$preloader.hasClass('hidden')) {
      $preloader.addClass('hidden');
      setTimeout(function() {
        $preloader.css('display', 'none');
      }, 350);
    }
  }
  $(document).ready(function() { setTimeout(dismissPreloader, 150); });
  $(window).on('load', dismissPreloader);
  setTimeout(dismissPreloader, 500);

  /*-------------------------------------------------------------------------------
  Tooltips — Bootstrap 5 native API
  -------------------------------------------------------------------------------*/
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
      new bootstrap.Tooltip(el);
    });
  });

  /*-------------------------------------------------------------------------------
  Magnific Popup
  -------------------------------------------------------------------------------*/
  $('.popup-youtube').magnificPopup({type: 'iframe'});
  $('.popup-vimeo').magnificPopup({type: 'iframe'});
  $('.popup-video').magnificPopup({type: 'iframe'});
  $('.gallery-thumb').magnificPopup({ type: 'image', gallery: { enabled: true } });

  /*-------------------------------------------------------------------------------
  ion Range Sliders
  -------------------------------------------------------------------------------*/
  $(".js-range-slider").ionRangeSlider();

  /*-------------------------------------------------------------------------------
  Countdown
  -------------------------------------------------------------------------------*/
  function makeTimer() {
    var endTime = new Date("01 January 2026 00:00:00 GMT+03:00");
    endTime = (Date.parse(endTime) / 1000);
    var now = new Date();
    now = (Date.parse(now) / 1000);
    var timeLeft = endTime - now;
    var days    = Math.floor(timeLeft / 86400);
    var hours   = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
    if (hours   < 10) { hours   = "0" + hours; }
    if (minutes < 10) { minutes = "0" + minutes; }
    if (seconds < 10) { seconds = "0" + seconds; }
    $(".days").html(days);
    $(".hours").html(hours);
    $(".minutes").html(minutes);
    $(".seconds").html(seconds);
  }
  setInterval(makeTimer, 1000);

  /*-------------------------------------------------------------------------------
  Counter
  -------------------------------------------------------------------------------*/
  $(".counter").each(function() {
    var $this = $(this);
    $this.one('inview', function(event, isInView) {
      if (isInView) { $this.countTo({speed: 2000}); }
    });
  });

  /*-------------------------------------------------------------------------------
  Checkout Notices
  -------------------------------------------------------------------------------*/
  $(".sigma_notice a").on('click', function(e) {
    e.preventDefault();
    $(this).closest('.sigma_notice').next().slideToggle();
  });

  /*-------------------------------------------------------------------------------
  Progress bar on view
  -------------------------------------------------------------------------------*/
  $(".sigma_progress-round").each(function() {
    var animateTo = $(this).data('to'), $this = $(this);
    $this.one('inview', function(event, isInView) {
      if (isInView) { $this.css({'stroke-dashoffset': animateTo}); }
    });
  });

  $(".sigma_progress").each(function() {
    var progressBar   = $(this).find(".progress-bar");
    var progressCount = $(this).find(".sigma_progress-count");
    $(progressBar).one('inview', function(event, isInView) {
      if (isInView) {
        $(progressBar).animate({ width: $(progressBar).attr("aria-valuenow") + "%" }, function() {
          $(progressCount).animate({ left: $(progressBar).attr("aria-valuenow") + "%", opacity: 1 });
        });
      }
    });
  });

  /*-------------------------------------------------------------------------------
  Sliders
  -------------------------------------------------------------------------------*/
  $(".sigma_testimonial-slider").slick({
    slidesToShow: 2, slidesToScroll: 1, arrows: true,
    prevArrow: $('.testimonial-section .slider-prev'),
    nextArrow: $('.testimonial-section .slider-next'),
    dots: false, autoplay: true,
    responsive: [{ breakpoint: 767, settings: { slidesToShow: 1 } }]
  });

  $(".sigma_testimonial-slider-1").slick({
    slidesToShow: 1, slidesToScroll: 1, arrows: false, dots: true, autoplay: true
  });

  $(".basic-dot-slider").slick({
    slidesToShow: 1, slidesToScroll: 1, arrows: false, dots: true, autoplay: true
  });

  $(".banner-3 .sigma_banner-slider, .banner-1 .sigma_banner-slider, .banner-2 .sigma_banner-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 900,
    fade: true,
    cssEase: 'ease-in-out',
    infinite: true,
    pauseOnHover: true,
    prevArrow: '<div class="slick-prev slick-arrow"><i class="far fa-chevron-left"></i></div>',
    nextArrow: '<div class="slick-next slick-arrow"><i class="far fa-chevron-right"></i></div>',
    responsive: [{ breakpoint: 991, settings: { arrows: false, dots: true } }]
  });

  $(".sigma_product-slider").slick({
    slidesToShow: 4, slidesToScroll: 1, arrows: false, dots: true, autoplay: true,
    responsive: [
      { breakpoint: 991, settings: { slidesToShow: 3 } },
      { breakpoint: 767, settings: { slidesToShow: 2 } },
      { breakpoint: 576, settings: { slidesToShow: 1 } }
    ]
  });

  $('.sigma_product-single-thumb .slider').slick({
    slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true,
    asNavFor: '.sigma_product-single-thumb .slider-nav'
  });

  $('.sigma_product-single-thumb .slider-nav').slick({
    slidesToShow: 3, slidesToScroll: 1,
    asNavFor: '.sigma_product-single-thumb .slider',
    dots: false, centerMode: false, arrows: false, focusOnSelect: true
  });

  $(".portfolio-slider").slick({
    slidesToShow: 2, slidesToScroll: 1, arrows: true, dots: false, autoplay: false,
    prevArrow: $('.portfolio-section .slider-prev'),
    nextArrow: $('.portfolio-section .slider-next'),
    responsive: [{ breakpoint: 767, settings: { slidesToShow: 1 } }]
  });

  $(".post-format-gallery .sigma_post-thumb").slick({
    slidesToShow: 1, slidesToScroll: 1, arrows: true, dots: true, autoplay: false,
    centerMode: true, centerPadding: 0,
    responsive: [{ breakpoint: 767, settings: { arrows: false } }]
  });

  /*-------------------------------------------------------------------------------
  Masonry / Isotope
  -------------------------------------------------------------------------------*/
  $('.masonry').imagesLoaded(function() {
    $('.masonry').isotope({ itemSelector: '.masonry-item' });
  });

  function doIsotope() {
    var $portfolioGrid = '';
    $('.portfolio-filter').imagesLoaded(function() {
      $portfolioGrid = $('.portfolio-filter').isotope({
        itemSelector: '.col-lg-4',
        percentPosition: true,
        masonry: { columnWidth: '.col-lg-4' }
      });
    });
    $('.filter-items').on('click', '.portfolio-trigger', function() {
      $portfolioGrid.isotope({ filter: $(this).attr('data-filter') });
    });
    $('.portfolio-trigger').on('click', function(e) {
      e.preventDefault();
      $(this).closest('.filter-items').find('.active').removeClass('active');
      $(this).addClass('active');
    });
  }
  doIsotope();

  /*-------------------------------------------------------------------------------
  Sticky Header
  -------------------------------------------------------------------------------*/
  function doSticky() {
    var $header = $('.sigma_header.can-sticky');
    if (!$header.length) return;
    if ($(window).scrollTop() > 100) {
      $header.addClass('sticky');
    } else {
      $header.removeClass('sticky');
    }
  }
  doSticky();

  /*-------------------------------------------------------------------------------
  Add / Subtract Quantity
  -------------------------------------------------------------------------------*/
  $(".qty span").on('click', function() {
    var qty = $(this).closest('.qty').find('input');
    var qtyVal = parseInt(qty.val());
    if ($(this).hasClass('qty-add')) {
      qty.val(qtyVal + 1);
    } else {
      return qtyVal > 1 ? qty.val(qtyVal - 1) : 0;
    }
  });

  /*-------------------------------------------------------------------------------
  Back to Top
  -------------------------------------------------------------------------------*/
  $('.sigma_back-to-top').on('click', function() {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });

  /*-------------------------------------------------------------------------------
  Aside / Mobile Navigation Toggle
  -------------------------------------------------------------------------------*/
  function closeAllAsides() {
    $('.sigma_aside').removeClass('open');
    $('.sigma_aside-overlay').removeClass('active').css({ opacity: '', visibility: '' });
    $('body').removeClass('aside-open aside-right-open');
  }

  // Hamburger / left aside trigger
  $(document).on('click', '.aside-trigger-left', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $aside = $('.sigma_aside-left');
    if ($aside.hasClass('open')) {
      closeAllAsides();
    } else {
      closeAllAsides();
      $aside.addClass('open');
      $('.sigma_aside-overlay').addClass('active');
      $('body').addClass('aside-open');
    }
  });

  // Close button inside aside
  $(document).on('click', '.aside-close-btn', function(e) {
    e.preventDefault();
    closeAllAsides();
  });

  // Right aside (quick info) trigger
  $(document).on('click', '.aside-trigger-right:not(.aside-trigger-left)', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $aside = $('.sigma_aside-right');
    if ($aside.hasClass('open')) {
      closeAllAsides();
    } else {
      closeAllAsides();
      $aside.addClass('open');
      $('.sigma_aside-overlay').addClass('active');
      $('body').addClass('aside-right-open');
    }
  });

  // Close on overlay click
  $(document).on('click', '.sigma_aside-overlay', function(e) {
    e.preventDefault();
    closeAllAsides();
  });

  // Close when clicking anywhere outside aside
  $(document).on('click', function(e) {
    if ($('.sigma_aside.open').length && !$(e.target).closest('.sigma_aside, .aside-trigger-left, .aside-trigger-right').length) {
      closeAllAsides();
    }
  });

  // Close on ESC
  $(document).on('keydown', function(e) {
    if (e.key === 'Escape') { closeAllAsides(); }
  });

  // Accordion submenus inside mobile aside
  $(document).on('click', '.sigma_aside-left .menu-item-has-children > a', function(e) {
    e.preventDefault();
    var $sub = $(this).siblings('.sub-menu');
    if (!$sub.length) $sub = $(this).next('.sub-menu');
    if ($sub.length) {
      $sub.slideToggle(250);
      $(this).parent().toggleClass('open');
    }
  });

  /*-------------------------------------------------------------------------------
  WOW.js init
  -------------------------------------------------------------------------------*/
  new WOW().init();

  // Scroll events
  $(window).on('scroll', function() { doSticky(); });

  // Resize events
  $(window).on('resize', function() {});

})(jQuery);


/* ============================================================
   ARIA Accessibility Enhancements
   ============================================================ */
(function () {
  'use strict';

  function ariaInit() {

    var socialMap = {
      'fa-facebook': 'Facebook', 'fa-facebook-f': 'Facebook',
      'fa-twitter': 'Twitter', 'fa-instagram': 'Instagram',
      'fa-linkedin': 'LinkedIn', 'fa-linkedin-in': 'LinkedIn',
      'fa-youtube': 'YouTube', 'fa-whatsapp': 'WhatsApp'
    };
    document.querySelectorAll('a').forEach(function (link) {
      if (link.getAttribute('aria-label')) return;
      var icon = link.querySelector('i[class]');
      if (!icon) return;
      var cls = icon.className;
      for (var key in socialMap) {
        if (cls.indexOf(key) !== -1) { link.setAttribute('aria-label', socialMap[key]); break; }
      }
    });

    var arrowSel = [
      '.slick-prev', '.slick-next',
      '[class*="slider-prev"]', '[class*="slider-next"]'
    ].join(',');
    document.querySelectorAll(arrowSel).forEach(function (el) {
      var isPrev = /prev|left/i.test(el.className);
      if (!el.getAttribute('role'))       el.setAttribute('role', 'button');
      if (!el.getAttribute('aria-label')) el.setAttribute('aria-label', isPrev ? 'Previous slide' : 'Next slide');
      if (!el.getAttribute('tabindex'))   el.setAttribute('tabindex', '0');
    });

    document.querySelectorAll('.back-to-top, #back-to-top').forEach(function (el) {
      if (!el.getAttribute('aria-label')) el.setAttribute('aria-label', 'Back to top');
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ariaInit);
  } else {
    ariaInit();
  }

})();