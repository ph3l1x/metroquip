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

  ///////////////////////
  // Utility Functions //
  ///////////////////////

  // Returns a function, that, as long as it continues to be invoked, will not
  // be triggered. The function will be called after it stops being called for
  // N milliseconds. If `immediate` is passed, trigger the function on the
  // leading edge, instead of the trailing.
  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) { func.apply(context, args); }
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) { func.apply(context, args); }
    };
  }

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        // Bring the subnavs to the right of the main nav on page load
        var mainNavWidth = $('#main-nav-column').outerWidth();
        $('.main-subnav-list').each(function(i,e) {
          $(this).css("left", mainNavWidth+"px");
        });

        // Bring the subsubnavs to the right of the subnavs
        if ($('.main-subnav-list').length) {
          mainNavWidth = $('#main-nav-column').outerWidth();
          $('.main-subnav-list').each(function(i,e) {
            // make them display: block for a split second so we can get their accurate widths
            $(this).css("display","block");

            var mainSubnavWidth = $(this).outerWidth();

            $(this).find('.main-subsubnav-column').each(function(j,e) {
              currentSubSubNavLeft = mainSubnavWidth;
              $(this).css("left", (mainNavWidth+currentSubSubNavLeft)+"px");
            });

            // revert to being display none
            $(this).css("display","none");
          });
        }

        // Bring the subnavs to the right of the main nav on window resize
        var positionSubNav = function() {
          var mainNavWidth = $('#main-nav-column').outerWidth();
          $('.main-subnav-list').each(function(i,e) {
            $(this).css("left", mainNavWidth+"px");
          });
        };

        // Bring the subsubnavs to the right of the main subnav on window resize
        var positionSubSubNav = function() {
          var mainNavWidth = $('#main-nav-column').outerWidth();
          var mainSubnavWidth = $('.main-subnav-list').first().outerWidth();
          $('.main-subsubnav-column').each(function(i,e) {
            $(this).css("left", (mainNavWidth+mainSubnavWidth)+"px");
          });
        };


        // get the actual height of the mobile menu
        var $mobileMenuClone = $('#mobile-nav-menu').clone();
        $mobileMenuClone.attr('id','mobileMenuClone');
        $mobileMenuClone.addClass('active');
        $('body').append($mobileMenuClone);
        mobileMenuHeight = $('#mobileMenuClone').height();
        $('#mobileMenuClone').remove();


        ////////////////////
        // Event Handlers //
        ////////////////////

        $(window).on('resize',function() {
          // These functions should be debounced, but it looks like crap when they are
          positionSubNav();
          positionSubSubNav();
        });


        // Make sure the filters work on the Search Results page
        if ($('.search-page').length) {
          $('.search-page-filter-link').on('click', function(e) {
            e.preventDefault();

            var filter = null;
            if ($(this).hasClass('active')) {
              filter = false;
            } else {
              filter = true;
            }

            // remove any existing filter (one filter applied at a time)
            $('.search-page-filter-link').each(function(i,e) {
              $(this).removeClass('active');
            });

            var filterPostType = null;
            if (filter) {
              // toggle the clicked filter
              $(this).addClass('active');

              // get the post type to toggle
              filterPostType = $(this).attr('data-post-type');
            } else {
                filterPostType = 'any';
            }

            // hide any posts that don't match the filter post type
            $('.search-page-result-row').each(function(i,e) {
              if ($(this).attr('data-post-type') !== filterPostType && filterPostType !== 'any') {
                $(this).hide();
              } else {
                $(this).show();
              }
            });
          });
        }


        //////////////////////////////////////////////////
        // Apply Match Height to product landing blurbs //
        //////////////////////////////////////////////////
        if ( $('.product-brand-taxonomy-content-column-inner-wrapper').length ) {

          $.fn.matchHeight._beforeUpdate = function(event, groups) {
            $('.product-brand-taxonomy-content-product-link').each(function(i,e) {
              $(this).css({"position":"relative","bottom":0});
            });
          }

          $('.product-brand-taxonomy-content-column-inner-wrapper').matchHeight({
            'byRow': false
          });

          $.fn.matchHeight._afterUpdate = function(event, groups) {
            $('.product-brand-taxonomy-content-product-link').each(function(i,e) {
              $(this).css({"position":"absolute","bottom":0});
            });
          }
        }

        if ( $('.product-style-taxonomy-content-column-inner-wrapper').length ) {

          $.fn.matchHeight._beforeUpdate = function(event, groups) {
            $('.product-style-taxonomy-content-product-link').each(function(i,e) {
              $(this).css({"position":"relative","bottom":0});
            });
          }

          $('.product-style-taxonomy-content-column-inner-wrapper').matchHeight({
            'byRow': false
          });

          $.fn.matchHeight._afterUpdate = function(event, groups) {
            $('.product-style-taxonomy-content-product-link').each(function(i,e) {
              $(this).css({"position":"absolute","bottom":0});
            });
          }
        }

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

        ///////////////////////////
        // Function Declarations //
        ///////////////////////////

        // The Contact Sidebar Form click handler
        function contactSidebarSubmitHandler(e) {
          e.preventDefault();

          // get the data to send via AJAX
          var contactSidebarName = $('#contact-sidebar-field-name').val();
          var contactSidebarEmail = $('#contact-sidebar-field-email').val();
          var contactSidebarPhone = $('#contact-sidebar-field-phone').val();
          var contactSidebarMessage = $('#contact-sidebar-field-message').val();
          var contactSidebarPageBeingViewed = $('#contact-sidebar-field-page-being-viewed').val();
          var data = {
            'name': contactSidebarName,
            'emailAddress': contactSidebarEmail,
            'phone': contactSidebarPhone,
            'message': contactSidebarMessage,
            'pageBeingViewed': contactSidebarPageBeingViewed
          };

          // make the AJAX call
          var $promise = $.ajax({
            url: contact.ajaxUrl,
            method: 'post',
            dataType: 'json',
            data: {'json': data, 'action': 'contactSidebarSubmit', 'nonce': contact.nonce },
            beforeSend: function() {
              // change the Submit button text into pulse icon
              $('#contact-sidebar-form-submit').html('<i class="fa fa-spinner fa-pulse"></i>');
            }
          });

          // process the response
          $promise.done(function(response) {
            if ( response.status == 'success' ) {
              $('#contact-sidebar-form-submit').html('Message Sent!');
              $('#contact-sidebar-form-submit').val('Message Sent!');
              setTimeout(function() {
                $('#contact-sidebar-form-submit').html('Send Email');
                $('#contact-sidebar-form-submit').val('Send Email');
                $('#contact-sidebar-field-name').val('');
                $('#contact-sidebar-field-email').val('');
                $('#contact-sidebar-field-phone').val('');
                $('#contact-sidebar-field-message').val('');

              },2000);
            } else if ( response.status == 'error' ) {
              alert("The message could not be sent at this time. Please try again in a few minutes.");
            }
          });
        }


        ////////////////////
        // Event Handlers //
        ////////////////////

        // Mobile Menu toggle
        $('#mobile-nav-menu-toggle').on('click', function(e) {
          e.preventDefault();

          if ($('#mobile-nav-menu').hasClass('active')) {
            $('#mobile-nav-menu').css('max-height','0px');
            $('#mobile-nav-menu').removeClass('active');
          } else {
            $('#mobile-nav-menu').css('max-height', '2000px');
            $('#mobile-nav-menu').addClass('active');
          }
        });

        // Mobile Submenu Toggle
        $('.mobile-nav-menu-list-item-link').on('click',function(e) {
          if ($(this).attr('href') == '#') {
            e.preventDefault();
          }

          $(this).next('.mobile-subnav-list').toggleClass('active');
        });

        // Mobile Subsubnav Toggle
        $('.mobile-subnav-list-item-link').on('click',function(e) {
          $(this).toggleClass('active');
          $(this).next('.mobile-subsubnav-column').toggleClass('active');
        });

        // Mobile Nav Grid of Tiles event handlers
        $('.home-mobile-nav-grid-link').on('click',function(e) {
          if ( $(this).attr('href') == '#' ) {
            e.preventDefault();

            $('#mobile-nav-menu').toggleClass('active');

            if ($('#mobile-nav-menu').hasClass('active')) {
              $('#mobile-nav-menu').css('max-height','2000px');
            } else {
              $('#mobile-nav-menu').css('max-height', '0px');
            }

            // Build the selector to use to find the corresponding slide down menu
            // subnav list and open it without using an artificial triggered click
            var mobileToggleValue = $(this).attr('id').split('home-mobile-tile-')[1];
            $('.mobile-subnav-list').each(function() {
              $(this).removeClass('active')
            });
            $('#mobile-toggle-menu-'+mobileToggleValue).next('.mobile-subnav-list').toggleClass('active');
          }
        });

        // Contact Sidebar Form
        $('#contact-sidebar-form-submit').on('click', contactSidebarSubmitHandler);
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

        // make the Main Hero Image snap to viewport height
        var screenHeight = screen.height;
        $('#main-hero-image').height(screenHeight);
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
    },
    'contact': {
      init: function() {

      },
      finalize: function() {
        ///////////////////////////
        // Function Declarations //
        ///////////////////////////

        // The Contact Sidebar Form click handler
        function contactSubmitHandler(e) {
          e.preventDefault();

          // get the data to send via AJAX
          var contactName = $('#contact-field-name').val();
          var contactEmail = $('#contact-field-email').val();
          var contactPhone = $('#contact-field-phone').val();
          var contactMessage = $('#contact-field-message').val();
          var data = {
            'name': contactName,
            'emailAddress': contactEmail,
            'phone': contactPhone,
            'message': contactMessage
          };

          // make the AJAX call, using the same action as the Contact Sidebar form
          var $promise = $.ajax({
            url: contact.ajaxUrl,
            method: 'post',
            dataType: 'json',
            data: {'json': data, 'action': 'contactSidebarSubmit', 'nonce': contact.nonce },
            beforeSend: function() {
              // change the Submit button text into pulse icon
              $('#contact-form-submit').html('<i class="fa fa-spinner fa-pulse"></i>');
            }
          });

          // process the response
          $promise.done(function(response) {
            if ( response.status == 'success' ) {
              $('#contact-form-submit').html('Message Sent!');
              setTimeout(function() {
                $('#contact-form-submit').html('Send Email');
              },2000);
            } else if ( response.status == 'error' ) {
              alert("The message could not be sent at this time. Please try again in a few minutes.");
            }
          });
        }


        ////////////////////
        // Event Handlers //
        ////////////////////

        // Contact Sidebar Form
        $('#contact-form-submit').on('click', contactSubmitHandler);
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
