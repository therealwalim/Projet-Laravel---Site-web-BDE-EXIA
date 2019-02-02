
  @extends('layouts.app')
  @section('content')
  <!-- Our content -->
  <div class="container">
      
      <h2 class="filter" align="center"><br>Ajouter Votre Idee</h2>

      <form method="post" action="{{ route('idee.update',[$evenement->id]) }}">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                    <label for="nom">{{ __('Nom de evenement') }} :</label>
 
                        <input id="nom" value="evenement" type="text" class="form-control" name="nom"  required>

                </div>

                <div class="form-group">
                        <label for="description">{{ __('Description') }} :</label>
    
                            <input value="{{$evenement->nom }}" id="description" type="text" class="form-control" name="description"  required>
                            
                    </div>
                <div class="form-group">
                        <label for="date">{{ __('Date') }} :</label>
    
                            <input id="date" type="date" class="form-control" name="date"  required>
    
                    </div>

                <div class="form-group">
                            <label for="Lieux">{{ __('Lieux') }} :</label>
        
                                <input id="Lieux" type="text" class="form-control" name="Lieux"  required>
        
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