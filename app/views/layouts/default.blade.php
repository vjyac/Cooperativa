<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<title>{{trans('pages.name')}}</title>

	<link rel="shortcut icon" href="/favicon.ico">

	<link rel="stylesheet" type="text/css" href="/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/css/loader.css"/>
	<link rel="stylesheet" type="text/css" href="/css/slider.css"/>
	<link rel="stylesheet" type="text/css" href="/css/testimonials.css"/>
	<link rel="stylesheet" type="text/css" href="/css/page-nav.css"/>
	<link rel="stylesheet" type="text/css" href="/css/galleries.css"/>
	<link rel="stylesheet" type="text/css" href="/css/images.css"/>
	<link rel="stylesheet" type="text/css" href="/css/portfolio.css"/>
	<link rel="stylesheet" type="text/css" href="/css/alert-boxes.css"/>
	<link rel="stylesheet" type="text/css" href="/css/animations.css"/>
	<link rel="stylesheet" type="text/css" href="/3dParty/colorbox/colorbox.css"/>


	<!--Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic'
		  rel='stylesheet' type='text/css'>

	<!--Fonts with Icons-->
	<link rel="stylesheet" href="/3dParty/fontello/css/fontello.css"/>

	<!--[if lte IE 8]>
	<script src="/scripts/respond.min.js"></script>
	<![endif]-->

	<meta property='fb:app_id' content='318129194920279'/>
	<div id='fb-root'></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = '//connect.facebook.net/es_LA/all.js#xfbml=1&appId=318129194920279'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>

<div id="pi-all">

<!-- Header -->
<div class="pi-main-header-w">

<!-- Header row -->
<div class="pi-section-w pi-section-header-w pi-section-dark pi-section-header-sm-w">
	<div class="pi-section pi-section-header pi-section-header-sm pi-clearfix">

		<!-- Phone -->
		<div class="pi-header-block pi-header-block-txt">
			<i class="pi-header-block-icon icon-phone pi-icon-base pi-icon-square"></i>Tel: <strong>+54 3756 481282</strong>
		</div>
		<!-- End phone -->

		<!-- Radio -->
		<div class="pi-header-block pi-header-block-txt">
				<i class="pi-header-block-icon icon-mail pi-icon-base pi-icon-square"></i>Tel: <strong>info@cooperativavirasoro.com</strong>
		</div>
		    <!--  End radio -->

		<!-- Social icons -->
		<div class="pi-header-block pi-pull-right pi-hidden-2xs">
			<ul class="pi-social-icons pi-stacked pi-jump pi-full-height pi-bordered pi-small pi-colored-bg clearFix">
				<li><a href="http://www.twitter.com/virasorovirtual" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
				<li><a href="http://www.facebook.com/virasorovirtual" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UC67T0JQjkpXiMrITmPQufAA" class="pi-social-icon-youtube-play"><i class="icon-youtube-play"></i></a></li>
			</ul>
		</div>
		<!-- End social icons -->

		<!-- Text -->
		<div class="pi-header-block pi-header-block-txt pi-pull-right pi-hidden-xs">Seguinos:</div>
		<!-- End text -->

	</div>
</div>
<!-- End header row -->

<div class="pi-header-row-sticky-w">
<!-- Header row -->
<div class="pi-section-w pi-section-header-w pi-section-white pi-section-header-lg-w pi-header-row-sticky pi-shadow-bottom">
<div class="pi-section pi-section-header pi-section-header-lg pi-clearfix">

<!-- Logo -->
<div class="pi-header-block pi-header-block-logo">
	<a href="/"><img src="/img/logo-base.png" alt=""></a>
</div>
<!-- End logo -->

<!-- Text -->
<div class="pi-header-block pi-header-block-txt pi-hidden-2xs">Cooperativa de Servicios Públicos de Gdor. Virasoro LTDA.</div>
<!-- End text -->

<!-- Menu -->
<div class="pi-header-block pi-pull-right">
<ul class="pi-simple-menu pi-has-hover-border pi-full-height pi-hidden-sm">

<li class="pi-has-dropdown"><a href="/"><span>Home</span></a>
	<ul class="pi-submenu pi-has-border pi-items-have-borders pi-has-shadow pi-submenu-dark">


		<li><a href="/contactos/create"><span>Contactarse</span></a></li>

		<?php

				$pages = DB::table('pages')
													->where('activo', '=', 'si')
													->where('mostrar_menu', '=', 'si')
													->orderBy('page', 'asc')->get();

				if (count($pages)) {
					foreach ($pages as $page) {
						?>
							<li><a href="/pages/{{$page->url_seo}}"><span>{{$page->page}}</span></a></li>
						<?php
					}
				}

		?>


	</ul>

</li>



@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))

<li class="pi-has-dropdown"><a href="#"><span>{{ Lang::get('messages.menu_admin') }}</span></a>
	<ul class="pi-submenu pi-has-border pi-items-have-borders pi-has-shadow pi-submenu-dark">
		<li><a href="{{ URL::to('/users') }}"><span>{{trans('pages.users')}}</span></a></li>
		<li><a href="{{ URL::to('/groups') }}"><span>{{trans('pages.groups')}}</span></a></li>
		<li><a href="/articulos/ver"><span>Articulos</span></a></li>

		<li><a href="/contactos"><span>Contactos</span></a></li>
    <li><a href="/pages"><span>Paginas</span></a></li>
	</ul>

</li>


@endif






						@if (Sentry::check())
						<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}/{{ Session::get('userId') }}"><i class="icon-user"></i></a></li>
						<li><a href="{{ URL::to('logout') }}">{{trans('pages.logout')}}</a></li>
						@else
						<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::to('login') }}">{{trans('pages.login')}}</a></li>
						@endif




</ul>
</div>
<!-- End menu -->

<!-- Mobile menu button -->
<div class="pi-header-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only">
	<button class="btn pi-btn pi-mobile-menu-toggler" data-target="#pi-main-mobile-menu">
		<i class="icon-menu pi-text-center"></i>
	</button>
</div>
<!-- End mobile menu button -->


	<!-- Mobile menu -->
	<div id="pi-main-mobile-menu" class="pi-section-menu-mobile-w pi-section-dark">
		<div class="pi-section-menu-mobile">

			<ul class="pi-menu-mobile pi-items-have-borders pi-menu-mobile-dark">
				<li class="active"><a href="/"><span>Home</span></a>
				<ul>
					<li><a href="/login"><span>Login</span></a></li>

				</ul>


			</ul>

		</div>
	</div>
	<!-- End mobile menu -->

</div>
</div>
<!-- End header row -->
</div>

</div>
<!-- End header -->

@yield('content')

<!-- Footer -->

<div class="pi-section-w pi-border-top pi-section-base">
	<div class="pi-section pi-padding-top-50 pi-padding-bottom-20">

		<!-- Row -->
		<div class="pi-row">

			<!-- Col 3 -->
			<div class="pi-col-md-3 pi-col-xs-6 pi-padding-bottom-30">

				<div class="pi-icon-box-vertical pi-text-center">

					<div class="pi-icon-box-icon pi-icon-box-icon-base">
						<i class="icon-location"></i>
					</div>

					<h6 class="pi-margin-bottom-20 pi-weight-700 pi-uppercase pi-letter-spacing">
						Dirección
					</h6>

					<p>
						Ñaembe y A. Navajas Nº 895,<br>
						Virasoro, Corrientes AR
					</p>

				</div>

			</div>
			<!-- End col 3 -->

			<!-- Col 3 -->
			<div class="pi-col-md-3 pi-col-xs-6 pi-padding-bottom-30">

				<div class="pi-icon-box-vertical pi-text-center">

					<div class="pi-icon-box-icon pi-icon-box-icon-base">
						<i class="icon-phone"></i>
					</div>

					<h6 class="pi-margin-bottom-20 pi-weight-700 pi-uppercase pi-letter-spacing">
						Contacto
					</h6>

					<p>
						(03756) 481282
						<br>
						<a href="#">info@cooperativavirasoro.com</a>
					</p>

				</div>

			</div>
			<!-- End col 3 -->

			<!-- Col 3 -->
			<div class="pi-col-md-3 pi-col-xs-6 pi-padding-bottom-30">

				<div class="pi-icon-box-vertical pi-text-center">

					<div class="pi-icon-box-icon pi-icon-box-icon-base">
						<i class="icon-eye"></i>
					</div>

					<h6 class="pi-margin-bottom-20 pi-weight-700 pi-uppercase pi-letter-spacing">
						Seguinos
					</h6>

					<ul class="pi-social-icons pi-round pi-jump pi-clearfix">
						<li><a href="http://www.facebook.com/virasorovirtual" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/virasorovirtual" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
						<li><a href="https://plus.google.com/100582678678073940290/about" class="pi-social-icon-gplus"><i class="icon-gplus"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UC67T0JQjkpXiMrITmPQufAA" class="pi-social-icon-youtube-play"><i class="icon-youtube-play"></i></a></li>
					</ul>

				</div>

			</div>
			<!-- End col 3 -->

			<!-- Col 3 -->
			<div class="pi-col-md-3 pi-col-xs-6 pi-padding-bottom-30">

				<div class="pi-icon-box-vertical pi-text-center">

					<div class="pi-icon-box-icon pi-icon-box-icon-base">
						<i class="icon-code"></i>
					</div>

					<h6 class="pi-margin-bottom-20 pi-weight-700 pi-uppercase pi-letter-spacing">
						Desarrollado
					</h6>

					<p>
						Por
						<br>
						<a href="http://www.codexcontrol.com">Codex S.A.</a>
					</p>

				</div>

			</div>
			<!-- End col 3 -->

		</div>
		<!-- End row -->

	</div>
</div>
<!-- End widget area -->



<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white">
	<div class="pi-section">

		<div class="pi-icon-box-vertical pi-text-center">

			<div class="pi-icon-box-icon pi-icon-box-icon-circle pi-icon-box-icon-base">
				<i class="icon-mail"></i>
			</div>

			<p class="pi-margin-bottom-25 pi-text-center">
				<span class="pi-weight-700 pi-text-dark">Unite a nuestra lista de correo</span> y mantenete al día sobre las nuevas noticias y funcionamiento de servicios. <br>No te preocupes, siempre estaras informado, te enviaremos un mail para validar tu cuenta.
			</p>

		</div>



		<!-- Row -->
		<div class="pi-row">

			<!-- Col 8 -->
			<div class="pi-col-md-8 pi-col-md-offset-2">

				<!-- Forms -->
				{{ Form::open(array('action' => 'UserController@store')) }}

					<!-- Row -->
					<div class="pi-row pi-grid-small-margins">

						<!-- Col 3 -->
						<div class="pi-col-sm-3 pi-col-xs-6">

							<!-- First name form -->
							<div class="form-group">
								{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => trans('users.email'))) }}
							</div>
							<!-- End first name form -->

						</div>
						<!-- End col 3 -->

						<!-- Col 3 -->
						<div class="pi-col-sm-3 pi-col-xs-6">

							<!-- Email form -->
							<div class="form-group">
							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('users.password'))) }}
							</div>
							<!-- End email form -->

						</div>
						<!-- End col 3 -->

						<!-- Col 3 -->
						<div class="pi-col-sm-3 pi-col-xs-6">

							<!-- Phone number form -->
							<div class="form-group">
							{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => trans('users.confirm_password'))) }}
							</div>
							<!-- End phone number form -->

						</div>
						<!-- End col 3 -->

						<!-- Col 3 -->
						<div class="pi-col-sm-3 pi-col-xs-6">

							<p class="pi-text-center">
								{{ Form::submit(trans('users.register'), array('class' => 'btn pi-btn-base pi-btn-wide')) }}
							</p>

						</div>
						<!-- End col 3 -->

					</div>
					<!-- End row -->

				{{ Form::close() }}
				<!-- End forms -->

			</div>
			<!-- End col 8 -->

		</div>
		<!-- End row -->

	</div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->



<!-- Copyright area -->
<div class="pi-section-w pi-section-header-w pi-section-dark pi-border-top-light pi-border-bottom-strong-base pi-section-header-lg-w">
	<div class="pi-section pi-section-header pi-section-header-lg pi-center-text-2xs pi-clearfix">

		<!-- Social icons -->
		<div class="pi-header-block pi-pull-right pi-hidden-2xs">
			<ul class="pi-social-icons-simple pi-small clearFix">
				<li><a href="http://www.facebook.com/virasorovirtual" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
				<li><a href="http://www.twitter.com/virasorovirtual" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
				<li><a href="http://instagram.com/virasorovvirtual" class="pi-social-icon-instagram"><i class="icon-instagram"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UC67T0JQjkpXiMrITmPQufAA" class="pi-social-icon-tumblr"><i class="icon-youtube-play"></i></a></li>
				<li><a href="https://plus.google.com/100582678678073940290/about" class="pi-social-icon-gplus"><i class="icon-gplus"></i></a></li>
				<li><a href="/rss" class="pi-social-icon-rss"><i class="icon-rss"></i></a></li>
			</ul>
		</div>
		<!-- End social icons -->

		<!-- Footer logo -->
		<div class="pi-header-block pi-header-block-logo pi-header-block-bordered"><a href="/"><img src="/img/logo-opacity-dark.png" alt=""></a></div>
		<!-- End footer logo -->

		<!-- Text -->
		<span class="pi-header-block pi-header-block-txt pi-hidden-xs">&copy; 2014. &laquo;<a href="http://www.cooperativavirasoro.com">Cooperativa de Servicios Públicos de Gdor. Virasoro LTDA.</a>&raquo;.
			Todos los derechos reservados.
		</span>
		<!-- End text -->

	</div>
</div>

<!-- End copyright area -->
<!-- End footer -->

</div>
<div class="pi-scroll-top-arrow" data-scroll-to="0"></div>

<script src="http://api.html5media.info/1.1.6/html5media.min.js"></script>
<script src="/3dParty/jquery-1.11.0.min.js"></script>
<script src="/scripts/pi.helpers.js"></script>
<script src="/scripts/pi.boundManager.js"></script>
<script src="/scripts/pi.imagesLoader.js"></script>
<script src="/scripts/pi.columnFix.js"></script>
<script src="/scripts/pi.init.caption.js"></script>
<script src="/3dParty/FitVids.js/jquery.fitvids.js"></script>
<script src="/scripts/pi.init.fitvids.js"></script>
<script src="/scripts/pi.slider.js"></script>
<script src="/scripts/pi.init.slider.js"></script>
<script src="/3dParty/isotope/isotope.js"></script>
<script src="/scripts/pi.init.isotope.js"></script>
<script src="/scripts/pi.init.social.js"></script>
<script src="/scripts/pi.ddMenu.js"></script>
<script src="/scripts/pi.init.removeLastElMargin.js"></script>
<script src="/scripts/pi.fixedHeader.js"></script>
<script src="/scripts/pi.mobileMenu.js"></script>
<script src="/scripts/pi.init.submitFormFooter.js"></script>
<script src="/scripts/pi.detectTransition.js"></script>
<script src="/scripts/pi.alert.js"></script>
<script src="/scripts/pi.init.formsBlurClasses.js"></script>
<script src="/scripts/pi.init.placeholder.js"></script>
<script src="/3dParty/colorbox/jquery.colorbox-min.js"></script>
<script src="/scripts/pi.init.colorbox.js"></script>
<script src="/3dParty/jquery.easing.1.3.js"></script>
<script src="/3dParty/jquery.scrollTo.min.js"></script>
<script src="/scripts/pi.init.jqueryScrollTo.js"></script>
<script src="/scripts/pi.scrollTopArrow.js"></script>
<script src="/3dParty/tweetie/tweetie.min.js"></script>
<script src="/scripts/pi.init.tweetie.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-137439-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
