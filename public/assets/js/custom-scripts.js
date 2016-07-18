isIE = false;
var $ = jQuery.noConflict();
(function($){
    "use strict"; // Start of use strict
    
/* ----------------------------------------------------------
    # Scripts 
--------------------------------Lioit.com------------------*/
    
    $(window).on('load', function(){
        
        // Page loader
        $(".bo-loading div").delay(0).fadeOut();
        $(".bo-loading").delay(200).fadeOut("slow");
    
        init_scroll_navigate();
        
        $(window).trigger("scroll");
        $(window).trigger("resize");
        
        // Hash menu forwarding
        if (window.location.hash){
            var hash_offset = $(window.location.hash).offset().top;
            $("html, body").animate({
                scrollTop: hash_offset
            });
        }
        
    });
    
    $(document).ready(function(){
        
        $(window).trigger("resize");
            
        init_main_menu();
        init_side_header();
        init_lightbox();
        init_parallax();
        init_shortcodes();
        init_tooltips();
        init_counters();
        init_forms_cols();
        init_main_headerv();
        init_overlay_search();
        init_team();
        initPageSliders();
        initWorkFilter();
        init_map();
        init_wow();
        init_masonry();
    });
    
    $(window).on('resize', function(){
        
        init_main_menu_resize();
        init_side_header_resize();
        js_height_init();
        
    });
    
    

/* ----------------------------------------------------------
    # Platform detect
--------------------------------Lioit.com------------------*/
    var mobileTest;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        mobileTest = true;
        $("html").addClass("mobile");
    }
    else {
        mobileTest = false;
        $("html").addClass("no-mobile");
    }
    
    var mozillaTest;
    if (/mozilla/.test(navigator.userAgent)) {
        mozillaTest = true;
    }
    else {
        mozillaTest = false;
    }
    var safariTest;
    if (/safari/.test(navigator.userAgent)) {
        safariTest = true;
    }
    else {
        safariTest = false;
    }
    
    // Detect touch devices
    if (!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += " no-touch";
    }
    
    

/* ----------------------------------------------------------
    # Lio Sections
--------------------------------Lioit.com------------------*/
        
        
    
        /* ----------------------------------------------------------
            ## Sections backgrounds
        --------------------------------Lioit.com------------------*/
        var lioSections = $(".page, .body-bg-img,.side-img, .bg-img, .section-img-background, .small-img-background, .home-section,  .page-section,  .split-section, .xlarge-section, .large-section, .small-section, .tiny-section, .xtiny-section");

        lioSections.each(function(indx){
            if ($(this).attr("data-background")){ $(this).css("background-image", "url(" + $(this).data("background") + ")");}
        });
        /* ----------------------------------------------------------
            ## Sections Heights
        --------------------------------Lioit.com------------------*/
        function height_line(height_object, height_donor){
            height_object.height(height_donor.height());
            height_object.css({ "line-height": height_donor.height() + "px" });
        }
        /* ----------------------------------------------------------
                ## Forced equal
        --------------------------------Lioit.com------------------*/
        !function(a){
            a.fn.equalHeights = function(){
                var b = 0, c = a(this);
                return c.each(function(){
                    var c = a(this).innerHeight();
                    c > b && (b = c)
                }), c.css("height", b)
            }, a("[data-equal]").each(function(){
                var b = a(this), c = b.data("equal");
                b.find(c).equalHeights()
            })
        }(jQuery);
    
        /* ---------------------------------------------
            ## Force Height 100%
         --------------------------------------------- */
        function js_height_init(){
            (function($){
                $(".force-height-full").height($(window).height());
                $(".force-height-parent").each(function() { $(this).height($(this).parent().first().height()); });
            })(jQuery);
         }

/* ----------------------------------------------------------
    # Shortcodes
--------------------------------Lioit.com------------------*/

        /* ----------------------------------------------------------
            ## Progress bars
        --------------------------------Lioit.com------------------*/
        var progressBar = $(".progress-bar");
        progressBar.each(function(indx){ $(this).css("width", $(this).attr("aria-valuenow") + "%"); });
        
        /* ----------------------------------------------------------
            ## Tabs minimal
        --------------------------------Lioit.com------------------*/
        function init_shortcodes(){
    
            var liosh_tab_height;
            $(".lio-sh-minimal-tabs > li > a").on('click', function(){
        
            if (!($(this).parent("li").hasClass("active"))) {
                liosh_tab_height = $(".lio-sh-minimal-tabs-cont > .tab-pane").filter($(this).attr("href")).height();
                $(".lio-sh-minimal-tabs-cont").animate({
                    height: liosh_tab_height
                }, function(){  $(".lio-sh-minimal-tabs-cont").css("height", "auto"); });
                
            }
            
        });
        /* ----------------------------------------------------------
            ## Accordion
        --------------------------------Lioit.com------------------*/
        var allPanels = $(".accordion > dd").hide();
        allPanels.first().slideDown("easeOutExpo");
        $(".accordion > dt > a").first().addClass("active");
        
            $(".accordion > dt > a").on('click', function(){
        
            var current = $(this).parent().next("dd");
            $(".accordion > dt > a").removeClass("active");
            $(this).addClass("active");
            allPanels.not(current).slideUp("easeInExpo");
            $(this).parent().next().slideDown("easeOutExpo");
            
            return false;
            
        });
        /* ----------------------------------------------------------
            ## Toggle
        --------------------------------Lioit.com------------------*/
        var allToggles = $(".toggle > dd").hide();
        
        $(".toggle > dt > a").on('click', function(){
        
            if ($(this).hasClass("active")) {
            
                $(this).parent().next().slideUp("easeOutExpo");
                $(this).removeClass("active");
                
            }
            else {
                var current = $(this).parent().next("dd");
                $(this).addClass("active");
                $(this).parent().next().slideDown("easeOutExpo");
            }
            
            return false;
        });
        /* ----------------------------------------------------------
            ## Responsive video
        --------------------------------Lioit.com------------------*/
        $(".video, .resp-media, .blog-media").fitVids();
        $(".work-full-media").fitVids();
               
        }
    
        /* ----------------------------------------------------------
            ## Tooltips *bootstrap required
        --------------------------------Lioit.com------------------*/
     
        function init_tooltips(){
        
            $(".tooltip-bot, .tooltip-bot a, .nav-social-links a").tooltip({
                placement: "bottom"
            });
            
            $(".tooltip-top, .tooltip-top a").tooltip({
                placement: "top"
            });
            
            
            $(".tooltip-right, .tooltip-right a").tooltip({
                placement: "right"
            });
            
            
            $(".tooltip-left, .tooltip-left a").tooltip({
                placement: "left"
            });
            
        }
    
         /* ----------------------------------------------------------
            ## facts
         --------------------------------Lioit.com------------------*/
         function init_counters(){
            $(".count-number").appear(function(){
                var count = $(this);
                count.countTo({
                    from: 0,
                    to: count.html(),
                    speed: 1300,
                    refreshInterval: 60,
                });
                
            });
        }
        
        /*----------------------------------------------------------
            # Overlay Search
        --------------------------------Lioit.com------------------*/
         function init_overlay_search(){
                function c() {
                    if (navigator.userAgent.match(/(iPad|iPhone);.*CPU.*OS 7_\d/i)) {
                        var a = Math.floor(jQuery(window).height() * (jQuery(".cover").attr("data-height") / 100));
                        jQuery(".cover").css("height", a)
                    }
                }
                if (jQuery(".showsearch").on('click', function() {
                        jQuery(".searchoverlay").fadeIn(500), jQuery(".searchoverlay .query").focus()
                    }), jQuery(".closesearch").on('click', function() {
                        jQuery(".searchoverlay").fadeOut(500)
                    }), jQuery(".cover").length > 0 ? (jQuery(".headroom").css("display", "none"), jQuery("footer.postinfo").css("display", "none"), jQuery(".cover").waypoint(function(a) {
                        "down" == a && jQuery(".headroom").css("display", "block"), "up" == a && jQuery(".headroom").fadeOut(200)
                    }, {
                        offset: -Math.abs(jQuery(".cover").height())
                    }), jQuery(".cover").waypoint(function(a) {
                        "down" == a && jQuery("footer.postinfo").css("display", "block"), "up" == a && jQuery("footer.postinfo").fadeOut(200)
                    }, {
                        offset: -75
                    })) : jQuery(".headroom").css("display", "block"), jQuery(".headroom").length > 0) {
                    Headroom.options.offset = 50, Headroom.options.tolerance.up = 20, Headroom.options.tolerance.down = 10, Headroom.options.onUnpin = function() {
                        jQuery(".sub-menu").slideUp()
                    };
                    var d = document.querySelector(".headroom"),
                        e = new Headroom(d);
                    e.init()
                }
          
        }
    
        /*----------------------------------------------------------
            # Header Search
        --------------------------------Lioit.com------------------*/
         
        function init_main_headerv(){
            jQuery("#main-headerv-search").on('click', function () {
                var $this = jQuery(this);
                var $searchform = $this.parent().find(".headerv-search");
                $searchform.fadeToggle(250, function () {
        
                    if (($searchform).is(":visible")) {
                        $this.find(".fa-search").removeClass("fa-search").addClass("fa-times");
        
                        if (!isIE) {
                            $searchform.find("[type=text]").focus();
                        }
                    } else {
                        $this.find(".fa-times").removeClass("fa-times").addClass("fa-search");
                    }
                });
        
                return false;
            });
          }  
            
        /* ----------------------------------------------------------
            ## Team
        --------------------------------Lioit.com------------------*/
         
        function init_team(){
        
            // Hover
            $(".team-col").on('click', function(){
                if ($("html").hasClass("mobile")) {
                    $(this).toggleClass("js-enabled");
                }
            });
            
        }
        
        /*----------------------------------------------------------
            # Forms Colsets
        --------------------------------Lioit.com------------------*/
        function init_forms_cols() {
                $('.form-group.form-group-default').on('click', function() {
                    $(this).find('input').focus();
                });
                $('body').on('focus', '.form-group.form-group-default :input', function() {
                    $('.form-group.form-group-default').removeClass('focused');
                    $(this).parents('.form-group').addClass('focused');
                });
                $('body').on('blur', '.form-group.form-group-default :input', function() {
                    $(this).parents('.form-group').removeClass('focused');
                    if ($(this).val()) {
                        $(this).closest('.form-group').find('label').addClass('fade');
                    } else {
                        $(this).closest('.form-group').find('label').removeClass('fade');
                    }
                });
                $('.form-group.form-group-default .checkbox, .form-group.form-group-default .radio').on(
                {
                    mouseenter: function() {
                        $(this).parents('.form-group').addClass('focused');
                    },
                    mouseleave: function() {
                        $(this).parents('.form-group').removeClass('focused');
                    }
                });
                
                
                jQuery(".md-input").on('focus', function() {
                  jQuery(this).parent().addClass("is-active is-completed");
                });
                
                jQuery(".md-input").on('focusout', function() {
                  if (jQuery(this).val() === "") {
                    jQuery(this).parent().removeClass("is-completed");
                  }
                  jQuery(this).parent().removeClass("is-active");
                });
                
        }

   
/* ----------------------------------------------------------
    # Navbar
--------------------------------Lioit.com------------------*/
    
    var mobile_nav = $(".mobile-nav");
    var desktop_nav = $(".desktop-nav");
    
    function init_main_menu_resize(){
        
        // Mobile menu max height
        $(".mobile-on .desktop-nav > ul").css("max-height", $(window).height() - $(".main-nav").height() - 20 + "px");
        
        // Mobile menu style toggle
        if ($(window).width() <= 1024) {
            $(".main-nav").addClass("mobile-on");
        }
        else
            if ($(window).width() > 1024) {
                $(".main-nav").removeClass("mobile-on");
                desktop_nav.show();
            }
    }
    /*----------------------------------------------------------
        ## Main Menu
    --------------------------------Lioit.com------------------*/
    function init_main_menu(){
        
        //
        
        $(".js-stick").sticky({
            topSpacing: 0
        });
        
        
        height_line($(".inner-nav ul > li > a"), $(".main-nav"));
        height_line(mobile_nav, $(".main-nav"));
        
        mobile_nav.css({
            "width": $(".main-nav").height() + "px"
        });
        
        // Transpaner menu
        
        if ($(".main-nav").hasClass("transparent")){
           $(".main-nav").addClass("js-transparent");
        }
        
        $(window).scroll(function(){
            
                if ($(window).scrollTop() > 10) {
                    $(".js-transparent").removeClass("transparent");
                    $(".main-nav, .nav-logo-wrap .logo, .mobile-nav").addClass("small-height");
                }
                else {
                    $(".js-transparent").addClass("transparent");
                    $(".main-nav, .nav-logo-wrap .logo, .mobile-nav").removeClass("small-height");
                }
            
            
        });
        
        /*----------------------------------------------------------
            ## Mobile menu toggle
        --------------------------------Lioit.com------------------*/
        mobile_nav.on('click', function(){
        
            if (desktop_nav.hasClass("js-opened")) {
                desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
                $(this).removeClass("active");
            }
            else {
                desktop_nav.slideDown("slow", "easeOutQuart").addClass("js-opened");
                $(this).addClass("active");
            }
            
        });
        
        desktop_nav.find("a:not(.mn-has-sub)").on('click', function(){
            if (mobile_nav.hasClass("active")) {
                desktop_nav.slideUp("slow", "easeOutExpo").removeClass("js-opened");
                mobile_nav.removeClass("active");
            }
        });
        
      
        /*----------------------------------------------------------
        ## Sub menu
        --------------------------------Lioit.com------------------*/
        
        var mnHasSub = $(".mn-has-sub");
        var mnThisLi;
        
        $(".mobile-on .mn-has-sub").find(".fa:first").removeClass("fa-angle-right").addClass("fa-angle-down");
        
        mnHasSub.on('click', function(){
        
            if ($(".main-nav").hasClass("mobile-on")) {
                mnThisLi = $(this).parent("li:first");
                if (mnThisLi.hasClass("js-opened")) {
                    mnThisLi.find(".mn-sub:first").slideUp(function(){
                        mnThisLi.removeClass("js-opened");
                        mnThisLi.find(".mn-has-sub").find(".fa:first").removeClass("fa-angle-up").addClass("fa-angle-down");
                    });
                }
                else {
                    $(this).find(".fa:first").removeClass("fa-angle-down").addClass("fa-angle-up");
                    mnThisLi.addClass("js-opened");
                    mnThisLi.find(".mn-sub:first").slideDown();
                }
                
                return false;
            }
            else {
                return false;
            }
            
        });
        
        mnThisLi = mnHasSub.parent("li");
        mnThisLi.on(
        {
            mouseenter: function(){
                
                if (!($(".main-nav").hasClass("mobile-on"))) {
                    
                    $(this).find(".mn-sub:first").stop(true, true).fadeIn("fast");
                }
                
            },
            mouseleave: function(){
                
                if (!($(".main-nav").hasClass("mobile-on"))) {
                    
                    $(this).find(".mn-sub:first").stop(true, true).delay(100).fadeOut("fast");
                }
                
            }
        });
        
    }
    
/*----------------------------------------------------------
    # Scroll navigation
--------------------------------Lioit.com------------------*/
    function init_scroll_navigate(){
        
        $(".local-scroll").localScroll({
            target: "body",
            duration: 1500,
            offset: 0,
            easing: "easeInOutExpo"
        });
        
        var sections = $(".home-section, .split-section, .page-section");
        var menu_links = $(".scroll-nav li a");
        
        $(window).scroll(function(){
        
            sections.filter(":in-viewport:first").each(function(){
                var active_section = $(this);
                var active_link = $('.scroll-nav li a[href="#' + active_section.attr("id") + '"]');
                menu_links.removeClass("active");
                active_link.addClass("active");
            });
            
        });
        
    }
    
/*----------------------------------------------------------
    # Lightboxes
--------------------------------Lioit.com------------------*/
    
    function init_lightbox(){
    
            // Works Item Lightbox
            $(".work-lightbox-link").magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom', // this class is for CSS animation below
        
            zoom: {
            enabled: true, // By default it's false, so don't forget to enable it
        
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function
        
            // The "opener" function should return the element from which popup will be zoomed in
            // and to which popup will be scaled down
            // By defailt it looks for an image tag:
            opener: function(openerElement) {
                  // openerElement is the element on which popup was initialized, in this case its <a> tag
                  // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                  return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
              }
            
    });
    /*----------------------------------------------------------
        ## Works Item Lightbox
    --------------------------------Lioit.com------------------*/
     
        $(".lightbox-gallery-1").magnificPopup({
            gallery: {
                enabled: true
            },
            mainClass: "mfp-with-zoom"
        });
        
        // Other Custom Lightbox
        $(".lightbox-gallery-2").magnificPopup({
            gallery: {
                enabled: true
            },
            mainClass: "mfp-with-zoom"
        });
        $(".lightbox-gallery-3").magnificPopup({
            gallery: {
                enabled: true
            },
            mainClass: "mfp-with-zoom"
        });
        $(".lightbox").magnificPopup();
        
        $(".video").magnificPopup();
        
        
        $('.popup-with-zoom-anim').magnificPopup({
          type: 'inline',

          fixedContentPos: false,
          fixedBgPos: true,

          overflowY: 'auto',

          closeBtnInside: true,
          preloader: false,
          
          midClick: true,
          removalDelay: 300,
          mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
          type: 'inline',

          fixedContentPos: false,
          fixedBgPos: true,

          overflowY: 'auto',

          closeBtnInside: true,
          preloader: false,
          
          midClick: true,
          removalDelay: 300,
          mainClass: 'my-mfp-slide-bottom'
        });
        
        
    }
    
    
/*----------------------------------------------------------
    # Parallax
--------------------------------Lioit.com------------------*/

    
    function init_parallax(){
    
        // Parallax
        if (($(window).width() >= 1024) && (mobileTest == false)) {
            $(".parallax-1").parallax("50%", 0.1);
            $(".parallax-2").parallax("50%", 0.2);
            $(".parallax-3").parallax("50%", 0.3);
            $(".parallax-4").parallax("50%", 0.4);
            $(".parallax-5").parallax("50%", 0.5);
            $(".parallax-6").parallax("50%", 0.6);
            $(".parallax-7").parallax("50%", 0.7);
            $(".parallax-8").parallax("50%", 0.5);
            $(".parallax-9").parallax("50%", 0.5);
            $(".parallax-10").parallax("50%", 0.5);
            $(".parallax-11").parallax("50%", 0.05);
        }
        
    }

    
    
})(jQuery); // End of use strict

    /* ----------------------------------------------------------
        ## parallax Heading Smooth fade Effects
    --------------------------------Lioit.com------------------*/
    
function parallax() {
        var scrollPosition = jQuery(window).scrollTop();
        jQuery('.mainAvatar').css('opacity',((100 - scrollPosition/2) *0.01));
        jQuery('.welcome-intro h1').css('opacity',((100 - scrollPosition/3) *0.01));
        jQuery('.welcome-intro .intro-title').css('opacity',((100 - scrollPosition/3) *0.01));
        jQuery('.welcome-intro p').css('opacity',((100 - scrollPosition/4) *0.01));
        jQuery('.welcome-intro .btn').css('opacity',((100 - scrollPosition/5) *0.01));
        jQuery('.author-img').css('opacity',((0 + scrollPosition/7) *0.06));
        
        jQuery('.heading-details h1').css('opacity',((100 - scrollPosition/3) *0.01));
        jQuery('.heading-details p').css('opacity',((100 - scrollPosition/4) *0.01));
        
        jQuery('.work-heading-details').css('opacity',((100 - scrollPosition/5) *0.01));
        
        jQuery('.cover-parallax').css('opacity',((100 - scrollPosition/4) *0.01));
      


}
jQuery(window).on('scroll', function(e) {
    parallax();
});
    
    
/*----------------------------------------------------------
    # Sliders
--------------------------------Lioit.com------------------*/

function initPageSliders(){
    (function($){
        "use strict";
        
        $('.carousel').owlCarousel({
            items:3,
            nav: true,
            dots: false,
            loop:true,
            mobileBoost: true,
            navText: ['',''],
            autoWidth: true,
            margin: 0,
            merge: false,
            center: false,
            autoplay:true,
            autoHeight: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 6000,
            smartSpeed: 1500,
            autoplayHoverPause: true
        });
    
        // Fullwidth slider
        $(".fullwidth-slider-defult").owlCarousel({
            slideSpeed: 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            pagination: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Fullwidth slider w/pagination
        $(".fullwidth-slider-wpager").owlCarousel({
            slideSpeed: 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            pagination: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
         // Fullwidth slider
        $(".fullwidth-slider-fade").owlCarousel({
            transitionStyle: "fadeUp",
            slideSpeed: 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            pagination: false,
            autoPlay : true,
            stopOnHover : true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        
         // Fullwidth slider
        $(".fullwidth-slider2").owlCarousel({
            slideSpeed: 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            pagination: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Fullwidth gallery
        $(".fullwidth-gallery").owlCarousel({
            transitionStyle: "fade",
            autoPlay: 5000,
            slideSpeed: 700,
            singleItem: true,
            autoHeight: true,
            navigation: false,
            pagination: false
        });
        
        // Fullwidth slider
        $(".small-featured-posts").owlCarousel({
            slideSpeed: 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            pagination: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        
        
        // Fullwidth slider
        $(".three-slider").owlCarousel({
            slideSpeed: 350,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsTabletSmall: [768, 3],
            itemsMobile: [480, 1],
            autoHeight: true,
            navigation: true,
            pagination: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
                
         // Fullwidth slider
        $(".five-slider").owlCarousel({
            slideSpeed: 350,
            items: 5,
            itemsDesktop: [1199, 5],
            itemsTabletSmall: [768, 5],
            itemsMobile: [480, 3],
            autoHeight: true,
            navigation: true,
            pagination: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
       
        // Item carousel
        $(".item-carousel").owlCarousel({
            autoPlay: false,
            //stopOnHover: true,
            items: 3,
            itemsDesktop: [1199, 3],
            itemsTabletSmall: [768, 3],
            itemsMobile: [480, 1],
            navigation: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        
        // Item carousel
        $(".small-item-carousel").owlCarousel({
            autoPlay: 2500,
            stopOnHover: true,
            items: 6,
            itemsDesktop: [1199, 4],
            itemsTabletSmall: [768, 3],
            itemsMobile: [480, 2],
            pagination: false,
            navigation: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Item carousel
        $(".small-item-carousel2").owlCarousel({
            autoPlay: 2500,
            stopOnHover: true,
            items: 4,
            itemsDesktop: [1199, 4],
            itemsTabletSmall: [768, 3],
            itemsMobile: [480, 2],
            pagination: false,
            navigation: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Item carousel
        $(".small-item-carousel2-wpager").owlCarousel({
            autoPlay: 2500,
            stopOnHover: true,
            items: 4,
            itemsDesktop: [1199, 4],
            itemsTabletSmall: [768, 3],
            itemsMobile: [480, 2],
            pagination: true,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Single carousel
        $(".single-carousel").owlCarousel({
            //transitionStyle: "backSlide",
            singleItem: true,
            autoHeight: true,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Content Slider
        $(".content-slider").owlCarousel({
            slideSpeed: 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Image carousel
        $(".image-carousel").owlCarousel({
            autoPlay: 5000,
            stopOnHover: true,
            items: 4,
            itemsDesktop: [1199, 3],
            itemsTabletSmall: [768, 2],
            itemsMobile: [480, 1],
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            pagination: false,
        });

        // Photo slider
        $(".photo-slider").owlCarousel({
            //transitionStyle: "backSlide",
            slideSpeed: 350,
            items: 4,
            itemsDesktop: [1199, 4],
            itemsTabletSmall: [768, 2],
            itemsMobile: [480, 1],
            autoHeight: true,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
        
        // Work slider
        $(".work-full-slider").owlCarousel({
            slideSpeed : 350,
            singleItem: true,
            autoHeight: true,
            navigation: true,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
            
        
        if ($(".owl-carousel").lenth) {
            var owl = $(".owl-carousel").data('owlCarousel');
            owl.reinit();
        }

    })(jQuery);
};


/* ---------------------------------------------
     Side panel
   --------------------------------------------- */
    
    var side_header = $(".sideheader");
    var sheader_button = $(".sideheader-button");
    var sheader_close_button = $(".sideheader-close-button");
    var sheader_overlay = $(".sideheader-overlay");
    
    function sheader_panel_close(){
        side_header.animate({
            opacity: 0,
            left: -270
        }, 500, "easeOutExpo");
        sheader_overlay.fadeOut();
        
        
        if ($(".owl-carousel").lenth) {
            $(".owl-carousel").data("owlCarousel").play();
        }
    }
    
    function init_side_header(){
        (function($){
            "use strict";
            sheader_button.on('click', function(){
                side_header.animate({
                    opacity: 1,
                    left: 0
                }, 500, "easeOutExpo");
                setTimeout(function(){
                    sheader_overlay.fadeIn();
                }, 100);
                if ($(".owl-carousel").lenth) {  $(".owl-carousel").data("owlCarousel").stop(); }
                return false;
            
            });
            
            sheader_close_button.on('click', function(){
                sheader_panel_close();
                return false;
            });
            sheader_overlay.on('click', function(){
                sheader_panel_close();
                return false;
            });
            
            $("#sideheader-menu").find("a:not(.sideheader-has-sub)").on('click', function(){
                if (!($(window).width() >= 1199)) {
                    sheader_panel_close();
                }
            });
            
            
            // Sub menu
        
            var spHasSub = $(".sideheader-has-sub");
            var spThisLi;
            
            spHasSub.on('click', function(){
            
                spThisLi = $(this).parent("li:first");
                if (spThisLi.hasClass("js-opened")) {
                    spThisLi.find(".sideheader-sub:first").slideUp(function(){
                        spThisLi.removeClass("js-opened");
                        spThisLi.find(".sideheader-has-sub").find(".fa:first").removeClass("fa-angle-up").addClass("fa-angle-down");
                    });
                }
                else {
                    $(this).find(".fa:first").removeClass("fa-angle-down").addClass("fa-angle-up");
                    spThisLi.addClass("js-opened");
                    spThisLi.find(".sideheader-sub:first").slideDown();
                }
                
                return false;
                
            });
            
        })(jQuery);
    }
    
    function init_side_header_resize(){
        (function($){
            "use strict";
            
             if ($(window).width() >= 1199){
               side_header.css({
                   opacity: 1,
                   left: 0
               });
               $(".sideheader-is-left").css("margin-left", "270px");
               sheader_button.css("display", "none");
               sheader_close_button.css("display", "none");
             } else {
                 side_header.css({
                     opacity: 0,
                     left: -270
                 });
                 $(".sideheader-is-left").css("margin-left", "0");
                 sheader_button.css("display", "block");
                 sheader_close_button.css("display", "block");
             }
            
        })(jQuery);
    }



/*----------------------------------------------------------
    # Portfolio
--------------------------------Lioit.com------------------*/

// Projects filtering
var fselector = 0;
var work_grid = $("#portfolio-grid");

function initWorkFilter(){
    (function($){
     "use strict";
     var isotope_mode;
     if (work_grid.hasClass("masonry")){
         isotope_mode = "masonry";
     } else{
         isotope_mode = "fitRows"
     }
     
     work_grid.imagesLoaded(function(){
            work_grid.isotope({
                itemSelector: '.mix',
                layoutMode: isotope_mode,
                filter: fselector
            });
        });
        
        $(".filter").on('click', function(){
            $(".filter").removeClass("active");
            $(this).addClass("active");
            fselector = $(this).attr('data-filter');
            
            work_grid.isotope({
                itemSelector: '.mix',
                layoutMode: isotope_mode,
                filter: fselector
            });
            return false;
        });
        
    })(jQuery);
}



/*----------------------------------------------------------
    # Google Maps
--------------------------------Lioit.com------------------*/

var gmMapDiv = $("#map-section");

function init_map(){
    (function($){
        
        $(".map-section").on('click', function(){
            $(this).toggleClass("js-enabled");
            $(this).find(".mt-open").toggle();
            $(this).find(".mt-close").toggle();
        });
         
        
        if (gmMapDiv.length) {
                var gmCenterAddress = gmMapDiv.attr("data-address");
                var gmMarkerAddress = gmMapDiv.attr("data-address");
            
                gmMapDiv.gmap3({
                action: "init",
                marker: {
                    address: gmMarkerAddress,
                    options: {
                        icon: "assets/images/map-marker.png"
                    }
                },
                map: {
                    options: {
                        zoom: 14,
                        zoomControl: true,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.SMALL
                        },
                        mapTypeControl: false,
                        scaleControl: false,
                        scrollwheel: false,
                        streetViewControl: false,
                        draggable: true,
                        styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
                    }
                }
            });
        }
    })(jQuery);
}
/*----------------------------------------------------------
    # WOW animations
--------------------------------Lioit.com------------------*/

function init_wow(){
    (function($){
    
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 90,
            mobile: false,
            live: true
        });
        
        if ($("body").hasClass("appear-animate")){
           wow.init();
        }
        
    })(jQuery);
}

/*----------------------------------------------------------
    # Masonry
--------------------------------Lioit.com------------------*/

function init_masonry(){
    (function($){
    
        $(".masonry").imagesLoaded(function(){
            $(".masonry").masonry();
        });
        
    })(jQuery);
}
/*----------------------------------------------------------
    # Masonry Blog
--------------------------------Lioit.com------------------*/
jQuery(document).ready(function() {
                                
                    
    jQuery('.masonry-blog').isotope({
        layoutMode: 'fitRows',
        itemSelector: '.grid-col'
});

/*----------------------------------------------------------
    # Content Height
--------------------------------Lioit.com------------------*/
    function contentHeight() {

        var windowHeight = jQuery(window).height();
        var footerHeight = jQuery('#footer').height();

        jQuery('#content').css('min-height', windowHeight - footerHeight - 150);

    }

    contentHeight();
    
                        
                    
    jQuery(function (){
        var get_height = jQuery( '.magzine-content' ).height(),
        apply_to   = jQuery( '.sidebar' );
        
        apply_to.height( get_height );
    });
    

                                    
}); //ready





/*----------------------------------------------------------
    # coming-soon
--------------------------------Lioit.com------------------*/
    
jQuery(document).ready(function () {
        jQuery('.coming-soon').each(function(){
            var currCountDown=jQuery(this);
            var $years   = parseInt(currCountDown.data('years'));
            var $months  = parseInt(currCountDown.data('months'));
            var $days    = parseInt(currCountDown.data('days'));
            var $hours   = parseInt(currCountDown.data('hours'));
            var $minutes = parseInt(currCountDown.data('minutes'));
            var $seconds = parseInt(currCountDown.data('seconds'));
            var twCountInt=setInterval(function(){
                var $endDate = new Date($years, $months, $days, $hours, $minutes, $seconds, 00);
                var $thisDate  = new Date();
                $thisDate  = new Date($thisDate.getFullYear(), $thisDate.getMonth() + 1, $thisDate.getDate(), $thisDate.getHours(), $thisDate.getMinutes(), $thisDate.getSeconds(), 00, 00);
    
                var $daysLeft    = parseInt(($endDate-$thisDate)/86400000);
                var $hoursLeft   = parseInt(($endDate-$thisDate)/3600000);
                var $minutsLeft  = parseInt(($endDate-$thisDate)/60000);
                var $secondsLeft = parseInt(($endDate-$thisDate)/1000);
    
                var $prSeconds = $minutsLeft*60;
                $prSeconds = $secondsLeft-$prSeconds;
    
                var $prMinutes = $hoursLeft*60;
                var $prMinutes = $minutsLeft-$prMinutes;
    
                var $prHours = $daysLeft*24;
                $prHours = ($hoursLeft-$prHours) < 0 ? 0 : $hoursLeft-$prHours;
    
                var $prDays = $daysLeft;
    
                jQuery('>.days>.count'   ,currCountDown).text($prDays);
                jQuery('>.hours>.count'  ,currCountDown).text($prHours);
                jQuery('>.minutes>.count',currCountDown).text($prMinutes);
                jQuery('>.seconds>.count',currCountDown).text($prSeconds);
                if($thisDate>=$endDate){clearInterval(twCountInt);}
            },1000);
        });
});


  
