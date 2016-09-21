/**
 * Created by Tim on 5/7/2016.
 */

$(document).ready(function(){

    if(!$('html').hasClass('mobile')){
        $('#case-section').find('.section-item').each(function(element){

            var id = $(this).attr('id');

            new Waypoint({
                element: $('#'+id),
                offset: '70%',
                handler: function(direction){
                    $('#'+id).addClass('fadeInUp');
                    $('#'+id).css('opacity', 1);
                }
            })
        });
    }

    $('.skills-section').find('.skill').each(function(element){

        var id = $(this).attr('id');
        var width = $(this).attr('data-completion');


        new Waypoint({
            element: $('#'+id),
            offset: '70%',
            handler: function(direction){
                $('#'+id).find('.fill').css('width', width);
            }
        })
    });

    /*
     |-------------------------------------------------------------------------------------------------------------------
     |   CountUp Waypoint Function
     |-------------------------------------------------------------------------------------------------------------------
     */
    var waypoint = new Waypoint({
        element: document.getElementById('facts'),
        handler: function() {
            var time = $('.timer');

            time.countTo('start');
            time.removeClass('timer');
        },
        offset: 500
    });
});


