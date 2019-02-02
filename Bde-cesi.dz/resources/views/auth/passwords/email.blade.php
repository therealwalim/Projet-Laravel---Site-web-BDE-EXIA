@extends('layouts.app')

@section('content')
<div class="fluid-container">
		<div class="row">
			<div class="col-6">
				<img src="resources/assets/images/img-cnx.svg">
			</div>

			<div class="col-6">
				<div class="Inscription">
					<h3><br><br>Recuperation<br><br><br></h3>
					<div class="form">
						<form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }} :</label>
    
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning" style="margin-top:20px;color: white;">
                                    {{ __('Envoyer le lien de recuperation') }}
                                </button>
                            </div>
                        </div>
                    </form>
					</div>
				</div>
			</div>
		</div>
    </div>

</div>
    
    
    @endsection
