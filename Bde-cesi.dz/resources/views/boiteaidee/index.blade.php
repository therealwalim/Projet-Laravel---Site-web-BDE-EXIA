<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/home.css">
	<meta charset="utf-8">
	<title>Boite à idées</title>
</head>
<body>
	<!-- NAV -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: black !important;>
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand" href="#">Logo</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                          <div class="navbar-nav">
                            <a class="nav-item nav-link" href="/evenement">Event <span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link" href="/produits">Boutique</a>
                            <a class="nav-item nav-link" href="/idee">Boite à idées</a>
                            <a class="nav-item nav-link" href="/evenement/create">Événement du mois</a>
                          </div>
                          </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connection ') }}</a>
                            </li>
                            @if (Route::has('register'))
                                </li>
                            @endif
                        @else
                        <a class="nav-item nav-link" style="margin-right: 5px" href="#"><i class="fas fa-shopping-cart"></i></a>
                        <a class="nav-item nav-link" style="margin-right: 5px" href="#"><i class="fas fa-bell"></i></a>

                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }} <span class="caret"></span>
                                </a>        

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

	<!-- Our content -->
	<div id="idees" class="container">
		<h2 class="filter" align="center" style="margin-bottom: 10px;">Boite à idées</h2>
		@can('isBde' , Auth::user())
		<button class="btn btn-info" onclick="window.location.href='idee/create'" style="margin-bottom: 10px;"><i class="fas fa-plus-circle"></i>   Ajouter une nouvelle idée</button>
		@endcan
		<div class="row">
			@php
			$id = 0;
			@endphp
				@foreach ($idees as $idee)
				@php
				$vote_counter = 0;
				$vote_status = "btn-info";
				@endphp

				@foreach ($idee->votes as $vote)
				@php
				
				$vote_counter++;
				if (Auth::check())
				{
				if($vote->user_id == Auth::user()->id){
				$vote_status = "like";
				}}
				@endphp
				@endforeach
				@php
				$id++;
				@endphp
			<div class="col-md-6 col-xs-12">
				<div class="card spc-crd">
					<img class="card-img-top" src="http://www.dlpwelcome.com/wp-content/uploads/2014/05/P1320501.jpg" alt="Card image cap">
						<div class="card-body">
						    <h5 class="card-title"> {{$idee -> nom}} </h5>
						    <p class="card-text"> {{$idee -> description}} </p>
						    <button id="{{$id}}" class=" vote btn {{$vote_status}}" data-botonid={{$id}}  data-={{ $vote_status }} data-evenement_id={{ $idee->id }}><i class="fas fa-thumbs-up"> <span class='vote_count'>{{$vote_counter}}</span></i></button>
							
							@can('isSpecial' , Auth::user())
							<button class=" del btn btn-danger" data-={{ $vote_status }} data-evenement_id={{ $idee->id }}><i class="fas fa-trash-alt"></i></button>
							<a href="/evenement/{{ $idee->id }}/edit" class=" valider btn btn-danger" data-={{ $vote_status }} data-evenement_id={{ $idee->id }}><i class="fas fa-check"></i></a>
							@endcan
							<p style="margin-top: 10px;"><b></b></p>
						</div>
				</div>
			</div>
				@endforeach
			<nav aria-label="...">
				  <ul class="pagination">
				    <li class="page-item disabled">
				      <span class="page-link">Previous</span>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item active">
				      <span class="page-link">
				        2
				        <span class="sr-only">(current)</span>
				      </span>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#">Next</a>
				    </li>
				  </ul>
			</nav>
		</div>
	</div>
		

	<!-- Script bootstrap -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="{{ URL::to('/js/Vote.js') }}"></script>

    <script>
			var token = '{{ Session::token() }}';
			var urlVote = '{{ route('vote') }}';
			var delVote = '{{ route('delvote') }}';

		</script>

	
</body>
<footer class="container-fluid">
		<a href="">Mentions légales</a>
		<a href="">BDE CESI 2019</a>
</footer>
</html>