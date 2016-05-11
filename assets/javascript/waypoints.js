/**
 * Created by Tim on 5/7/2016.
 */

$(document).ready(function(){

    $('.single-item-case').find('.section-item').each(function(element){

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

});


