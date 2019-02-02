@extends('layouts.app')
	@section('content')

	@section('title', 'Evenments')

	<!-- Our content -->
	<div class="container">
		
        <h2 class="filter" align="center">Events</h2>
        @can('isSpecial' , Auth::user())

		<button class="btn btn-rsz participe" onclick="window.location.href='evenement/create'" ><i class="fas fa-plus-circle"></i>   Ajouter </button>
        @endcan
		<div class="row spc">

        @foreach ($evenements as $evenements)
        <div class="col-md-6 col-xs-12 spacer">
                                <div class="card bg-dark text-white">
                                <img src="images/evenement/{{$evenements -> image}}" class="card-img" alt="...">
                                                    
                                <div class="card-img-overlay" style="background:rgba(0,0,0,0.6)">
                                <h5 class="card-title"> <a href="/evenement/{{$evenements -> id}}">  {{$evenements -> nom}} </a></h5>
                                <p class="card-text"> {{$evenements -> description}} </p>
                                <p class="card-text"> {{$evenements -> date}} </p>
@php
	$like_counter =0;
	$dislike_counter =0;
	$like_status = "secondry";
	$dislike_status = "secondry";

    $sub_counter =0;
    $sub_status = "secondry";
	@endphp

	@foreach ($evenements->jaimes->where('Type_obj', 1) as $jaime) 

	@php
	if($jaime->like == 1){
		$like_counter++;
	}
	if($jaime->like == 0){
		$dislike_counter++;
	}
	if (Auth::check())
	{
	if($jaime->like == 1 && $jaime->user_id == Auth::user()->id){
	$like_status = "like";
	}
	if($jaime->like == 0 && $jaime->user_id == Auth::user()->id){
	$dislike_status = "like";
	}}
	@endphp
	@endforeach


	@foreach ($evenements->inscriptions as $inscription)
	@php
    $sub_counter++;
	if (Auth::check())
	{ 
	if($inscription->user_id == Auth::user()->id){
    $sub_status = "like";
	}}
	@endphp
	@endforeach

	@if( $status == "pasee")
	<button  class="aime btn btn-rsz {{$like_status}}" data-like={{ $like_status }} data-evenement_id={{ $evenements->id }}><i class="far fa-heart"></i>  J'aime  <span class='like_count'>{{$like_counter}}</span> </button>
	<button class="myButton btn btn-rsz participe voir" data-evenement_ids={{ $evenements->id }}><i class="fas fa-arrow-alt-circle-up"></i>   Afficher </button>
    @elseif( $status == "avenir")

	<button  class="inscription btn btn-rsz {{$sub_status}}" data-evenement_id={{ $evenements->id }}><i class="fas fa-plus-circle"></i> Je participe <span class='sub_count'>{{$sub_counter}}  </span> </button>
	<button class="myButton btn btn-warning voir" data-evenement_ids={{ $evenements->id }}><i class="fas fa-info-circle" ></i>  En savoir plus </button>
	@endif
    @can('isSpecial' , Auth::user())
	<button class=" del btn btn-danger" data-={{ $sub_status }} data-evenement_id={{ $evenements->id }} data-type_object="evenment"><i class="fas fa-trash-alt"></i></button>
    @endcan
 </div>
       </div>
			</div>
                @endforeach	
                

		

</div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</div>

	<!-- Script bootstrap -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<script src="{{ URL::to('/js/Like.js') }}"></script>
    <script>
        var token = '{{ Session::token() }}';
		var urlLike = '{{ route('like') }}';
		var urlInscription = '{{ route('enregistrement') }}';
		var delVote = '{{ route('delvote') }}';

		var Type_obj = 1;
    </script>


@endsection