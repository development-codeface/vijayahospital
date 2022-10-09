
(function($){
    "use strict";
    $(document).ready(function(){

        /**-----------------------------
         *  Navbar fix
         * ---------------------------*/  
        $(document).on('click','.navbar-area .navbar-nav li.menu-item-has-children>a',function(e){
            e.preventDefault();
        }) 

        /*---------------------------
              Mobile Cross Menu
        -----------------------------*/
        $(document).on('click','.cross-menu',function(e){
            e.preventDefault();
            $(this).toggleClass("change");
        })  
       
        /*------------------
            back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

        //Scroll Down
        $(document).on('click', '.scroll-down-area a', function(e){
            e.preventDefault();
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
        })

        //Hide Alert Box
        $(document).on('click','.alert-box .close-btn',function(){
            $(this).parent().hide(200);
        });

        //Modal Hide
        $(document).on('click','#close-btn1',function(){
            $(this).parent().hide(200);
        })
        $(document).on('click','#close-btn2',function(){
            $(this).parent().hide(200);
        })
        $(document).on('click','#close-btn3',function(){
            $(this).parent().hide(200);
        })


        /*------------------------------
            counter section activation
        -------------------------------*/
        var counternumber = $('.count-num');
        if(counternumber.length > 0){ 
            counternumber.rCounter({
                duration: 20
            });
        }

        /* ------------------------------
                 Countdown
        ---------------------------------*/
        if($("#mycountdown").length > 0){
            $("#mycountdown").countdown("2019/11/23", function(event) {$('.days').text(
                    event.strftime('%D')
                );
                $('.hours').text(
                    event.strftime('%H')
                );
                $('.mins').text(
                    event.strftime('%M')
                );
                $('.secs').text(
                    event.strftime('%S')
                );
         });}

        // Search Popup
        $(document).on('click','.openSearchBtn',function(){
            $('.searchOverlay').css('width', '100%');
        })
        $(document).on('click','.closebtn',function(){
            $(".searchOverlay").css('width', '0');
        })

        // Side Menu Popup
        $(document).on('click','.open-side-menu',function(){
            $('.sidenav').css('width', '100%');
        })

        $(document).on('click','.closebtn',function(){
            $('.sidenav').css('width', '0');
        })

        $(document).on('click','.click-to-top',function(){
            $('body,html').animate({scrollTop: 0}, 1000)
        })
   
        // Video popup  
        if($(".hosted-popup").length > 0){
            $(".hosted-popup").rPopup({
                'video': {
                    embed: true,
                    autoplay: true,
                },
            });
        }

         //Image Popup 
        if($(".plus-icon").length > 0){
            $(".plus-icon").rPopup({ 
                'image': true 
            });
        }

        /*-------------------------------------
                Latest Storiest Carousel
        ---------------------------------------*/
        var latestStoriestCarousel = $('.storiest-carousel');
        if(latestStoriestCarousel.length > 0){
            latestStoriestCarousel.slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                nextArrow: '<div class="slick-prev"> <i class="fas fa-chevron-left"></i> </div>',
                prevArrow: '<div class="slick-next"> <i class="fas fa-chevron-right"></i> </div>',
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                    },
                    {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: true,
                    }
                    }
                ]
    
            });      
        }

        /*------------------------------------
            Home Slider / Main Slider
        --------------------------------------*/ 
        var homeManiSlider = $('.home-slider-wrapper');
        if(homeManiSlider.length > 0){
            
            homeManiSlider.slick({
                dots: true,
                infinite: true,
                speed: 1600,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows: false,
                appendDots: $('.carousel-dots-area'),
            });  

            var homeSliderDots = $('.carousel-dots-area .slick-dots li');
            homeSliderDots.each(function(index,value){
                var el = $(this);
                var number = el.children('button').text();
                el.children('button').text(check_number(number));
            });
        }

        /*------------------------------------
                Plastic Surgery 02
        --------------------------------------*/ 
        var surgerySliderTwo = $('.surgery-slider-wrapper');
        if(surgerySliderTwo.length > 0){
            surgerySliderTwo.slick({
                dots: true,
                infinite: true,
                speed: 1600,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                appendArrows: $('.slider-arrow-items'),
                nextArrow: '<div class="slick-prev"> <i class="fas fa-chevron-left"></i> </div>',
                prevArrow: '<div class="slick-next"> <i class="fas fa-chevron-right"></i> </div>',
            });
    
            // On before home slider change
            surgerySliderTwo.on('beforeChange', function(event, slick, currentSlide, nextSlide){
            var testSlider =  surgerySliderTwo.slick('getSlick');
            var totalSlide = testSlider.$slides.length;
            var currentSliderIndex = nextSlide;
            ++currentSliderIndex;
            var progress = 100 / totalSlide;
            var progressWidth = progress * currentSliderIndex;
            SliderProgressbarStart(progressWidth)
            $('.slider-arrow-area .arrow-top').text(check_number(totalSlide));
            $('.slider-arrow-area .arrow-top').text(check_number(currentSliderIndex));
    
            $('.right-controller .number').text(check_number(totalSlide));
            $('.right-controller .number').text(check_number(currentSliderIndex));
    
            var nextSliderTitle =   $('.surgery-slider-wrapper .slick-slide[data-slick-index="'+currentSliderIndex+'"]').find('.slider-heading').text();
            var nextSliderimg =   $('.surgery-slider-wrapper .slick-slide[data-slick-index="'+currentSliderIndex+'"]').find('.slider-img-area').css('background-image');
            
            $('.surgery-slider-area-02 .slider-controller .left-controller').css('background-image',nextSliderimg);
            $('.surgery-slider-area-02 .slider-controller .right-controller').find('.heading-03').text(nextSliderTitle);
            });

        }

        /*------------------------------------
                timeline slider
        --------------------------------------*/ 
        var timelineSliderBig = $('.timeline-slider-big');
        var timelineSliderSmall = $('.timeline-slider-small');
        if(timelineSliderBig.length > 0){

            $('.time-line-area').imagesLoaded(function () {
                timelineSliderBig.slick({
                    dots: false,
                    infinite: true,
                    speed: 600,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    arrows:false,
                    asNavFor: timelineSliderSmall,               
                });
            });

            timelineSliderSmall.slick({
                dots: false,
                infinite: true,
                speed: 600,
                slidesToScroll: 1,
                autoplay: true,
                slidesToShow: 3, 
                arrows:false,
                asNavFor: timelineSliderBig
            })
            
            // On before slide change
            timelineSliderBig.on('beforeChange', function(event, slick, currentSlide, nextSlide){
                ++nextSlide;
                $('.big-slider-area .year-area ul li').removeClass('active');
                $('.big-slider-area .year-area ul li:nth-child('+nextSlide+')').addClass('active');
            });    
        }
        $(document).on('click','.big-slider-area .year-area ul li',function(e){
            e.preventDefault();
            var el = $(this);
            var slideIndex = el.data('slide-index');
            timelineSliderBig.slick('slickGoTo',slideIndex);
        });
 


        /*-----------------------------------------
                    Paralax Slider
        -------------------------------------------*/
        var paralaxSlider = $('.paralax-slider-wrapper');
        if(paralaxSlider.length > 0){
            paralaxSlider.slick({
                dots: true,
                infinite: true,
                speed: 1000,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows:false, 
            });
        }

        /*-----------------------------------------
                    Dentist Slider
        -------------------------------------------*/
        var dentalSlider = $('.dental-slider');
        if(dentalSlider.length > 0){
            dentalSlider.slick({
                dots: false,
                infinite: true,
                speed: 1600,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows:true, 
                prevArrow: '<div class="slick-prev">  <div class="arrow-down"> <span class="arrow-line"></span><span class="caret-down"></span></div></div>',
                nextArrow: '<div class="slick-next"> <div class="arrow-up"> <span class="arrow-line"></span><span class="caret-up"></span></div> </div>',
            });
    
            // On before home slider change
            dentalSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
                var testSlider =  dentalSlider.slick('getSlick');
                var totalSlide = testSlider.$slides.length;
                var currentSliderIndex = nextSlide;
                ++currentSliderIndex;
                var progress = 100 / totalSlide;
                var progressWidth = progress * currentSliderIndex;
                SliderProgressbarStart(progressWidth)
                $('.controller-area .total-controller').text(check_number(totalSlide));
                $('.controller-area .active-controller').text(check_number(currentSliderIndex));
            }); 
        }


        /*-----------------------------------
                Testimonials Slick Slider
        -------------------------------------*/
        var testimonialCarouselImg = $('.testimonial-carousel-img');
        var testimonialCarouselContent = $('.testimonial-carousel-content');

        if(testimonialCarouselImg.length > 0){
            testimonialCarouselImg.slick({   
                autoplay: true,
                draggable: true,
                speed: 400,
                slidesToShow: 5,
                slidesToScroll: 1,
                dots: false,       
                arrows: true,  
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 485,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }    
                ],        
                asNavFor: testimonialCarouselContent,          
                appendArrows: $('.testimonial-arrow'),  
                prevArrow: '<div class="slick-next"><i class="fas fa-chevron-right"></i></div>',   
                nextArrow: '<div class="slick-prev"><i class="fas fa-chevron-left"></i></div>',  
                
            });
            // On before slide change
            testimonialCarouselImg.on('beforeChange', function(event, slick, currentSlide, nextSlide){
            var testSlider =  testimonialCarouselImg.slick('getSlick');
            var totalSlide = testSlider.$slides.length;
            var currentSliderIndex = nextSlide;
            ++currentSliderIndex;
            var progress = 100 / totalSlide;
            var progressWidth = progress * currentSliderIndex;
            testProgressbarStart(progressWidth)
            $('.testimonials-carousel-controller .total-controller').text(check_number(totalSlide));
            $('.testimonials-carousel-controller .active-controller').text(check_number(currentSliderIndex));
                if(nextSlide > 0){
                    var customActive = nextSlide + 4;
                    testimonialCarouselImg.find('.slick-slide').removeClass('right_active_item');
                    testimonialCarouselImg.find('.slick-slide[data-slick-index="'+customActive+'"]').addClass('right_active_item');
                }else{
                    testimonialCarouselImg.find('.slick-slide').removeClass('right_active_item');
                    testimonialCarouselImg.find('.slick-slide[data-slick-index="4"]').addClass('right_active_item');
                }
            });
        }

        if(testimonialCarouselContent.length > 0){
            testimonialCarouselContent.slick({
                dots: false,
                infinite: true,
                speed: 400,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                arrows:false, 
                asNavFor: $(testimonialCarouselImg), 
            });
    
        }

        /*------------------------------------------
            Plastic surgery One home slider
        -------------------------------------------*/
        var PlasticSurgeryOne = $('.surgery-slide-wrapper');
        if(PlasticSurgeryOne.length > 0){
            PlasticSurgeryOne.slick({
                dots: false,
                infinite: true,
                speed: 1600,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                prevArrow: '<div class="slick-prev">  <div class="arrow-down"> <span class="arrow-line"></span><span class="caret-down"></span></div></div>',
                nextArrow: '<div class="slick-next"> <div class="arrow-up"> <span class="arrow-line"></span><span class="caret-up"></span></div> </div>',
            });
            
            // On before home slider change
            PlasticSurgeryOne.on('beforeChange', function(event, slick, currentSlide, nextSlide){
                var testSlider =  PlasticSurgeryOne.slick('getSlick');
                var totalSlide = testSlider.$slides.length;
                var currentSliderIndex = nextSlide;
                ++currentSliderIndex;
                var progress = 100 / totalSlide;
                var progressWidth = progress * currentSliderIndex;
                surgeryProgressbarStart(progressWidth)
                $('.controller-wrapper .total-controller').text(check_number(totalSlide));
                $('.controller-wrapper .active-controller').text(check_number(currentSliderIndex));
            });
        }


        /*-----------------------------
                Date picker
        -------------------------------*/
        if($("#datepicker, #datepicker2").length > 0){
            $("#datepicker, #datepicker2").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
            });
        }

   
        /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();


         //PROGRESS SECTION   
        var dentalProgressBar = $('.dental');
        if(dentalProgressBar.length > 0){       
            dentalProgressBar.rProgressbar({ percentage: 90, fillBackgroundColor: '#F2F5F7', backgroundColor: 'transparent', AbsoluteProgressCount: true});
        }
        var cardioProgressBar = $('.cardio');
        if(cardioProgressBar.length > 0){       
            cardioProgressBar.rProgressbar({ percentage: 70, fillBackgroundColor: '#F2F5F7', backgroundColor: 'transparent', AbsoluteProgressCount: true});
        }
        var neurologieProgressBar = $('.neurologie');
        if(neurologieProgressBar.length > 0){       
            neurologieProgressBar.rProgressbar({ percentage: 85, fillBackgroundColor: '#F2F5F7', backgroundColor: 'transparent', AbsoluteProgressCount: true});
        }
        var orthopedyProgressBar = $('.orthopedy');
        if(orthopedyProgressBar.length > 0){       
            orthopedyProgressBar.rProgressbar({ percentage: 65, fillBackgroundColor: '#F2F5F7', backgroundColor: 'transparent', AbsoluteProgressCount: true});
        }


    
        /*-----------------------------
           Isotop Active For Blog Page
        -------------------------------*/
        if($('.blog-filter-section').length > 0){
            $('.blog-filter-section').imagesLoaded(function () {
                $('.blog-filter-content').isotope({
                      itemSelector: '.content-item',
                      layoutMode: 'fitRows',      
                  });  
              });
        }


        /*-----------------------------
         Isotop Active For Gallery Page
        -------------------------------*/ 
        if ($('.blog-filter-section').length > 0){
            $('.blog-filter-section').imagesLoaded(function () {
                var $gallery = $('.gallery-filter-images').isotope({
                    itemSelector: '.gallery-grid',
                    masonry: {
                    columnWidth: 50
                    }        
                });
            });
        }

        /*-----------------------------
        Isotop Active For Membership Page
        -------------------------------*/

        if($('.membership-filter-section').length > 0){
            $('.membership-filter-section').imagesLoaded(function () {
                $('.membership-filter').isotope({
                    itemSelector: '.membership-grid',
                    filter: '.standard',      
                });    
            });
        }
  
        /*---------------------------------
            Isotop Filter Function
        -----------------------------------*/ 
        var filterFns = {
            numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
            },
            ium: function() {
            var name = $(this).find('.name').text();
            return name.match( /ium$/ );
            }
        };
        $('.filters-button-group').on( 'click', 'li', function() {
            var filterValue = $( this ).attr('data-filter');
            filterValue = filterFns[ filterValue ] || filterValue;
            $('.blog-filter-content').isotope({ filter: filterValue });
            $('.gallery-filter-images').isotope({ filter: filterValue });
            $('.membership-filter').isotope({ filter: filterValue });
        });
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'li', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
            });
        });
    
        /*===========================================
                Popup on Click
        ===========================================*/

        // Opening popup
        $(document).on('click','#open-opening-popup',function(){
            $(".location-popup, .form-popup .form-popupnew").removeClass("popup-show ")
            $("#open-location-popup, #open-form-popup, #open-form-popupnew").removeClass("active")
        
            $(".popup-wrapper, .opening-popup").animate().addClass("popup-show ");
            $("#open-opening-popup").addClass("active")         
        })
        
        $(document).on('click','#open-location-popup',function(){
            $(".opening-popup, .form-popup .form-popupnew").removeClass("popup-show ")
            $("#open-opening-popup, #open-form-popup, #open-form-popupnew").removeClass("active")
        
            $(".popup-wrapper, .location-popup").animate().addClass("popup-show ");
            $("#open-location-popup").addClass("active")

        })
 
        $(document).on('click','#open-form-popup',function(){
            $(".opening-popup, .location-popup, .form-popupnew").removeClass("popup-show ")
            $("#open-opening-popup, #open-location-popup , #open-form-popupnew").removeClass("active")
        
            $(".popup-wrapper, .form-popup").animate().addClass("popup-show ");
            $("#open-form-popup").addClass("active")
        })  

    
 $(document).on('click','#open-form-popupnew',function(){
            $(".opening-popup, .form-popup, .location-popup ").removeClass("popup-show ")
            $("#open-opening-popup, #open-location-popup, #open-form-popup").removeClass("active")
        
            $(".popup-wrapper, .form-popupnew").animate().addClass("popup-show ");
            $("#open-form-popupnew").addClass("active")

        })    


         // Close popup
        $(document).on('click','.close-popup',function(){
            $(".popup-wrapper").removeClass("popup-show ")
            $("#open-opening-popup, #open-location-popup, #open-form-popup, #form-popupnew").removeClass("active")
            $("body").css("overflow-y", "auto");
        }) 


    });

    //document dots ready function End

    //define variable for store last scrolltop

    var lastScrollTop = "";
    var floatingIcon = $(".side-form-icons");

    $(window).on('scroll', function () {       
        /*---------------------------------------
                     Sticky Icon Bar
        -----------------------------------------*/
        var st = $(this).scrollTop();

        if ($(this).width() < 992) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown
                showFloatingIcon();
            } else {
                // active sticky menu on scrollup
                hideFloatingIcon();
            }
        }
        else {
            floatingIcon.css({ display: "inline-block" });
        }
        lastScrollTop = st;

    });

    $(window).on('scroll', function(){
        //back to top show/hide
        var ScrollTop = $('.back-to-top'); 
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }  
    })


    /*-----------------------------------------
              Window dots on load
    -------------------------------------------*/
    $(window).on("load", function() {
        //floatingIcon
         if ($(window).width() < 992) {
             hideFloatingIcon();
         } else {
             showFloatingIcon();
         }

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click','.cancel-preloader a',function(e){
            e.preventDefault();
            $("#preloader").fadeOut(2000);
        });

     });
 
     /*----------------------
        Window dots Resize
     -----------------------*/
     $(window).on("resize", function(e) {
         e.preventDefault();
        // floatingIcon
         if ($('body').width() < 768) {
             hideFloatingIcon();
         } else {
             showFloatingIcon();
         }
     });
 
     function hideFloatingIcon() {
         //floatingIcon
         floatingIcon.hide();
     }
 
     function showFloatingIcon() {
         //floatingIcon
         floatingIcon.show();
     }

    function check_number(num) {
        var IsInteger = /^[0-9]+$/.test(num);
        return IsInteger ? '0' + num : null;
    }
    function testProgressbarStart(progressWidth){
        $('.testimonials-carousel-controller .testimonial-progressbar .progress-active-line').css({'width': progressWidth+'%'});
    }
    function SliderProgressbarStart(homeprogressWidth){
        $('.home-slider-progressbar .home-slider-progress-active').css({'width': homeprogressWidth+'%'});
    }
    function surgeryProgressbarStart(surgeryrogressWidth){
        $('.home-slider-progressbar .home-slider-progress-active').css({'width': surgeryrogressWidth+'%'});
    }


})(jQuery);


/*cstm*/

$(function(){ $('.search-select').comboSelect() });


(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object' && typeof require === 'function') {
        // Browserify
        factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ( $, undefined ) {

    var pluginName = "comboSelect",
        dataKey = 'comboselect';
    var defaults = {
        comboClass         : 'combo-select',
        comboArrowClass    : 'combo-arrow',
        comboDropDownClass : 'combo-dropdown',
        inputClass         : 'combo-input text-input',
        disabledClass      : 'option-disabled',
        hoverClass         : 'option-hover',
        selectedClass      : 'option-selected',
        markerClass        : 'combo-marker',
        themeClass         : '',
        maxHeight          : 200,
        extendStyle        : true,
        focusInput         : true
    };

    /**
     * Utility functions
     */

    var keys = {
        ESC: 27,
        TAB: 9,
        RETURN: 13,
        LEFT: 37,
        UP: 38,
        RIGHT: 39,
        DOWN: 40,
        ENTER: 13,
        SHIFT: 16
    },
    isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

    /**
     * Constructor
     * @param {[Node]} element [Select element]
     * @param {[Object]} options [Option object]
     */
    function Plugin ( element, options ) {

        /* Name of the plugin */

        this._name = pluginName;

        /* Reverse lookup */

        this.el = element

        /* Element */

        this.$el = $(element)

        /* If multiple select: stop */

        if(this.$el.prop('multiple')) return;

        /* Settings */

        this.settings = $.extend( {}, defaults, options, this.$el.data() );

        /* Defaults */

        this._defaults = defaults;

        /* Options */

        this.$options = this.$el.find('option, optgroup')

        /* Initialize */

        this.init();

        /* Instances */

        $.fn[ pluginName ].instances.push(this);

    }

    $.extend(Plugin.prototype, {
        init: function () {

            /* Construct the comboselect */

            this._construct();


            /* Add event bindings */

            this._events();


        },
        _construct: function(){

            var self = this

            /**
             * Add negative TabIndex to `select`
             * Preserves previous tabindex
             */

            this.$el.data('plugin_'+ dataKey + '_tabindex', this.$el.prop('tabindex'))

            /* Add a tab index for desktop browsers */

            !isMobile && this.$el.prop("tabIndex", -1)

            /**
             * Wrap the Select
             */

            this.$container = this.$el.wrapAll('<div class="' + this.settings.comboClass + ' '+ this.settings.themeClass + '" />').parent();

            /**
             * Check if select has a width attribute
             */
            if(this.settings.extendStyle && this.$el.attr('style')){

                this.$container.attr('style', this.$el.attr("style"))

            }


            /**
             * Append dropdown arrow
             */

            this.$arrow = $('<div class="'+ this.settings.comboArrowClass+ '" />').appendTo(this.$container)


            /**
             * Append dropdown
             */

            this.$dropdown = $('<ul class="'+this.settings.comboDropDownClass+'" />').appendTo(this.$container)


            /**
             * Create dropdown options
             */

            this._build();

            /**
             * Append Input
             */

            this.$input = $('<input type="text"' + (isMobile? 'tabindex="-1"': '') + ' placeholder="'+ this.getPlaceholder() +'" class="'+ this.settings.inputClass + '">').appendTo(this.$container)

            /* Update input text */

            this._updateInput()

        },
        getPlaceholder: function(){

            var p = '';

            this.$options.filter(function(idx, opt){

                return opt.nodeName == 'OPTION'
            }).each(function(idx, e){

                if(e.value == '') p = e.innerHTML
            });

            return p
        },
        _build: function(){

            var self = this;

            var o = '', k = 0;

            this.$options.each(function(i, e){

                if(e.nodeName.toLowerCase() == 'optgroup'){

                    return o+='<li class="option-group">'+this.label+'</li>'
                }

                o+='<li class="'+(this.disabled? self.settings.disabledClass : "option-item") + ' ' +(k == self.$el.prop('selectedIndex')? self.settings.selectedClass : '')+ '" data-index="'+(k)+'" data-value="'+this.value+'">'+ (this.innerHTML) + '</li>'

                k++;
            })

            this.$dropdown.html(o)

            /**
             * Items
             */

            this.$items = this.$dropdown.children();
        },

        _events: function(){

            /* Input: focus */

            this.$container.on('focus.input', 'input', $.proxy(this._focus, this))

            /**
             * Input: mouseup
             * For input select() event to function correctly
             */
            this.$container.on('mouseup.input', 'input', function(e){
                e.preventDefault()
            })

            /* Input: blur */

            this.$container.on('blur.input', 'input', $.proxy(this._blur, this))

            /* Select: change */

            this.$el.on('change.select', $.proxy(this._change, this))

            /* Select: focus */

            this.$el.on('focus.select', $.proxy(this._focus, this))

            /* Select: blur */

            this.$el.on('blur.select', $.proxy(this._blurSelect, this))

            /* Dropdown Arrow: click */

            this.$container.on('click.arrow', '.'+this.settings.comboArrowClass , $.proxy(this._toggle, this))

            /* Dropdown: close */

            this.$container.on('comboselect:close', $.proxy(this._close, this))

            /* Dropdown: open */

            this.$container.on('comboselect:open', $.proxy(this._open, this))

            /* Dropdown: update */

            this.$container.on('comboselect:update', $.proxy(this._update, this));


            /* HTML Click */

            $('html').off('click.comboselect').on('click.comboselect', function(){

                $.each($.fn[ pluginName ].instances, function(i, plugin){

                    plugin.$container.trigger('comboselect:close')

                })
            });

            /* Stop `event:click` bubbling */

            this.$container.on('click.comboselect', function(e){
                e.stopPropagation();
            })


            /* Input: keydown */

            this.$container.on('keydown', 'input', $.proxy(this._keydown, this))

            /* Input: keyup */

            this.$container.on('keyup', 'input', $.proxy(this._keyup, this))

            /* Dropdown item: click */

            this.$container.on('click.item', '.option-item', $.proxy(this._select, this))

        },

        _keydown: function(event){



            switch(event.which){

                case keys.UP:
                    this._move('up', event)
                    break;

                case keys.DOWN:
                    this._move('down', event)
                    break;

                case keys.TAB:
                    this._enter(event)
                    break;

                case keys.RIGHT:
                    this._autofill(event);
                    break;

                case keys.ENTER:
                    this._enter(event);
                    break;

                default:
                    break;


            }

        },


        _keyup: function(event){

            switch(event.which){
                case keys.ESC:
                    this.$container.trigger('comboselect:close')
                    break;

                case keys.ENTER:
                case keys.UP:
                case keys.DOWN:
                case keys.LEFT:
                case keys.RIGHT:
                case keys.TAB:
                case keys.SHIFT:
                    break;

                default:
                    this._filter(event.target.value)
                    break;
            }
        },

        _enter: function(event){

            var item = this._getHovered()

            item.length && this._select(item);

            /* Check if it enter key */
            if(event && event.which == keys.ENTER){

                if(!item.length) {

                    /* Check if its illegal value */

                    this._blur();

                    return true;
                }

                event.preventDefault();
            }


        },
        _move: function(dir){

            var items = this._getVisible(),
                current = this._getHovered(),
                index = current.prevAll('.option-item').filter(':visible').length,
                total = items.length


            switch(dir){
                case 'up':
                    index--;
                    (index < 0) && (index = (total - 1));
                    break;

                case 'down':
                    index++;
                    (index >= total) && (index = 0);
                    break;
            }


            items
                .removeClass(this.settings.hoverClass)
                .eq(index)
                .addClass(this.settings.hoverClass)


            if(!this.opened) this.$container.trigger('comboselect:open');

            this._fixScroll()
        },

        _select: function(event){

            var item = event.currentTarget? $(event.currentTarget) : $(event);

            if(!item.length) return;

            /**
             * 1. get Index
             */

            var index = item.data('index');

            this._selectByIndex(index);

            //this.$container.trigger('comboselect:close')

            this.$input.focus();

            this.$container.trigger('comboselect:close');

        },

        _selectByIndex: function(index){

            /**
             * Set selected index and trigger change
             * @type {[type]}
             */
            if(typeof index == 'undefined'){

                index = 0

            }

            if(this.$el.prop('selectedIndex') != index){

                this.$el.prop('selectedIndex', index).trigger('change');
            }

        },

        _autofill: function(){

            var item = this._getHovered();

            if(item.length){

                var index = item.data('index')

                this._selectByIndex(index)

            }

        },


        _filter: function(search){

            var self = this,
                items = this._getAll();
                needle = $.trim(search).toLowerCase(),
                reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g'),
                pattern = '(' + search.replace(reEscape, '\\$1') + ')';


            /**
             * Unwrap all markers
             */

            $('.'+self.settings.markerClass, items).contents().unwrap();

            /* Search */

            if(needle){

                /* Hide Disabled and optgroups */

                this.$items.filter('.option-group, .option-disabled').hide();


                items
                    .hide()
                    .filter(function(){

                        var $this = $(this),
                            text = $.trim($this.text()).toLowerCase();

                        /* Found */
                        if(text.toString().indexOf(needle) != -1){

                            /**
                             * Wrap the selection
                             */

                            $this
                                .html(function(index, oldhtml){
                                return oldhtml.replace(new RegExp(pattern, 'gi'), '<span class="'+self.settings.markerClass+'">$1</span>')
                            })

                            return true
                        }

                    })
                    .show()
            }else{


                this.$items.show();
            }

            /* Open the comboselect */

            this.$container.trigger('comboselect:open')


        },

        _highlight: function(){

            /*
            1. Check if there is a selected item
            2. Add hover class to it
            3. If not add hover class to first item
            */

            var visible = this._getVisible().removeClass(this.settings.hoverClass),
                $selected = visible.filter('.'+this.settings.selectedClass)

            if($selected.length){

                $selected.addClass(this.settings.hoverClass);

            }else{

                visible
                    .removeClass(this.settings.hoverClass)
                    .first()
                    .addClass(this.settings.hoverClass)
            }

        },

        _updateInput: function(){

            var selected = this.$el.prop('selectedIndex')

            if(this.$el.val()){

                text = this.$el.find('option').eq(selected).text()

                this.$input.val(text)

            }else{

                this.$input.val('')

            }

            return this._getAll()
                .removeClass(this.settings.selectedClass)
                .filter(function(){

                    return $(this).data('index') == selected
                })
                .addClass(this.settings.selectedClass)

        },
        _blurSelect: function(){

            this.$container.removeClass('combo-focus');

        },
        _focus: function(event){

            /* Toggle focus class */

            this.$container.toggleClass('combo-focus', !this.opened);

            /* If mobile: stop */

            if(isMobile) return;

            /* Open combo */

            if(!this.opened) this.$container.trigger('comboselect:open');

            /* Select the input */

            this.settings.focusInput && event && event.currentTarget && event.currentTarget.nodeName == 'INPUT' && event.currentTarget.select()
        },

        _blur: function(){

            /**
             * 1. Get hovered item
             * 2. If not check if input value == select option
             * 3. If none
             */

            var val = $.trim(this.$input.val().toLowerCase()),
                isNumber = !isNaN(val);

            var index = this.$options.filter(function(){
                return this.nodeName == 'OPTION'
            }).filter(function(){
                var _text = this.innerText || this.textContent
                if(isNumber){
                    return parseInt($.trim(_text).toLowerCase()) == val
                }

                return $.trim(_text).toLowerCase() == val

            }).prop('index')

            /* Select by Index */

            this._selectByIndex(index)

        },

        _change: function(){


            this._updateInput();

        },

        _getAll: function(){

            return this.$items.filter('.option-item')

        },
        _getVisible: function(){

            return this.$items.filter('.option-item').filter(':visible')

        },

        _getHovered: function(){

            return this._getVisible().filter('.' + this.settings.hoverClass);

        },

        _open: function(){

            var self = this

            this.$container.addClass('combo-open')

            this.opened = true

            /* Focus input field */

            this.settings.focusInput && setTimeout(function(){ !self.$input.is(':focus') && self.$input.focus(); });

            /* Highligh the items */

            this._highlight()

            /* Fix scroll */

            this._fixScroll()

            /* Close all others */


            $.each($.fn[ pluginName ].instances, function(i, plugin){

                if(plugin != self && plugin.opened) plugin.$container.trigger('comboselect:close')
            })

        },

        _toggle: function(){

            this.opened? this._close.call(this) : this._open.call(this)
        },

        _close: function(){

            this.$container.removeClass('combo-open combo-focus')

            this.$container.trigger('comboselect:closed')

            this.opened = false

            /* Show all items */

            this.$items.show();

        },
        _fixScroll: function(){

            /**
             * If dropdown is hidden
             */
            if(this.$dropdown.is(':hidden')) return;


            /**
             * Else
             */
            var item = this._getHovered();

            if(!item.length) return;

            /**
             * Scroll
             */

            var offsetTop,
                upperBound,
                lowerBound,
                heightDelta = item.outerHeight()

            offsetTop = item[0].offsetTop;

            upperBound = this.$dropdown.scrollTop();

            lowerBound = upperBound + this.settings.maxHeight - heightDelta;

            if (offsetTop < upperBound) {

                this.$dropdown.scrollTop(offsetTop);

            } else if (offsetTop > lowerBound) {

                this.$dropdown.scrollTop(offsetTop - this.settings.maxHeight + heightDelta);
            }

        },
        /**
         * Update API
         */

        _update: function(){

            this.$options = this.$el.find('option, optgroup')

            this.$dropdown.empty();

            this._build();
        },

        /**
         * Destroy API
         */

        dispose: function(){

            /* Remove combo arrow, input, dropdown */

            this.$arrow.remove()

            this.$input.remove()

            this.$dropdown.remove()

            /* Remove tabindex property */
            this.$el
                .removeAttr("tabindex")

            /* Check if there is a tabindex set before */

            if(!!this.$el.data('plugin_'+ dataKey + '_tabindex')){
                this.$el.prop('tabindex', this.$el.data('plugin_'+ dataKey + '_tabindex'))
            }

            /* Unwrap */

            this.$el.unwrap()

            /* Remove data */

            this.$el.removeData('plugin_'+dataKey)

            /* Remove tabindex data */

            this.$el.removeData('plugin_'+dataKey + '_tabindex')

            /* Remove change event on select */

            this.$el.off('change.select focus.select blur.select');

        }
    });



    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[ pluginName ] = function ( options, args ) {

        this.each(function() {

            var $e = $(this),
                instance = $e.data('plugin_'+dataKey)

            if (typeof options === 'string') {

                if (instance && typeof instance[options] === 'function') {
                        instance[options](args);
                }

            }else{

                if (instance && instance.dispose) {
                        instance.dispose();
                }

                $.data( this, "plugin_" + dataKey, new Plugin( this, options ) );

            }

        });

        // chain jQuery functions
        return this;
    };

    $.fn[ pluginName ].instances = [];

}));










