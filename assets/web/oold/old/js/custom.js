(function($) {

"use strict";

  $(document).on("ready",function(){
    /*
      ============================================================
           SAME HEIGHT JAVASCRIPT
      ============================================================
    */
    $('.sameHeight').matchHeight();

        /*
      ============================================================
           VIDEO POPUP JAVASCRIPT
      ============================================================
    */
        $('.vicon').fancybox({
          openEffect  : 'fade',
          closeEffect : 'fade',
          helpers : {
            media : {}
          }
        });
    
    /*
      ============================================================
           PAGE LOADER JAVASCRIPT
      ============================================================
    */
    
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayHighlight: true,
        startDate: today,
        autoclose: true
    });
    $('#datepicker').datepicker('setDate', today);

    /*
      ============================================================
           PAGE LOADER JAVASCRIPT
      ============================================================
    */
    $(window).on('load',function(){
      $("body").imagesLoaded(function(){
        $(".loader-cont").fadeOut();
        $("#loader-overflow").delay(200).fadeOut(700);
      });
    });
    /*
    ============================================================
      SCROLL BUTTON JAVASCRIPT
    ============================================================
    */
    if($('.scroll-btn,.get-start').length){   
        $('.scroll-btn,.get-start').on("click",function(e) {
        if ( $(e.target).is('a') ) {
          $("html, body,.main-wrapper").animate({ scrollTop: $(window).height()}, 600);
            return false;
        }
      });
    }

    /*
    ============================================================
       Header Javascript
    ============================================================
    */
    if (window.matchMedia("(min-width: 991px)").matches) {
      if ($('.oscar-header-2 .nav-outer').length) {
        $(function() {
            var header = $(".oscar-header-2 .nav-outer");
            $(".oscar-header-2 .nav-outer").parent().height( $(".oscar-header-2").height() );
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll >= 100) {
                    header.removeClass('affix-top').addClass("affix th-bg");
                } else {
                    header.removeClass("affix th-bg").addClass('affix-top');
                }
            });
        });
      }
      /*
      ============================================================
        JS NOT FOR MOBILE (PARALLAX, OPACITY SCROLL)
      ============================================================
      */
      if( mobileDetect == false ) {
        /*
        ============================================================
          PARALLAX
         ===========================================================
        */
        if ( $('.timan-sub-banner,.parallax-section').length ){
              $.stellar({
                  horizontalScrolling: false,
                  responsive: true
              }); 
          }; 
      
      }//END JS NOT FOR MOBILE
    }
    

    if ($('#opg-nav').length) {
      $('#opg-nav').onePageNav({
        currentClass: 'active',
        changeHash: false,
        scrollSpeed: 750 
      });
    }


    if($('.main-menu nav').length){   
      $('.main-menu nav').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "991"
      });

    }

    /*
    ============================================================
         Counter Javascript
    ============================================================
    */
    if ($('.count-number').length) {
      $('.count-number').counterUp({
          delay: 10,
          time: 1000
      });
    }
    /*
    =======================================================================
      POPUP AND MASONRY SCRIPT
    =======================================================================
    */
      /*=========================== ISOTOPE MASONRY SCRIPT */
      if ($('.masonry').length) {
          $(".masonry").imagesLoaded(function() {
              $(".masonry").masonry();
          });
      }
      if ($('.masonry-grid').length) {
          var fselector = 0,
              itemsGrid = $(".masonry-grid");
          (function($) {
              "use strict";
              var isotopeMode;
              if (itemsGrid.hasClass("masonry")) {
                  isotopeMode = "masonry";
              } else {
                  isotopeMode = "fitRows"
              }
              itemsGrid.imagesLoaded(function() {
                  itemsGrid.isotope({
                      itemSelector: '.port-item,.masonry-grid > [class*="col-"]',
                      layoutMode: isotopeMode,
                      filter: fselector
                  });
              });
          })(jQuery);
      }
      if ($('.filterable-gallery').length) {
          var fselector = 0,
              itemsGrid = $(".filterable-gallery");
          (function($) {
              "use strict";
              var isotopeMode;
              if (itemsGrid.hasClass("masonry")) {
                  isotopeMode = "masonry";
              } else {
                  isotopeMode = "fitRows"
              }
              itemsGrid.imagesLoaded(function() {
                  itemsGrid.isotope({
                      itemSelector: '.mix',
                      layoutMode: isotopeMode,
                      filter: fselector
                  });
              });
              $(".port-filter").on('click', '.filter', function() {
                  $(".filter").removeClass("active");
                  $(this).addClass("active");
                  fselector = $(this).attr('data-filter');
                  itemsGrid.isotope({
                      itemSelector: '.mix',
                      layoutMode: isotopeMode,
                      filter: fselector
                  });
                  return false;
              });
          })(jQuery);
      }
      /*=========================== POPUP SCRIPT (MAGNIFIC POPUP) */
      if($('.popup-gallery').length) {
        $('.popup-gallery').magnificPopup({
          delegate: '.popup-icon',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-3d-unfold',
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
          beforeOpen: function() {
            // just a hack that adds mfp-anim class to markup 
             this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
            // this.st.mainClass = this.st.el.attr('data-effect');
          }
          },
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            /*titleSrc: function(item) {
              return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }*/
          }
        });
      }
      if($('.popup-youtube, .popup-vimeo, .popup-gmaps').length) {
        //VIDEO GMAPS POPUP
        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          //disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-3d-unfold',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
        });
      }

    /*
    =======================================================================
        Map Script
    =======================================================================
    */
      if ( $('#map-canvas').length ){
        initMap();
      }
      /*=========================== NEWSLETTER SCRIPT */
      $(function () {
        'use strict';
        var $form = $('#mc-embedded-subscribe-form');
        $('#mc-embedded-subscribe').on('click', function(event) {
          if(event) event.preventDefault();
          register($form);
        });
      });
      function register($form) {
          $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize(),
          cache       : false,
          dataType    : 'json',
          contentType: "application/json; charset=utf-8",
          error       : function(err) {
            $('#notification_container').html('<div id="nl-alert-container"  class="alert alert-info alert-dismissible fade in bounceIn" role="alert" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Could not connect to server. Please try again later.</div>'); 
          },
          success     : function(data) {
            if (data.result != "success") {
              var message = data.msg;
              $('#notification_container').html('<div id="nl-alert-container"  class="alert alert-info alert-dismissible fade in bounceIn" role="alert" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+message+'</div>');
            } 

            else {
              var message = data.msg;
              $('#notification_container').html('<div id="nl-alert-container"  class="alert alert-info alert-dismissible fade in bounceIn" role="alert" ><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'+message+'</div>');
            }
          }
        });
      } 
    /*
    ============================================================
         Twetter Tweet Javascript
    ============================================================
    */
      if ($("#twitter-feeds").length) {
          $("#twitter-feeds").tweet({
              count: 3,
              avatar_size: false,
              username: "OscarThemes",
              modpath: './js/twitter/',
              loading_text: "loading tweets..."
          });
      }
    /*
    ============================================================
         Flickr Feed Javascript
    ============================================================
    */
      if ($("#flickr-feeds").length) {
          $('#flickr-feeds').jflickrfeed({
              limit: 12,
              qstrings: {
                  id: '152623543@N06'
              },
              itemTemplate: '<li>' + '<a class="lightbox" href="{{image}}" title="{{title}}">' + '<img src="{{image_s}}" alt="{{title}}" />' + '</a>' + '</li>'
          });
      }
    /*
    ============================================================
      All Slick Slider Javascript
    ============================================================
    */
      /*=========================== BLOG SLIDER START */
      if ($('.blog-slider').length) {
        $('.blog-slider').slick({
            arrows: false,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [ {
                breakpoint: 992,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1
                }
            }, {
                breakpoint: 638,
                settings: {
                    slidesToShow: 1
                }
            }]
        });
      }
      if ($('.insuranceSlider').length) {
        $('.insuranceSlider').slick({
            arrows: false,
            dots: false,
            autoplay: true, /* this is the new line */
            autoplaySpeed: 2000,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [ {
                breakpoint: 992,
                settings: {
                    slidesToScroll: 2,
                    slidesToShow: 1
                }
            }, {
                breakpoint: 638,
                settings: {
                    slidesToShow: 1
                }
            }]
        });
      }
      /*=========================== MAIN SLIDER START */
      if($('.slider').length){
        $('.slider').slick({
            dots: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            infinite: true,
            draggable: true,
            touchThreshold: 100
        });
      }
      /*=========================== MAIN SLIDER START */
      if($('.timan-testimonial-slider').length){
        $('.timan-testimonial-slider').slick({
          dots: false,
          arrows: false
        });
      }
      /*=========================== Office Map Widget SLIDER START */
      if($('.map-office-widget-slider').length){
        $('.map-office-widget-slider').slick({
          dots: true,
          fade:true,
          arrows: false
        });
      }
  });
})(window.jQuery);
/*
  =======================================================================
       Map Custom Style Script Script
  =======================================================================
*/
function initMap(){
  var gmMapDiv = $("#map-canvas");
  (function($){

      var gmCenterAddress = gmMapDiv.attr("data-address");
      var gmMarkerAddress = gmMapDiv.attr("data-address");
      var gmstreetViewControl = gmMapDiv.attr("data-view");
      
      gmMapDiv.gmap3({
          action: "init",
          marker: {
              address: gmMarkerAddress,
              options: {
                  icon: "images/loc-marker.png" /* Location marker */
              }
          },
          map: {
              options: {
                  zoom: 17,
                  zoomControl: true,
                  zoomControlOptions: {
                      style: google.maps.ZoomControlStyle.SMALL
                  },
                  mapTypeControl: false, /* hide/show (false/true) mapTypeControl*/
                  scaleControl: false, /*hide/show (false/true) scaleControl */
                  scrollwheel: false, /*hide/show (false/true) scrollwheel*/
                  streetViewControl: gmstreetViewControl, /*hide/show (false/true) streetViewControl*/
                  draggable: true,
                  styles:[ 
                    {
                        "featureType": "administrative.country",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "hue": "#ff0000"
                            }
                        ]
                    }
                  ] /*CHANGE STYLE (colors and etc.) */
              }
          }
      });

  })(jQuery);
}

$(function(){

    $('body').on('click','.book-submit',function(){
        var flag= 0;
        if($("#name").val() == ''){
            $("#name").css('border-color','red');
            flag = 1;
        }else{
            $("#name").css('border-color','');
        }
        if($("#department").val() == ''){
            $("#department").css('border-color','red');
            flag = 1;
        }else{
            $("#department").css('border-color','');
        }

        if($("#datepickjer").val() == ''){
            $("#datepickjer").css('border-color','red');
            flag = 1;
        }else{
            $("#datepickjer").css('border-color','');
        }

        if($("#mobile").val() == ''){
            $("#mobile").css('border-color','red');
            flag = 1;
        }else{
            $("#mobile").css('border-color','');
        }

        if($("#email").val() == ''){
            $("#email").css('border-color','red');
            flag = 1;
        }else{
            var email = $("#email").val() ;
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var v= expr.test(email);
        // console.log(v)
            if(v == false) {
                $("#email").css('border-color','red');
                flag = 1;
            } else{
                $("#email").css('border-color','');
            }
           
        }

        if(flag == 1) {
            return false;
        }else{
            $('.book-submit').text('Please Wait...');
            $('.book-submit').attr('disabled',true);
            var data= $("#appointment-form").serialize();
            $.ajax({
                    type: "POST",
                    url: site_url+'web/book',
                    data: data,
                    dataType:'json',
                    success: function(data) {
                       $('.book-submit').text('SEND MESSAGE');
                       $('.book-submit').attr('disabled',false);
                       if(data.status=='success'){
                           $('#appointment-form')[0].reset();
                          // $('.captcha-refresh').trigger('click');
                       }
                       
                       $('.msg').html(data.msg);
                       setTimeout(function(){  $('.msg').html('') }, 3000);
                    },
                    error: function() {
                        $('.msg').html('<span style="color:red;font-size:16px;">Something went wrong,Please try again later</span>');
                        setTimeout(function(){  $('.msg').html('') }, 3000);
                    }
                    
                });
        }
        
    });

    $('body').on('keypress','#mobile', function(e){
        var keyCode = e.which;
       /*
         8 - (backspace)
         32 - (space)
         48-57 - (0-9)Numbers
       */

       if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
         return false;
       }
   });

    $('body').on('click','.contact_submit',function(){
        var flag= 0;
        if($("#name").val() == ''){
            $("#name").css('border-color','red');
            flag = 1;
        }else{
            $("#name").css('border-color','');
        }

        if($("#message").val() == ''){
            $("#message").css('border-color','red');
            flag = 1;
        }else{
            $("#message").css('border-color','');
        }

        if($("#subject").val() == ''){
            $("#subject").css('border-color','red');
            flag = 1;
        }else{
            $("#subject").css('border-color','');
        }

        if($("#mobile").val() == ''){
            $("#mobile").css('border-color','red');
            flag = 1;
        }else{
            $("#mobile").css('border-color','');
        }

        if($("#email").val() == ''){
            $("#email").css('border-color','red');
            flag = 1;
        }else{
            var email = $("#email").val() ;
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var v= expr.test(email);
        // console.log(v)
            if(v == false) {
                $("#email").css('border-color','red');
                flag = 1;
            } else{
                $("#email").css('border-color','');
            }
           
        }

        if(flag == 1) {
            return false;
        }else{
            $('.contact_submit').text('Please Wait...');
            $('.contact_submit').attr('disabled',true);
            var data= $("#contact-form").serialize();
            $.ajax({
                    type: "POST",
                    url: site_url+'web/contact',
                    data: data,
                    dataType:'json',
                    success: function(data) {
                       $('.contact_submit').text('SEND MESSAGE');
                       $('.contact_submit').attr('disabled',false);
                       if(data.status=='success'){
                           $('#contact-form')[0].reset();
                          // $('.captcha-refresh').trigger('click');
                       }
                       
                       $('.msg').html(data.msg);
                       setTimeout(function(){  $('.msg').html('') }, 3000);
                    },
                    error: function() {
                        $('.msg').html('<span style="color:red;font-size:16px;">Something went wrong,Please try again later</span>');
                        setTimeout(function(){  $('.msg').html('') }, 3000);
                    }
                    
                });
        }
        
    });

    $('body').on('keypress','#mobile', function(e){
        var keyCode = e.which;
       /*
         8 - (backspace)
         32 - (space)
         48-57 - (0-9)Numbers
       */

       if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
         return false;
       }
   });
   
   
})
    document.onkeydown = function(e) {
       if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
         return false;
        }
        
        if (e.keyCode == 123) { // Prevent F12
            return false;
        } 
   }

