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



jQuery('[data-menu-toggle]').click(function(e) {
  jQuery('#main-nav').toggleClass('on');
});

jQuery('.right-off-canvas-toggle').click(function(e) {
  window.scrollTo(0, 0);
  return true;
});




  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $('.entry-content-asset').fitVids();

    $('.gallery').magnificPopup({
      delegate: '.gallery-icon > a',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">A kép #%curr%</a> nem található.',
        titleSrc: function(item) {
          return item.el.closest('figure').find('figcaption').html() + '<small>hunyadi.hu</small>';
        }
      }
    });


    /*** CONTACT FORM ******/
    $("#contact_form").on('valid.fndtn.abide', function() {
        //e.preventDefault();

        //get input field values
        var user_name = $('input[name=message_name]').val();
        var user_email = $('input[name=message_email]').val();
        var user_firm = $('input[name=message_firm]').val();
        var user_tel = $('input[name=message_tel]').val();
        var user_area = $('select[name=message_area]').val();
        var user_msg = $('textarea[name=message_text]').val();

        var proceed = true;
        if (user_name === "") {
            //$('input[name=message_name]').css('border-color', '#e41919');
            proceed = false;
        }
        if (user_email === "") {
            //$('input[name=message_email]').css('border-color', '#e41919');
            proceed = false;
        }

        if (user_tel === "") {
            //$('input[name=message_tel]').css('border-color', '#e41919');
            proceed = false;
        }

        //everything looks good! proceed...
        if (proceed) {
            //data to be sent to server
            post_data = {
                'userName': user_name,
                'userEmail': user_email,
                'userFirm': user_firm,
                'userTel': user_tel,
                'userArea': user_area,
                'userMsg': user_msg
            };
            $('#contact_submit').addClass('disabled');
            $('#contact_submit').attr('disabled','disabled');
            $('#contact_submit').text('Küldés folyamatban');

            //Ajax post data to server
            $.post($('#contact_form').attr('action'), post_data, function(response){

                //load json data from server and output message
                if (response.type === 'error') {
                    output = '<p class="error">' + response.text + '</p>';
                }
                else {

                    output = '<p class="success">' + response.text + '</p>';

                    //reset values in all input fields
                    $('#contact_form input').val('');
                    $('#contact_form textarea').val('');
                }
                $("#result").hide().html(output).slideDown();
                $('#contact_submit').removeClass('disabled');
                $('#contact_submit').removeAttr('disabled');
                $('#contact_submit').text('Mehet');
            }, 'json');

        }

        return false;
    });

    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form input, #contact_form textarea").keyup(function(){
        //$("#contact_form input, #contact_form textarea").css('border-color', '');
        $("#result").slideUp();
    });

  });
