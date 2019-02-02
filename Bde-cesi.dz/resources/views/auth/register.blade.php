@extends('layouts.app')

@section('content')
<div class="fluid-container">
		<div class="row">
			<div class="col-6">
				<img src="resources/assets/images/img-cnx.svg">
			</div>

			<div class="col-6">
				<div class="Inscription">
					<h3>Inscription</h3>
					<div class="form">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group">
									<label for="nom">Nom:</label>

											<input id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" placeholder="Entrer votre nom" required autofocus>

											@if ($errors->has('nom'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('nom') }}</strong>
													</span>
											@endif
									
							</div>

							<div class="form-group">
									<label for="prenom">Prenom:</label>
									
											<input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ old('prenom') }}" placeholder="Entrer votre prenom" required autofocus>

											@if ($errors->has('prenom'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('prenom') }}</strong>
													</span>
											@endif
									
							</div>

							<div class="form-group">
									<label for="email">Email:</label>


											<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Saisissez un email" required>

											@if ($errors->has('email'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('email') }}</strong>
													</span>
											@endif

							</div>

							<div class="form-group">
									<label for="password">{{ __('Password') }}:</label>


											<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Entrer un mot de passe" required>

											@if ($errors->has('password'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif

							</div>

							<div class="form-group">
									<label for="password-confirm">Confirmer le mot de passe : </label>


											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ressaisir le mot de passe" required>
							</div>

							<div class="checkbox" style="margin-top: 20px;">
											<label><input type="checkbox" name="remember" required autofocus> J'accepte les</label>
											<a href=""><u>CGU</u></a>
												</div>
												
							<div class="form-group ">
									
											<button type="submit" class="btn btn-warning" style="margin-top:17px;margin-bottom: 20px;color: white;">
													{{ __('S\'inscrire') }}
											</button>
									
							</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>@endsection
