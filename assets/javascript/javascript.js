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


    $('.menu-icon').click(function(){
        // Add the class to the mobile hoofdmenu
        $('.main-menu').toggleClass('main-menu-open');

        // Add the class to the menu icon
        $(this).toggleClass('open');
    });

});
