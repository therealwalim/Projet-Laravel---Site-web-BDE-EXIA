<script>
$(document).ready(function(){

  $("#Valider").click(function(){
    var cat = $("#sel1").val();
    var price = $('#sel2').val();
    var search= $('#sel3').val();

    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/produitsCat')}}',
      data: 'cat_id=' + cat + '&price=' + price + '&search=' + search ,
      success:function(data){
        console.log(data);
        $(".produit").html(data);
      }
    });
  });

$('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var cat = $("#sel1").val();
        var price = $('#sel2').val();
        var search= $('#sel3').val();

        
        var url = $(this).attr('href');  

        getproduit(url);
        window.history.pushState("", "", url);
    });

    function getproduit(url) {
      var cat = $("#sel1").val();
      var price = $('#sel2').val();
      var search= $('#sel3').val();
        $.ajax({
            url : url,
        data: 'cat_id=' + cat + '&price=' + price + '&search=' + search ,
        }).done(function (data) {
            $('.produit').html(data);  
        }).fail(function () {
            alert('produits could not be loaded.');
        });
    }

$("#sel3").keyup(function(){

  var query = $(this).val();
  if (query !=""){

    var _token = $('input[name="_token"]').val();
    $.ajax({
      
      url : '{{url('/fetch')}}',
      method : "POST",
      data : {query:query, _token:_token},
      success:function(data)
      {
        $("#produitList").fadeIn();
        $("#produitList").html(data);
        console.log(data);

      }
    })
  }
});

$(document).on('click', 'li',function(){

   $('#sel3').val($(this).text());
   $('#produitList').fadeOut();

});

});



</script>
