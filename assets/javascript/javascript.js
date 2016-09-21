/**
 * Created by Tim on 4/27/2016.
 */

$(document).ready(function(){

    // Enable NiceScroll
    //$('html').niceScroll({zindex: 9000});

    // Variables
    var windowWidth                 = $(window).width();
    var windowHeight                = $(window).height();

    /*
     |-------------------------------------------------------------------------------------------------------------------
     |   Set Mobile Device Classes.
     |-------------------------------------------------------------------------------------------------------------------
     */
    var deviceAgent = navigator.userAgent.toLowerCase();
    var html        = $('html');

    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        html.addClass('ios');
        html.addClass('mobile');
    }

    if (deviceAgent.match(/(Windows Phone)/i)) {
        html.addClass('windows');
        html.addClass('mobile');
    }

    if (deviceAgent.match(/(iemobile)/i)) {
        html.addClass('iemobile');
        html.addClass('mobile');
    }

    if (deviceAgent.match(/android/)) {
        html.addClass('android');
        html.addClass('mobile');
    }

    if (deviceAgent.match(/blackberry/)) {
        html.addClass('blackberry');
        html.addClass('mobile');
    }

    if (deviceAgent.match(/(symbianos|^sonyericsson|^nokia|^samsung|^lg)/)) {
        html.addClass('mobile');
    }

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Set Portfolio height
     |-----------------------------------------------------------------------------------------------------------------------
     */
    $('#single-item-header').height(windowHeight);

    $(document).resize(function(){
        var windowHeight = $(window).height();

        $('#single-item-header').height(windowHeight);
    });


    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Portfolio Item Hover
     |-----------------------------------------------------------------------------------------------------------------------
     */
    if(!$('html').hasClass('mobile')){
        var portfolioItem = $('.portfolio-item');

        portfolioItem.find('.intro-section-portfolio').hide();
        portfolioItem.find('.overlay').addClass('overlay-hide');

        portfolioItem.hover(function() {
            portfolioItem.not(this).each(function () {
                $(this).find('.intro-section-portfolio').stop().fadeOut();

                $(this).find('.overlay').addClass('overlay-hide');
            });

            $(this).find('.overlay').removeClass('overlay-hide');

            $(this).find('.intro-section-portfolio').stop().fadeIn();
            $(this).find('.intro-menu').addClass('fadeInUp');
            $(this).find('.title').addClass('fadeInUp');
            $(this).find('.divider').addClass('fadeInUp');

            $(this).find('.category').addClass('fadeInUp');
        }, function(){
            portfolioItem.find('.intro-section-portfolio').stop().fadeOut();
            portfolioItem.find('.overlay').addClass('overlay-hide');
        });
    }

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   View Case Click Function
     |-----------------------------------------------------------------------------------------------------------------------
     */
    $('.scroll-case').click(function(){
        $('html, body').animate({
            scrollTop: $("#case-section").offset().top - 60
        }, 500);

        return false;
    });

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Go To Top
     |-----------------------------------------------------------------------------------------------------------------------
     */
    var $scroll_top = $('#go-to-top');
    $scroll_top.hide();

    // Scroll to top fadeIn/fadeOut
    $(window).scroll(function(){
        if ($(this).scrollTop() > (windowHeight / 2)) {
            $scroll_top.removeClass('fadeOutDown');
            $scroll_top.addClass('fadeInUp');
            $scroll_top.show();
        } else {
            $scroll_top.removeClass('fadeInUp');
            $scroll_top.addClass('fadeOutDown');
        }
    });

    // Scroll to top
    $scroll_top.click(function(){
        $("html, body").animate({ scrollTop: 0 },600);
        return false;
    });

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Open The Menu
     |-----------------------------------------------------------------------------------------------------------------------
     */
    $('.menu-icon').click(function(){
        // Add the class to the mobile hoofdmenu
        $('.menu-container').toggleClass('menu-container-open');

        // Add the class to the menu icon
        $(this).toggleClass('menu-icon-open');
    });

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Add Icons To Footer Menu
     |-----------------------------------------------------------------------------------------------------------------------
     */
    $('footer').find('.widget_nav_menu').each(function(){
        $(this).find('a').prepend('<i class="icon icon-angle-right"></i>');
    });

    /*
     |-------------------------------------------------------------------------------------------------------------------
     |   Call Back Function
     |-------------------------------------------------------------------------------------------------------------------
     */
    var $form_callback      = $('.call-back-form');
    var $button_callback    = $('.button-callback');
    var $inner_callback     = $('.call-back-inner');

    $form_callback.hide();
    $button_callback.hide();

    /*
     |----------------------------------------------------------------
     |   Show the callback form.
     |----------------------------------------------------------------
     */
    $('#call-back-activate').click(function(){
        $('#call-back').find('.col-md-12').addClass('call-back-open');

        // Start the animation to slide the intro out
        $inner_callback.addClass('bounceOutRight');

        setTimeout(function(){
            // After the intro animation is stopped hide and remove the element's class
            $inner_callback.hide();
            $inner_callback.removeClass('bounceOutRight');

            // Show the form and add the animation class
            $form_callback.show();
            $form_callback.addClass('bounceInLeft');
            $button_callback.show();
            $button_callback.addClass('bounceInRight');
        }, 300);

        return false;
    });

    /*
     |----------------------------------------------------------------
     |   Hide the callback form.
     |----------------------------------------------------------------
     */
    $button_callback.click(function(){
        // Remove the animation class from the form
        $form_callback.removeClass('bounceInLeft');
        $button_callback.removeClass('bounceInRight');

        // Add the new animation class to the form
        $form_callback.addClass('bounceOutLeft');
        $button_callback.addClass('bounceOutRight');

        setTimeout(function(){
            $('#call-back').find('.col-md-12').removeClass('call-back-open');

            // After the intro animation is stopped hide and remove the element's class
            $form_callback.hide();
            $form_callback.removeClass('bounceOutLeft');
            $button_callback.hide();
            $button_callback.removeClass('bounceOutRight');

            // Add the new animation class to the element and show it
            $inner_callback.show();
            $inner_callback.addClass('bounceInRight');
        }, 300);

        return false;
    });

    $('.no-link').click(function(){
        return false;
    });
});
