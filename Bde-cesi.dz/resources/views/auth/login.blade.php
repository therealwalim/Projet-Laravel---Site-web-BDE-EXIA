@extends('layouts.app')

@section('content')
<div class="fluid-container">
		<div class="row">
			<div class="col-6">
				<img src="resources/assets/images/img-cnx.svg">
			</div>

			<div class="col-6">
				<div class="Inscription">
					<h3>Connection</h3>
					<div class="form">
						<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group">
										<label for="email">{{ __('E-Mail Address') }}</label>


												<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

												@if ($errors->has('email'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('email') }}</strong>
														</span>
												@endif
										
								</div>

						<div class="form-group">
								<label for="password" >{{ __('Password') }}</label>

								
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

										@if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('password') }}</strong>
												</span>
										@endif
								
						</div>

						<div class="form-group">
								<div class="col-md-6 offset-md-4">
										<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember">
														{{ __('Remember Me') }}
												</label>
										</div>
								</div>
						</div>

						<div class="form-group">
								<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-warning" style="margin-top:20px;color: white;"">
												{{ __('Login') }}
										</button>

										@if (Route::has('password.request'))
												<a class="btn btn-link" href="{{ route('password.request') }}">
														{{ __('Mot de passe oublié ??') }}
												</a>
										@endif
								</div>
						</div>
				</form>
					</div>
				</div>
			</div>
		</div>
	</div>@endsection
