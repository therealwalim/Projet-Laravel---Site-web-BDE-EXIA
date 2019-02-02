


<div id="load" style="position: relative;    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;">
@foreach($produit as $produits)
    <div class="col-md-4 col-xs-12">
                          <div class="card" style="width: 18rem;">
                          <img src="images/produit/{{$produits->image}}" class="card-img-top" alt="...">
                          <div class="card-body">
                          <h5 class="card-title"> {{$produits-> nom}} </h5>
                          <p class="card-text"> {{$produits-> description}} </p>
                          
                          <h6> {{$produits -> prix}} $</h6><button  class="aime btn btn-primary" type="button" data-evenement_id={{ $produits->id }}>Acheter </button>

                            </div>
                          </div>
                      </div>
@endforeach
</div>
{{ $produit->links() }}