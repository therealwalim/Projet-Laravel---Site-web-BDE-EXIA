<!DOCTYPE html>
<html lang="fr">
<head>
	<title>BDE - CESI Ecole D'ingénieurs</title>
	<meta charset="UTF-8">
	<meta name="description" content="Site web du BDE">
	<meta name="keywords" content="bde, exia, cesi, ingenieur, event, boutique, idea">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	

	<!-- Header section start -->
	<header class="header-section sp-pad">
		<img class="site-logo logo slideInUp animated" src="./img/bdelogo.png" style="height: 75px;width: 75px;">
		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>
		<nav class="main-menu">
                <ul><li><a href="/">Home</a></li>
                    <li><a href="/future">Event</a></li>
                    <li><a href="/produit">Boutique</a></li>
                    <li><a href="/idee">Boite à idées</a></li>
                    @guest
                        <li><a href="/login">Connexion</a></li>
                        <li><a href="/register">Inscription</a></li>
                    @else
    
                    <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     Déconnexion
                 </a></li>

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
            </nav>
	</header>
	<!-- Header section end -->


	<!-- Hero section start -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/1.jpg">
				<div class="hs-text">
					<h3 class="hs-title" style="font-size: 40px !important;">Bureau des étudiants</h3>
					<p class="hs-des" style="font-size: 45px !important;">Bienvenue <br>Sur le site web du BDE</p>
				</div>
			</div>
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/2.jpg">
				<div class="hs-text">
					<h3 class="hs-title" style="font-size: 40px !important;">Activitées</h3>
					<p class="hs-des" style="font-size: 45px !important;">Ce site web <br>vous propose divers événements</p>
				</div>
			</div>
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/3.jpg">
				<div class="hs-text">
					<h3 class="hs-title" style="font-size: 40px !important;">Boutique</h3>
					<p class="hs-des" style="font-size: 45px !important;">Nous avons créé pour vous <br>un espace où vous pourrez acheter <br> des produits dérivés</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Intro section start -->
	<section class="intro-section sp-pad spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-4 intro-text col-xs-1" align="center">
					<span class="sp-sub-title"><i class="fas fa-calendar-check fa-5x"></i></span>
					<h3 class="sp-title" style="margin-top: 30px !important;">Event</h3>
					<p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada feugiat. Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id.</p>
					<a href="future" class="site-btn">En savoir plus</a>
				</div>

				<div class="col-xl-4 intro-text col-xs-1" align="center">
					<span class="sp-sub-title"><i class="fas fa-lightbulb fa-5x"></i></span>
					<h3 class="sp-title" style="margin-top: 30px !important;">Boite à idées</h3>
					<p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada feugiat. Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id.</p>
					<a href="idee" class="site-btn">En savoir plus</a>
				</div>

				<div class="col-xl-4 intro-text col-xs-1" align="center">
					<span class="sp-sub-title"><i class="fas fa-shopping-basket fa-5x"></i></span>
					<h3 class="sp-title" style="margin-top: 30px !important;">Boutique</h3>
					<p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada feugiat. Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id.</p>
					<a href="produit" class="site-btn">En savoir plus</a>
				</div>
				
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<!-- Modal -->

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content modal-lg">
	      <div class="modal-header">
	        <h4 class="modal-title" id="exampleModalLabel">Mentions légales</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" style="overflow-y: scroll; height: 300px;">
			Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y parcourir ses pages. En vous connectant sur ce site, vous acceptez sans réserves les présentes modalités. Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans l’économie numérique, les responsables du présent site internet <a href="http://bde-exia.net">bde-exia.net</a> sont :

			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Editeur du Site : </b></span></p>
			BDE
			Numéro de SIRET :  3728738787979387
			Responsable editorial : Walim
			2 rue exia
			Téléphone :0936483920 - Fax : 0364528392
			Email : bde@exia.net
			Site Web : <a href="http://bde-exia.net">bde-exia.net</a>
			</br>
			<p style="color: #b51a00;"><b><span style="color: rgb(0, 0, 0);">Hébergement :</span> </b></p>
			Hébergeur : OVH
			2 rue ovh
			Site Web :  <a href="http://ovh.com">ovh.com</a>
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Développement</b><b> : </b></span></p>
			BDE
			Adresse : 2 rue BDE
			Site Web : <a href="http://www.exar.com">www.exar.com</a>
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Conditions d’utilisation : </b></span></p>
			Ce site (<a href="http://bde-exia.net">bde-exia.net</a>) est proposé en différents langages web (HTML, HTML5, Javascript, CSS, etc…) pour un meilleur confort d'utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme Internet explorer, Safari, Firefox, Google Chrome, etc…
			
			<span style="color: #323333;">Le BDE<b> </b></span>met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L'internaute devra donc s'assurer de l'exactitude des informations auprès de , et signaler toutes modifications du site qu'il jugerait utile. n'est en aucun cas responsable de l'utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.
			<br>

			<b>Cookies</b> : Le site <a href="http://bde-exia.net">bde-exia.net</a> peut-être amené à vous demander l’acceptation des cookies pour des besoins de statistiques et d'affichage. Un cookies est une information déposée sur votre disque dur par le serveur du site que vous visitez. Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier texte auquel un serveur accède pour lire et enregistrer des informations . Certaines parties de ce site ne peuvent être fonctionnelles sans l’acceptation de cookies.
			<br>
			<b>Liens hypertextes :</b> Les sites internet de peuvent offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet. BDE ne dispose d'aucun moyen pour contrôler les sites en connexion avec ses sites internet. ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l'internaute, qui doit se conformer à leurs conditions d'utilisation.

			Les utilisateurs, les abonnés et les visiteurs des sites internet de ne peuvent mettre en place un hyperlien en direction de ce site sans l'autorisation expresse et préalable du BDE.

			Dans l'hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de BDE, il lui appartiendra d'adresser un email accessible sur le site afin de formuler sa demande de mise en place d'un hyperlien. BDE se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Services fournis : </b></span></p>
			<p style="color: #323333;">L'ensemble des activités de la société ainsi que ses informations sont présentés sur notre site <a href="http://bde-exia.net">bde-exia.net</a>.</p>
			<p style="color: #323333;">BDE s’efforce de fournir sur le site bde-exia.net des informations aussi précises que possible. les renseignements figurant sur le site <a href="http://bde-exia.net">bde-exia.net</a> ne sont pas exhaustifs et les photos non contractuelles. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par ailleurs, tous les informations indiquées sur le site bde-exia.net<span style="color: #000000;"><b> </b></span>sont données à titre indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.  </p>
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Limitation contractuelles sur les données : </b></span></p>
			Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des omissions. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email, à l’adresse bde@exia.net, en décrivant le problème de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur utilisé, …).

			Tout contenu téléchargé se fait aux risques et périls de l'utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d'un quelconque dommage subi par l'ordinateur de l'utilisateur ou d'une quelconque perte de données consécutives au téléchargement. <span style="color: #323333;">De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</span>

			Les liens hypertextes mis en place dans le cadre du présent site internet en direction d'autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de BDE.
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Propriété intellectuelle :</b></span></p>
			Tout le contenu du présent sur le site <a href="http://bde-exia.net">bde-exia.net</a>, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.

			Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit de BDE. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Déclaration à la CNIL : </b></span></p>
			Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l'égard des traitements de données à caractère personnel) relative à l'informatique, aux fichiers et aux libertés, ce site n'a pas fait l'objet d'une déclaration  auprès de la Commission nationale de l'informatique et des libertés (<a href="http://www.cnil.fr/">www.cnil.fr</a>).
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Litiges : </b></span></p>
			Les présentes conditions du site <a href="http://bde-exia.net">bde-exia.net</a> sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l'interprétation ou de l'exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence, pour le règlement de contentieux éventuels, est le français.
			</br>
			<p style="color: #b51a00;"><span style="color: rgb(0, 0, 0);"><b>Données personnelles :</b></span></p>
			De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous visitez notre site Internet <a href="http://bde-exia.net">bde-exia.net</a>.

			Cependant, ce principe comporte certaines exceptions. En effet, pour certains services proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que : votre nom, votre fonction, le nom de votre société, votre adresse électronique, et votre numéro de téléphone. Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans la rubrique « contact ». Dans tous les cas, vous pouvez refuser de fournir vos données personnelles. Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des renseignements sur notre société, ou de recevoir les lettres d’information.

			Enfin, nous pouvons collecter de manière automatique certaines informations vous concernant lors d’une simple navigation sur notre site Internet, notamment : des informations concernant l’utilisation de notre site, comme les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre navigateur, vos temps d'accès. De telles informations sont utilisées exclusivement à des fins de statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-cesi space-zyada" data-dismiss="modal">Fermer</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Fin Modal -->
	
	<div class="alert alert-cesi alert-dismissible fade show" role="alert" style="margin: 0;">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="font-size: 15px; margin-top: 5px;">
	    Allow cookies
	  </button>
	  This website uses cookies to ensure you get the best experience on our website
	</div>

	<!-- Footer section start -->
	<footer class="footer-section">
		<button type="button" class="btn btn-cesi" data-toggle="modal" data-target="#exampleModal">
  			Mentions légales
		</button>
		<a href="#">©BDE Exia.CESI 2019</a>
	</footer>
	<!-- Footer section end -->

	

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>