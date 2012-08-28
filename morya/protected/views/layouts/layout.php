<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title></title>
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <link rel="stylesheet" href="css/960/960_12_col.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/960/reset.css">
  <link rel="stylesheet" href="css/960/text.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="css/liteaccordion.css" rel="stylesheet" />
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.5.3.min.js"></script>
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="container_12">
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header class="container_12">
  <span class="grid_2" style="position:relative;">
	<span class="logo"></span>
	<span class="ganesh_logo"></span>
  </span>
  <div class="grid_3" style="position:relative;">
   <h1 class="header_text"></h1>
   <h4 class="subheader_text">Let World Know Our Ganesh...</h4>
   <span class="social">
	<a href="https://twitter.com/GlobalGanesh" target="_blank"><span class="twitter"></span></a>
	<a href="http://www.facebook.com/GlobalGanesh" target="_blank"><span class="facebook"></span>
	<a href="/rss.xml"><span class="rss"></span></a>
   </span>
  </div>
  <nav class="grid_7 push_1">
	<a class="grid_1" href="">
		<span class="aarti_menu_logo"></span>
		<p>Aarti</p>
	</a>
	
	<a class="grid_1" href="">
		<span class="photo_menu_logo"></span>
		<p>Photo</p>
	</a>
	
	<a class="grid_1" href="">
		<span class="temple_menu_logo"></span>
		<p>Temples</p>
	</a>
	
	<a class="grid_1" href="">
		<span class="competition_menu_logo"></span>
		<p>Competition</p>
	</a>
	<a class="grid_1" href="">
		<span class="recipies_menu_logo"></span>
		<p style="left:348px;">Recipies</p>
	</a>
	<a class="grid_1" href="">
		<span class="my_ganesha_menu_logo"></span>
		<p>My Ganesha</p>
	</a>
	
  </nav>
  
  </header>
  <div role="main container_12">
	<?php echo $content; ?>
		</div>
	</section>
  </div>
  <footer>

  </footer>


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script-->
<script src="js/libs/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/libs/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/libs/jquery.gridnav.js"></script>
<script type="text/javascript" src="js/libs/liteaccordion.jquery.js"></script>
<?php $this->renderClip('js-page-end'); ?>
  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <!--script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script-->
</body>
</html>