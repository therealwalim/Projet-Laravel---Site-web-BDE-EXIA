var postId = 0;
var postBodyElement = null;


$(".vote").on('click', function() {

    var evenement_id = $(this).attr('data-evenement_id');

$.ajax({
    type: 'POST',
    url: urlVote,
    data: {evenement_id:evenement_id, _token: token},

    success: function(data){
        if(data.is_vote == 1){
        $('*[data-evenement_id="'+ evenement_id +'"]').removeClass('btn-info').addClass('like');
        var cur_like = $('*[data-evenement_id="'+ evenement_id +'"]').find('.vote_count').text();
        var new_like = parseInt(cur_like)+1;
        $('*[data-evenement_id="'+ evenement_id +'"]').find('.vote_count').text(new_like);
    }
        if(data.is_vote == 0){
        $('*[data-evenement_id="'+ evenement_id +'"]').removeClass('like').addClass('btn-info');
        
        var cur_like = $('*[data-evenement_id="'+ evenement_id +'"]').find('.vote_count').text();
        var new_like = parseInt(cur_like)-1;
        $('*[data-evenement_id="'+ evenement_id +'"]').find('.vote_count').text(new_like);

        }
    }
});

});

$(".del").on('click', function() {

    var evenement_id = $(this).attr('data-evenement_id');

$.ajax({
    type: 'POST',
    url: delVote,
    data: {evenement_id:evenement_id, _token: token},

    success: function(data){
         
    }
});
location.reload(true);
});



