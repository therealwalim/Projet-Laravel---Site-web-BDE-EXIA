
  @extends('layouts.app')
	@section('content')

	@section('title', $evenement->nom)

	@php
use App\Photos_evenement;
$Photos = DB::table('photos_evenements')
          ->where('id_evenement',$evenement->id)->where('signal_photo',0)->get();
@endphp

	<!-- Our content -->
	<div class="container">
		
		<h2 class="filter" align="center">{{$evenement -> nom}}</h2>

		<h4 class="filter" align="center">{{$evenement -> date}}</h4>
		<p style="text-align: center;"> {{$evenement -> description}} </p>

		 
		<div class="container">
			<h4>Photos</h4>
			<button class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-circle"></i>   Ajouter une image</button>
			
			@if (Auth::check())
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			 		 <div class="modal-dialog" role="document">
			   		 <div class="modal-content">
			      	<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Ajouter une image</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">

								<form method="post" action="{{ route('ajoutimage') }}" enctype="multipart/form-data">
									@csrf

												<div class="form-group">
																	<label for="image">{{ __('image') }} :</label>
									
																			<input type="file" class="form-control" name="image"  required>
									
															</div>

															<div class="form-group">
																	<label for="image"></label>
									
																			<input type="hidden" class="form-control" name="id_evenement"  value="{{$evenement -> id}}" required>
									
															</div>

									<div class="modal-footer">
											<div class="form-group">
													<div class="col-md-6 offset-md-4">
															<button type="submit" class="btn btn-warning" style="margin-top:20px;color: white;">
																	{{ __('Ajouter') }}
															</button>
													</div>
											</div>
										</div>
							</form>
			
			      </div>
			      
			    </div>
			  </div>
			</div>
			@endif 
			<div class="row" style="margin-top: 10px;">

					@foreach ($Photos as $photo)
					<div class="col-md-6 col-xs-12" style="margin-bottom: 10px;">
					<img src="/images/evenement/{{$photo->path}}" alt="..."  style="width: 60%;hight: 60%;" class="img-thumbnail">
					@can('isSpecial' , Auth::user())
					<button  class="delp btn btn-danger" style="margin-bottom: 30px;" data-evenement_id={{$photo->id}} data-type_object="photo">Signaler <i class="fas fa-flag"></i></button>
						@endcan
				</div>
					@endforeach

				<div class="col-md-6 col-xs-12" style="margin-bottom: 10px;">
					<img src="https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg" alt="..." class="img-thumbnail">
					<button class="btn btn-danger">Signaler  <i class="fas fa-flag"></i></button>
				</div>

				<div class="col-md-6 col-xs-12" style="margin-bottom: 10px;">
					<img src="https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg" alt="..." class="img-thumbnail">
					<button class="btn btn-danger">Signaler  <i class="fas fa-flag"></i></button>
				</div>

				<div class="col-md-6 col-xs-12" style="margin-bottom: 10px;">
					<img src="https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg" alt="..." class="img-thumbnail">
					<button class="btn btn-danger">Signaler  <i class="fas fa-flag"></i></button>
				</div>

				<div class="col-md-6 col-xs-12" style="margin-bottom: 10px;">
					<img src="https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg" alt="..." class="img-thumbnail">
					<button class="btn btn-danger">Signaler  <i class="fas fa-flag"></i></button>
				</div>
			</div>

			<h4 class="spc">Commentaires</h4>
			<form method="post" action="{{ route('commenter',[$evenement->id]) }}">
					@csrf
					<div class="form-group">

					<input placeholder="Joindre la discussion ..." id="nom" type="text" class="form-control" name="contenu"  required autofocus>
					<input type="hidden" name="evenement_id" value="{{$evenement->id}}">

							</div>
			
			<button ype="submit" style="margin-bottom: 30px;" class="row btn btn-info" ><i class="fas fa-comment"></i>   Envoyer le commentaire</button>
		</form>
			@foreach ($evenement->commentaires->where('publie',1) as $commentaire)

			@php
			$like_counter =0;
			$dislike_counter =0;
			$like_status = "secondry";
			$user_status = "deconnecter";

			@endphp
		
			@foreach ($commentaire->jaimes->where('Type_obj', 0) as $jaime) 
		
			@php
			if($jaime->like == 1){
				$like_counter++;
			}

			if (Auth::check())
			{			$user_status = "connecter";

			if($jaime->like == 1 && $jaime->user_id == Auth::user()->id){
			$like_status = "like";
			}
		}
			@endphp
			@endforeach
		
			@php
			$id=$commentaire->id_utilisateur;
			$pseudo_utilisateur = DB::table('users')
			->where('id', $id)->first();
			@endphp

		<div class="row">
				<div class="media">
					<img class="mr-3" src="https://static.licdn.com/scds/common/u/images/themes/katy/ghosts/person/ghost_person_200x200_v1.png" style="height: 75px;width: 75px;" alt="Generic placeholder image">
			  	<div class="media-body">
			    <h5 class="mt-0">{{$pseudo_utilisateur->prenom	}}</h5>
					<p> {{$commentaire -> contenu	}} </p>
					
					<button  class="delc btn btn-danger" style="margin-bottom: 30px;" data-evenement_id={{ $commentaire->id }} data-type_object="commentaire"><i class="fas fa-flag"></i></button>

					<button  style="margin-bottom: 30px;" class="aime btn btn-rsz {{$like_status}}" data-like={{ $like_status }} data-user_status={{ $user_status }} data-evenement_id={{ $commentaire->id }}><i class="far fa-heart"></i>  J'aime  <span class='like_count'>{{$like_counter}}</span> </button>

				</div>

			</div>
			</div>
			@endforeach	

			<div class="modal fade" id="postcomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New comment</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Message:</label>
			            <textarea class="form-control" id="message-text"></textarea>
			          </div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Send comment</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="{{ URL::to('/js/Like.js') }}"></script>
	<script>
			var token = '{{ Session::token() }}';
	var urlLike = '{{ route('likec') }}';
	var urlInscription = '{{ route('enregistrement') }}';
	var delp = '{{ route('delp') }}';

	var delVote = '{{ route('delvote') }}';
	var delCom = '{{ route('delcom') }}';

	var Type_obj = 0;
	</script>






			@endsection