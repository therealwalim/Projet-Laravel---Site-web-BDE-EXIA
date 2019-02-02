
  @extends('layouts.app')

  @section('content')
  @include('produit.ourJs')
  
  
    <div class="container">
        <h2 align="center" class="spc">Boutique</h2>
        <h5 style="margin-bottom: 20px;">Top 3 des ventes</h4>
        <div class="row">
  
            @php

            @endphp


          @foreach ($TopProduit as $TopProduit)
          <div class="col-md-4 col-xs-12">
                        <div class="card" style="width: 18rem;">
                        <img src="images/produit/{{$TopProduit->image}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"> {{$TopProduit -> nom}} </h5>
                        <p class="card-text"> {{$TopProduit -> description}} </p>
                        
                        <h6> {{$TopProduit -> prix}} $ </h6><button  class="aime btn btn-primary" type="button" data-evenement_id={{ $TopProduit->id }}>Acheter </button>

                          </div>
                        </div>
                    </div>
                    
            @endforeach	
          </div>
        <h5 style="margin-top: 40px;">Produits</h5>
        <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div id="custom-search-input">
                    <div class="form-group">
  
                        <input type="text" id= "sel3" class="form-control input-md" placeholder="Recherche" />
                        <div id= "produitList"></div>
                    </div>
                    {{ csrf_field() }}
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="form-group">
                      <select class="form-control" id="sel1">
                        <option value="">Select a Category</option>
                        @foreach(App\categorie::all() as $cList)
                        <option class="option" value="{{$cList->id}}">{{$cList->nom}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
  
                <div class="col-md-2 col-xs-12">
                    <div class="form-group">
                      <select class="form-control" id="sel2">
                        <option value="">Select Price Range</option>
                        <option value="0-100">0-100</option>
                        <option value="100-300">100-300</option>
                        <option value="300-500">300-500</option>
                        <option value="500-1000">500-1000</option>
                      </select>
                    </div>
                </div>
  
                <div class="col-md-1 col-xs-12">
                    <button type="button" id="Valider" class="btn btn-success">Valider</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
              @if (count($produit) > 0)
                 <section class="produit">
                  @include('produit.load')
                 </section>
              @endif
            </div>
        </div>

         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script src="{{ URL::to('/js/Produit.js') }}"></script>
        <script>
            var token = '{{ Session::token() }}';
            var urlAdd = '{{ route('add') }}';
    
        </script>
  
  
  
  @endsection