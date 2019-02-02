var postId = 0;
var postBodyElement = null;

var user_status = $(this).attr('data-user_status');


$(".aime").on('click', function() {

    var like_s = $(this).attr('data-like');
    var evenement_id = $(this).attr('data-evenement_id');

    $.ajax({
        type: 'POST',
        url: urlLike,
        data: {like_s: like_s, evenement_id:evenement_id, Type_obj:Type_obj, _token: token},

        success: function(data){
            if(data.is_like == 1){
            $('*[data-evenement_id="'+ evenement_id +'"]').removeClass('secondry').addClass('like');
            var cur_like = $('*[data-evenement_id="'+ evenement_id +'"]').find('.like_count').text();
            var new_like = parseInt(cur_like)+1;
            $('*[data-evenement_id="'+ evenement_id +'"]').find('.like_count').text(new_like);
        }
            if(data.is_like == 0){
            $('*[data-evenement_id="'+ evenement_id +'"]').removeClass('like').addClass('secondry');
            
            var cur_like = $('*[data-evenement_id="'+ evenement_id +'"]').find('.like_count').text();
            var new_like = parseInt(cur_like)-1;
            $('*[data-evenement_id="'+ evenement_id +'"]').find('.like_count').text(new_like);
            }
        }
    });

});
$(".inscription").on('click', function() {

    var evenement_id = $(this).attr('data-evenement_id');

    $.ajax({
        type: 'POST',
        url: urlInscription,
        data: {evenement_id:evenement_id, _token: token},

        success: function(data){

            if(data.is_sub == 1){
                $('*[data-evenement_id="'+ evenement_id +'"]').removeClass('secondry').addClass('like');
                var cur_like = $('*[data-evenement_id="'+ evenement_id +'"]').find('.sub_count').text();
                var new_like = parseInt(cur_like)+1;
                $('*[data-evenement_id="'+ evenement_id +'"]').find('.sub_count').text(new_like);
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Vous etes inscrit',
                    showConfirmButton: false,
                    timer: 1000})
            }
                if(data.is_sub == 0){
                $('*[data-evenement_id="'+ evenement_id +'"]').removeClass('like').addClass('secondry');
                
                var cur_like = $('*[data-evenement_id="'+ evenement_id +'"]').find('.sub_count').text();
                var new_like = parseInt(cur_like)-1;
                $('*[data-evenement_id="'+ evenement_id +'"]').find('.sub_count').text(new_like);
    
                Swal.fire({
                    type: 'error',
                    text: 'Désinscription!',
                    timer: 800
                  })

                }


            }
        }
    );


});


$('.myButton').click(function(){

    var evenement_id = $(this).attr('data-evenement_ids');

window.location.href='/evenement/'+ evenement_id;
})

$(".del").on('click', function() {

    
    var evenement_id = $(this).attr('data-evenement_id');
    var type_object = $(this).attr('data-type_object');
    
$.ajax({
    type: 'POST',
    url: delVote,
    data: {evenement_id:evenement_id,type_object:type_object, _token: token},

    success: function(data){
        alert(type_object);
    }
});
});

$(".delc").on('click', function() {

    var evenement_id = $(this).attr('data-evenement_id');

$.ajax({
    type: 'POST',
    url: delCom,
    data: {evenement_id:evenement_id, _token: token},

    success: function(data){
        
        Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Commentaire signaler',
                    showConfirmButton: false,
                    timer: 1100})
    }
});
setTimeout(function(){
    location.reload(true);
},1300);

});


$(".delp").on('click', function() {

    var evenement_id = $(this).attr('data-evenement_id');

$.ajax({
    type: 'POST',
    url: delp,
    data: {evenement_id:evenement_id, _token: token},

    success: function(data){
        
        Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Photosignaler',
                    showConfirmButton: false,
                    timer: 1100})
    }
});
setTimeout(function(){
    location.reload(true);
},1300);

});

