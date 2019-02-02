<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta charset="utf-8">
	<title>Inscription</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: black !important;">
	  <a class="navbar-brand" href="#">Logo</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link" href="#">Event <span class="sr-only">(current)</span></a>
	      <a class="nav-item nav-link" href="#">Boutique</a>
	      <a class="nav-item nav-link" href="#">Boite à idées</a>
	      <a class="nav-item nav-link" href="#">Inscription</a>
	      <a class="nav-item nav-link" href="#">Connexion</a>
	    </div>
	  </div>
	</nav>

	<div class="fluid-container">
		<div class="row">
			<div class="col-6">
				<img src="assets/images/img-cnx.svg">
			</div>

			<div class="col-6">
				<div class="Inscription">
					<h3>Inscription</h3>
					<div class="form">
					 <form action="/action_page.php">
                        <div >
                            <label for="name" >{{ __('Name') }}</label>
                            
                        <div class="form-group">
                                          <label for="email">Email:</label>
                                          <input type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('name') }}" required autofocus>
                                             @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                         </div>
                                         
                                             </div>
                                             <div >
                                                <label for="name" >{{ __('Name') }}</label>
                                        
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
					 
					     </div>
			   		 <div class="form-group">
			     	 <label for="email">Nom:</label>
			     	 <input type="nom" class="form-control" id="nom" placeholder="Entrer le nom" name="nom">
			   		 </div>
			   		 <div class="form-group">
			      	<label for="pwd">Password:</label>
			     	 <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
			  	  	</div>
			   		 <div class="checkbox" style="margin-top: 20px;">
			    	  <label><input type="checkbox" name="remember"> J'accepte les</label>
			    	  <a href=""><u>CGU</u></a>
			   		 </div>
			  		  <button type="submit" class="btn btn-warning" style="margin-top:20px;color: white;">Submit</button>
			  		</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<a href="">Mentions légales</a>
		<a href="">BDE CESI 2019</a>
	</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>