/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

jQuery(document).foundation();



// function image_pan(t){t&&t.preventDefault(),t.target===btn_prev[0]?(banner.css({"background-position-x":"0"}),btn_prev.addClass("off"),btn_next.removeClass("off")):(banner.css({"background-position-x":"100%"}),btn_prev.removeClass("off"),btn_next.addClass("off")),console.log(t)}var banner=$("#banner .img"),btn_prev=null,btn_next=null;$(document).ready(function(){banner=$("#banner .img");var t=$(this);banner.length>0&&(btn_prev=$("#banner .img a#btn_prev").click(image_pan),btn_next=$("#banner .img a#btn_next").click(image_pan)),$(document).on("click","[data-menu-toggle]",function(e){var n=$(this);if(t.width()<(n.data("toggle-width")?n.data("toggle-width"):768)){e&&e.preventDefault();var i=$($(this).attr("data-menu-toggle")),a=$(this);i.length>0&&i.each(function(){var t=$(this);t.hasClass("on")?(a.removeClass("open"),t.removeClass("on")):(a.hasClass("open")||a.addClass("open"),t.addClass("on"))})}}),$("#mm .has-dropdown > a").click(function(t){$(this);var e=$(this).parent(),n=e.find(".sub-menu");$(".menu-toggle").is(":visible")&&(t.preventDefault(),n.toggleClass("on"))}),$(document).on("submit","#email-signup",function(t){t&&t.preventDefault();var e=$(this),n=e.next("#thanks");$.ajax({type:"GET",url:e.attr("action")+"?callback=?",data:e.serialize(),cache:!1,dataType:"json",error:function(){alert("Could not connect to the registration server. Please try again later.")},success:function(t){200==t.Status?e.fadeTo(250,0,function(){e.remove(),n.length>0&&n.fadeTo(0,0).removeClass("hide").fadeTo(250,1)}):alert(t.Message)}})})});    //var infinite_scroll = "{\"loading\":{\"msgText\":\"<em>Loading...<\\\/em>\",\"finishedMsg\":\"</em><em>No additional posts.<\\\/em>\",\"img\":\"http:\\\/\\\/moocabier.com.br\\\/wp-content\\\/plugins\\\/infinite-scroll\\\/img\\\/ajax-loader.gif\"},\"nextSelector\":\".nav-previous a\",\"navSelector\":\".nav-links\",\"itemSelector\":\".post\",\"contentSelector\":\"#blog-content\",\"debug\":false,\"behavior\":\"\",\"callback\":\"\"}";
// $(document).ready(function () {
//   if ($('html.no-svg').length > 0) {
//     $('img[src$=svg], img[src$=svgz]').each(function () {
//       $(this).attr('src', function (index, attr) { return attr.replace(/^(.+\/)?(.+)\.svgz?/, '$1$2.png'); })
//     });
//   }
//       });



//   function isSmall() {
//     return $('#main-nav .menu-toggle').is(':visible');
//   }

//   $(document).ready(
//     function () {
//       $('a.no-spam-please').each(
//         function () {
//           var $this = $(this);
//           var email = $this.attr('to') || $this.html();
//           var noHTML = !email;
//           if (noHTML) {
//             email = $this.attr('title');
//           }
//           var subject = $this.attr('subject') || '';
//           if (subject) {
//             $this.removeAttr('subject');
//             subject = '?subject=' + subject;
//           }
//           $this.attr('href', 'mailto:' + email.replace(/^(.+\s)?([^\s]+)\s*\(at\)\s*([^\s]+)(\s.+)?$/, '$2@$3').toLowerCase() + subject);
//           if ($this.attr('to')) {
//             $this.removeAttr('to');
//           } else if (!noHTML) {
//             $this.html(email.replace(/\s*\(at\)\s*/, '<span class="at"> (at) </span>'));
//           }
//         }
//       );

//             $('#home-slide-nav a').click(
//         function (event) {
//           event.preventDefault();
//           $('body, html').animate({ scrollTop: $($(this).attr('href')).offset().top }, 1000);
//         }
//       );
//       $(window).scroll(scrollChange);
//       scrollChange();
//             if ($('#category-select').length && $('#category-select').css('position') == 'static') {
//         $(window).scroll(stickyCategorySelect);
//         stickyCategorySelect();
//       }
//     }
//   );
//   function stickyCategorySelect() {
//     var $cs = $('#category-select');
//     var scrollPos = $(window).scrollTop();
//     var sticky = 'stick-to-it';
//     var isSticky = $cs.hasClass(sticky);

//     if (scrollPos > $cs.offset().top) {
//       if (!isSticky) {
//         $cs.addClass(sticky);
//       }
//     } else if (isSticky) {
//       $cs.removeClass(sticky);
//     }
//   }

//     function scrollChange() {
//     var $active = getActiveLink();
//     if (!$active.hasClass('active')) {
//       $('#home-slide-nav a').removeClass('active');
//       $active.addClass('active');
//     }
//   }

//   function getActiveLink() {
//     var scrollPos = $(window).scrollTop();
//     var $active = null;
//     $('#home-slide-nav a').each(
//       function () {
//         var $this = $(this);
//         var id = $this.attr('id').replace(/^.*\-(\d+)$/, '$1');
//         var $that = $('#post-' + id);
//         if (scrollPos + ($(window).height() / 2) > $that.offset().top) {
//           $active = $this;
//         } else {
//           return $active;
//         }
//       }
//     );
//     return $active;
//   }


jQuery('[data-menu-toggle]').click(function(e) {
  jQuery('#main-nav').toggleClass('on');
});


  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $('.entry-content-asset').fitVids();

    $('.gallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return item.el.children('img').attr('alt') + '<small>hunyadi.hu</small>';
        }
      }
    });

  });
