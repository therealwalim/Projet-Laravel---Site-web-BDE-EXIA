<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Cette page représente l'administration du BDE">
  <meta name="author" content="©BDE CESI">
  <title>Bde Exia Alger - Notification</title>
  <!-- Favicon -->
  <link href="./utils/img/brand/favicon.ico" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./utils/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./utils/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./utils/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="./utils/img/brand/cesilogo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      


      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./utils/img/brand/cesilogo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
    
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="profile.html">
              <i class="ni ni-single-02 text-yellow"></i> User profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panier.html">
              <i class="ni ni-cart text-yellow"></i>Panier <span class="badge badge-danger" style="margin-left: 5px;">2</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.html">
              <i class="ni ni-bell-55 text-yellow"></i>Notification <span class="badge badge-danger" style="margin-left: 5px;">2</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="permission.html">
              <i class="ni ni-settings-gear-65 text-red"></i> Permission
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Boutique.html">
              <i class="fas fa-cart-plus text-red"></i> Boutique
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark bg-gradient-primary" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="notification.html">Notifications</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./utils/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold" style="color: white !important;">User</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- Header -->
    <div class="header pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
    <!-- Page content -->
    
    <section class="jumbotron text-center bg-gradient-primary">
      <div class="container">
        <h1 class="jumbotron-heading text-white">Notifications</h1>
      </div>
    </section>
    <h1>Notifications non lu</h1>

    <div class="container">
      <div class="row">
        
          @foreach($notifications->where('status','0') as $notification)
          
        @if($notification->type == 1)
        <div class="col-12 spacer alert-custom-danger">
          <base-alert type="danger">
            <span class="alert-inner--icon"><i class="fas fa-flag"></i></span>
            <span class="alert-inner--text"><strong>Signalement<br></strong> Cette <a href="evenement/{{$notification->likable_id}}">evenement</a> a été signalé.</span>
          </base-alert>
        </div>
        @endif
  
        @if($notification->type == 0)
        <div class="col-12 spacer alert-custom-success">
            <base-alert type="danger">
              <span class="alert-inner--icon"><i class="fas fa-check"></i></i></span>
              <span class="alert-inner--text"><strong>Idée validée<br></strong> Votre <a href="evenement/{{$notification->likable_id}}">idée</a> a été validée par un membre du BDE.</span>
            </base-alert>
          </div>
          @endif
  
          @if($notification->type == 3)
  @php
          $commantateurc = DB::table('commentaires')->where('id', $notification->likable_id)->first();
          $commantateuru = DB::table('users')->where('id', $commantateurc->id_utilisateur)->first();
          $evenement = DB::table('evenements')->where('id', $commantateurc->evenement_id)->first();
  
  @endphp
        <div class="col-12 spacer alert-custom-danger">
          <base-alert type="danger">
            <span class="alert-inner--icon"><i class="fas fa-flag"></i></span>
            <span class="alert-inner--text"><strong>Signalement<br></strong> Le commentaire de <b>{{$commantateuru->nom}} {{$commantateuru->prenom}} : "<i>{{$commantateurc->contenu}}</i>"" dans <a style="color:Black" href="evenement/{{$evenement->id}}"> {{$evenement->nom}}</a> </b>a été signalé.</span>
          </base-alert>
        </div>
        @endif
  
        @if($notification->type == 4)
        @php
                $commantateurc = DB::table('commentaires')->where('id', $notification->likable_id)->first();
                $commantateuru = DB::table('users')->where('id', $commantateurc->id_utilisateur)->first();
                $evenement = DB::table('evenements')->where('id', $commantateurc->evenement_id)->first();
        @endphp
              <div class="col-12 spacer alert-custom-danger">
                <base-alert type="danger">
                  <span class="alert-inner--icon"><i class="fas fa-flag"></i></span>
                  <span class="alert-inner--text"><strong>Signalement<br></strong> La photo de <a href="evenement/{{$notification->likable_id}}">{{$commantateuru->nom}} {{$commantateuru->prenom}} Dans {{$evenement->nom}}</a> été signalé.</span>
                </base-alert>
              </div>
              @endif
        @endforeach
        
        <h1>Ancienne notifications</h1>
        @foreach($notifications->where('status','1') as $notification)

        @if($notification->type == 1)
      <div class="col-12 spacer alert-custom-danger">
        <base-alert type="danger">
          <span class="alert-inner--icon"><i class="fas fa-flag"></i></span>
          <span class="alert-inner--text"><strong>Signalement<br></strong> Cette <a href="evenement/{{$notification->likable_id}}">evenement</a> a été signalé.</span>
        </base-alert>
      </div>
      @endif

      @if($notification->type == 0)
      <div class="col-12 spacer alert-custom-success">
          <base-alert type="danger">
            <span class="alert-inner--icon"><i class="fas fa-check"></i></i></span>
            <span class="alert-inner--text"><strong>Idée validée<br></strong> Votre <a href="evenement/{{$notification->likable_id}}">idée</a> a été validée par un membre du BDE.</span>
          </base-alert>
        </div>
        @endif

        @if($notification->type == 3)
@php
        $commantateurc = DB::table('commentaires')->where('id', $notification->likable_id)->first();
        $commantateuru = DB::table('users')->where('id', $commantateurc->id_utilisateur)->first();
        $evenement = DB::table('evenements')->where('id', $commantateurc->evenement_id)->first();

@endphp
      <div class="col-12 spacer alert-custom-danger">
        <base-alert type="danger">
          <span class="alert-inner--icon"><i class="fas fa-flag"></i></span>
          <span class="alert-inner--text"><strong>Signalement<br></strong> Le commentaire de <b>{{$commantateuru->nom}} {{$commantateuru->prenom}} : "<i>{{$commantateurc->contenu}}</i>"" dans <a style="color:Black" href="evenement/{{$evenement->id}}"> {{$evenement->nom}}</a> </b>a été signalé.</span>
        </base-alert>
      </div>
      @endif

      @if($notification->type == 4)
      @php
              $commantateurc = DB::table('commentaires')->where('id', $notification->likable_id)->first();
              $commantateuru = DB::table('users')->where('id', $commantateurc->id_utilisateur)->first();
              $evenement = DB::table('evenements')->where('id', $commantateurc->evenement_id)->first();
      @endphp
            <div class="col-12 spacer alert-custom-danger">
              <base-alert type="danger">
                <span class="alert-inner--icon"><i class="fas fa-flag"></i></span>
                <span class="alert-inner--text"><strong>Signalement<br></strong> La photo de <a href="evenement/{{$notification->likable_id}}">{{$commantateuru->nom}} {{$commantateuru->prenom}} Dans {{$evenement->nom}}</a> été signalé.</span>
              </base-alert>
            </div>
            @endif

      @endforeach
        @php
        $user=Auth::user();
        DB::table('notifications')
        ->where('id_utilisateur', $user->id)
        ->update(['status' => 1]);
    
    @endphp

      </div>
    </div>

    <!-- Footer -->
      
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./utils/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./utils/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./utils/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./utils/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./utils/js/argon.js?v=1.0.0"></script>
</body>

</html>