/**
 * Created by Tim on 4/27/2016.
 */

$(document).ready(function(){

    // Enable NiceScroll
    $('html').niceScroll({zindex: 2000});

    // Variables
    var windowWidth                 = $(window).width();
    var windowHeight                = $(window).height();

    var singlePortfolioContainer    = $('#single-portfolio-container');
    var portfolioContainer          = $('.portfolio-container');
    var skillsContainer             = $('#skills-container');
    var contactContainer            = $('#contact-container');
    var scrollableContainer         = $('.scrollable-container');
    var scrollableItem              = $('.scrollable-item');
    var portfolioItem               = $('.portfolio-item');
    var portfolioItemOpen           = $('.portfolio-item-open');

    var itemWidth;
    var itemCount                   = scrollableContainer.children().length;

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Set Dimensions Function.
     |-----------------------------------------------------------------------------------------------------------------------
     */
    function setDimensions(){
        // Containers
        var containerWidth = windowWidth - 60;

        singlePortfolioContainer.width(containerWidth);
        skillsContainer.width(containerWidth);
        contactContainer.width(containerWidth);

        portfolioContainer.height(windowHeight);


        // Inside the container
        $('.item-head').height(windowHeight);
        $('.single-item-head').height(windowHeight);
        $('.portfolio-item-head').height(windowHeight);

    }
    setDimensions();

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Set Portfolio Function.
     |-----------------------------------------------------------------------------------------------------------------------
     */
    function setPortfolio(){
        // Determine the itemWidth
        itemWidth = portfolioContainer.width() / 3;

        // Set the scrollableContainer
        scrollableContainer.css('width', itemWidth * itemCount);

        // Set niceScroll on the portfolioContainer
        //portfolioContainer.niceScroll({zindex: 2000});

        // Set the portfolioItem
        scrollableItem.css('width', itemWidth);

        var i = 0;
        portfolioContainer.find(scrollableItem).each(function(){
            $(this).css('left', i * itemWidth);
            i++;
        });
    }
    setPortfolio();

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Set Single Portfolio Function.
     |-----------------------------------------------------------------------------------------------------------------------
     */
    function setSinglePortfolio(){
        singlePortfolioContainer.find('.intro-section').stop().fadeIn();
        singlePortfolioContainer.find('.intro-title').addClass('fadeInDown');
        singlePortfolioContainer.find('.divider').addClass('fadeIn');
        singlePortfolioContainer.find('.category').addClass('fadeInUp');
        singlePortfolioContainer.find('.site-link').addClass('fadeInUp');
        singlePortfolioContainer.find('.scroll-case').addClass('fadeInUp');
        singlePortfolioContainer.find('.close-project').addClass('fadeInUp');
    }
    setSinglePortfolio();


    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Portfolio Hover Function
     |-----------------------------------------------------------------------------------------------------------------------
     */
    portfolioItem.hover(function() {
        portfolioItem.not(this).each(function () {
            $(this).find('.intro-title').removeClass('fadeInDown');
            $(this).find('.divider').removeClass('fadeIn');
            $(this).find('.category').removeClass('fadeInUp');
            $(this).find('.intro-title').removeClass('fadeInUp');
            $(this).find('.intro-section').stop().fadeOut();

            $(this).find('.overlay').addClass('overlay-hide');
        });

        $(this).find('.overlay').removeClass('overlay-hide');

        $(this).find('.intro-section').stop().fadeIn();
        $(this).find('.intro-title').addClass('fadeInDown');
        $(this).find('.divider').addClass('fadeIn');
        $(this).find('.category').addClass('fadeInUp');
        $(this).find('.view-case').addClass('fadeInUp');
    });

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   Scroll Case Click Function
     |-----------------------------------------------------------------------------------------------------------------------
     */
    $('.scroll-case').click(function(){
        $('html, body').animate({
            scrollTop: $(".single-item-case").offset().top
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
        if ($(this).scrollTop() > (windowHeight -50)) {
            $scroll_top.removeClass('fadeOutDown');
            $scroll_top.addClass('fadeInDown');
            $scroll_top.show();
        } else {
            $scroll_top.removeClass('fadeInDown');
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
        $('.main-menu').toggleClass('main-menu-open');

        // Add the class to the menu icon
        $(this).toggleClass('open');
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
});
