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
    var scrollableContainer         = $('.scrollable-container');
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

        portfolioContainer.height(windowHeight);


        // Inside the container
        $('.item-head').height(windowHeight);
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
        portfolioItem.css('width', itemWidth);

        var i = 0;
        portfolioContainer.find(portfolioItem).each(function(){
            $(this).css('left', i * itemWidth);
            i++;
        });
    }
    setPortfolio();


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
     |   Portfolio Click Function
     |-----------------------------------------------------------------------------------------------------------------------
     */
    portfolioItem.find('.view-case').click(function(){

        var activeItem = $(this).closest(portfolioItem);

        activeItem.addClass('portfolio-item-open');

        activeItem.find('.overlay').removeClass('overlay-hide');

        // Animate to full width
        activeItem.width(portfolioContainer.width());
        scrollableContainer.width(portfolioContainer.width());

        // Each portfolio item that is not this set left to -itemWidth
        portfolioItem.css('left', 0);

        activeItem.find('.site-link').addClass('fadeInUp');
        activeItem.find('.close-project').addClass('fadeInUp');

        return false;
    });

    /*
     |-----------------------------------------------------------------------------------------------------------------------
     |   View Case Click Function
     |-----------------------------------------------------------------------------------------------------------------------
     */
    $('.scroll-down').click(function(){
        alert('click');
        $('html, body').animate({
            scrollTop: $(".item-case").offset().top
        }, 500);

        return false;
    });

    $('.close-project').click(function(){
        portfolioItem.removeClass('portfolio-item-open');
        $('.view-case').removeClass('scroll-down');
        $('.view-case').addClass('open-portfolio-item');

        portfolioItem.css('width', itemWidth);
        var i = 0;
        portfolioContainer.find(portfolioItem).each(function(){
            $(this).css('left', i * itemWidth);
            i++;
        });

        return false;
    });


    $('.menu-icon').click(function(){
        // Add the class to the mobile hoofdmenu
        $('.main-menu').toggleClass('main-menu-open');

        // Add the class to the menu icon
        $(this).toggleClass('open');
    });




//    portfolioItem.click(function(){
//
//        portfolioContainer.addClass('item-open');
//
//        // Set the active class to the clicked element
//        $(this).addClass('active-item');
//
//        // Animate to full width
//        $(this).width(portfolioContainer.width());
//        scrollableContainer.width(portfolioContainer.width());
//
//        // Each portfolio item that is not this set left to -itemWidth
//        portfolioItem.not(this).each(function(){
//            $(this).css('left', -itemWidth)
//        });
//
//        // Fade in the intro and animate
//        $(this).find('.intro-section').fadeIn();
//        $(this).find('.intro-title').addClass('fadeInDown');
//        $(this).find('.divider').addClass('fadeIn');
//        $(this).find('.category').addClass('fadeInUp');
//        $(this).find('.intro-menu-item').addClass('fadeInUp');
//
//    });
//

//
//
//
//    $('.close').click(function(){
//        portfolioItem.removeClass('active-item');
//
//        // Reset the portfolio width
//        //portfolioItem.css('width', itemWidth);
//
//
//        // Fade out the intro and animate
//        //portfolioItem.find('.title').removeClass('fadeInDown');
//        //portfolioItem.find('.divider').removeClass('fadeIn');
//        //portfolioItem.find('.category').removeClass('fadeInUp');
//        //portfolioItem.find('.intro-section').fadeOut();
//
//
//
//        // Set the scrollableContainer
//        //scrollableContainer.css('width', itemWidth * itemCount);
//
//        // Set the portfolio items
//        //var i = 0;
//        //portfolioContainer.find(portfolioItem).each(function(){
//        //    $(this).css('left', i * itemWidth);
//        //    i++;
//        //});
//        //
//        //portfolioContainer.removeClass('item-open');
//    });
//
//
//
//
//
//
//
//
//
//
//
//
//
//

//
//
});
