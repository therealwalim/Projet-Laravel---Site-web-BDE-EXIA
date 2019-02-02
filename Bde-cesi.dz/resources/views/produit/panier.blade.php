<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Cette page représente l'administration du BDE">
  <meta name="author" content="©BDE CESI">
  <title>Panier</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="panier.html">Panier</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="images/produit/User_Circle.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold" style="color: white !important;">{{ Auth::user()->nom }}</span>
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
    
    <div class="container">

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item m-auto">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.html">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product">Product</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contact.html">Cart <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="cart.html">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light">3</span>
                </a>
            </form>
        </div>
    </div>
</nav>
<section class="jumbotron text-center bg-gradient-primary">
    <div class="container">
    <h1 class="jumbotron-heading text-white">Votre Panier</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>


                            @php
                            if($panierExist=1)echo('panier trouer');
                            $prixtotal = 0;
                            use App\produit;

                            @endphp
    
                        @foreach ($produits as $produit)

                        @php
                        $produitname = Produit::where('id',$produit->id_produit)->first();
                        $prixtotal = $prixtotal +$produitname->prix;
                        @endphp
                        <tr>
                            <td></td>
                            <td>{{ $produitname->nom }}</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="1" /></td>
                            <td class="text-right">{{ $produitname->prix }} €</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right"> {{$prixtotal}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">0,00 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong> {{$prixtotal}} €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div id="paypal-button-container"></div>
                <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                <script>
                // Render the PayPal button
                paypal.Button.render({
                // Set your environment
                env: 'sandbox', // sandbox | production
                
                // Specify the style of the button
                style: {
                  layout: 'vertical',  // horizontal | vertical
                  size:   'medium',    // medium | large | responsive
                  shape:  'rect',      // pill | rect
                  color:  'gold'       // gold | blue | silver | white | black
                },
                
                // Specify allowed and disallowed funding sources
                //
                // Options:
                // - paypal.FUNDING.CARD
                // - paypal.FUNDING.CREDIT
                // - paypal.FUNDING.ELV
                funding: {
                  allowed: [
                    paypal.FUNDING.CARD,
                    paypal.FUNDING.CREDIT
                  ],
                  disallowed: []
                },
                
                // Enable Pay Now checkout flow (optional)
                commit: true,
                
                // PayPal Client IDs - replace with your own
                // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                client: {
                  sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                  production: '<insert production client id>'
                },
                
                payment: function (data, actions) {
                  return actions.payment.create({
                    payment: {
                      transactions: [
                        {
                          amount: {
                            total: '0.01',
                            currency: 'USD'
                          }
                        }
                      ]
                    }
                  });
                },
                
                onAuthorize: function (data, actions) {
                  return actions.payment.execute()
                    .then(function () {
                      window.alert('Payment Complete!');
                    });
                }
                }, '#paypal-button-container');
                </script>
            </div>
        </div>
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