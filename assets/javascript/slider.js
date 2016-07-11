/**
 * Created by Tim on 7/10/2016.
 */
$(document).ready(function(){

    var slider          = $('#slider-header');
    var ul              = slider.find('.slides-container');
    var slideCount      = ul.children().length;

    var ul_width        = (slideCount * 100) + "%";
    var slide_width     = (100 / slideCount) + "%";

    var slideIndex      = 0;

    /*
    |----------------------------------------------------------------
    |  Slide Function.
    |----------------------------------------------------------------
    */
    function slide(newSlideIndex){

        $('.slide-active').find('.middle-wrap-inner').removeClass('fadeInUp');
        $('.slide-active').find('.middle-wrap-inner').addClass('fadeOutDown');

        setTimeout(function(){
            $('.slide-active').removeClass('slide-active');

            $('li[data-slide-index="'+newSlideIndex+'"]').find('.middle-wrap-inner').removeClass('fadeOutDown');
            $('li[data-slide-index="'+newSlideIndex+'"]').find('.middle-wrap-inner').addClass('fadeInUp');

            $('li[data-slide-index="'+newSlideIndex+'"]').addClass('slide-active');

            slideIndex = newSlideIndex;
        }, 400);
    }

    /*
    |----------------------------------------------------------------
    |  Timer Function
    |----------------------------------------------------------------
    */
    var timer;

    function slide_timer(){
        if(slideIndex <= (slideCount - 2)){
            slide(parseInt(slideIndex) + 1);
        }
        else {
            slide(0);
            slideIndex = 0;
        }
    }
    timer = setInterval(slide_timer, 5000);

    /*
    |----------------------------------------------------------------
    |   Menu Bottom click function.
    |----------------------------------------------------------------
    */
    $('.slides-menu').find('li').click(function(){
        // Get the data slide number
        var slideNumber = $(this).attr('data-slide-menu');
        var activeMenu  = $('.active-menu');

        activeMenu.find('i').removeClass('icon-circle');
        activeMenu.find('i').addClass('icon-circle-empty');

        $(this).find('i').removeClass('icon-circle-empty');
        $(this).find('i').addClass('icon-circle');

        activeMenu.removeClass('active-menu');
        $(this).addClass('active-menu');

        //// Restart the timer
        clearInterval(timer);
        timer = setInterval(slide_timer, 5000);

        // Call the setSlide function
        slide(slideNumber);
    });
});