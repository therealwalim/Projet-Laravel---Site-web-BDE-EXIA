
  @extends('layouts.app')
  @section('content')
  <!-- Our content -->
  <div class="container">
      
      <h2 class="filter" align="center"><br>Ajouter Un Produit</h2>

      <form method="post" action="{{ route('produit.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                    <label for="nom">{{ __('Nom Du Produit') }} :</label>

                        <input id="nom" type="text" class="form-control" name="nom"  required>

                </div>

                <div class="form-group">
                        <label for="description">{{ __('Description') }} :</label>
    
                            <input id="description" type="text" class="form-control" name="description"  required>
    
                    </div>
                <div class="form-group">
                        <label for="prix">{{ __('Prix') }} :</label>
    
                            <input id="prix" type="number" class="form-control" name="prix"  required>
    
                    </div>
                    <div class="form-group">
                            <label for="stock">{{ __('Stock') }} :</label>
        
                                <input id="stock" type="number" class="form-control" name="stock"  required>
        
                        </div>

                    <div class="form-group">
                            <label for="image">{{ __('image') }} :</label>
            
                                <input id="stock" type="file" class="form-control" name="image"  required>
            
                        </div>


            <div class="form-group">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-warning" style="margin-top:20px;color: white;">
                        {{ __('Crée') }}
                    </button>
                </div>
            </div>
        </form>
      
      
  </div>
          @endsection