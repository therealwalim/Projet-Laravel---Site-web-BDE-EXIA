var postId = 0;
var postBodyElement = null;

var user_status = $(this).attr('data-user_status');


$(".aime").on('click', function() {








    

    var like_s = $(this).attr('data-like');
    var produit_id = $(this).attr('data-evenement_id');
    $.ajax({
        type: 'POST',
        url: urlAdd,
        data: {produit_id:produit_id, _token: token},

        success: function(data){
            Swal.fire({
                position: 'center',
                type: 'success',
                title: 'Produit ajouter a votre panier',
                showConfirmButton: false,
                timer: 1500
              })
        }
    });

});



