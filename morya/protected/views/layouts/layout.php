<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960/960_12_col.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960/reset.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960/text.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/liteaccordion.css"/>
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/modernizr-2.5.3.min.js"></script>
    <script type="text/javascript">
        var _gaq=[['_setAccount','UA-XXXXXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</head>
<body class="container_12">
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header class="container_12">
      <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">
  <span class="grid_2" style="position:relative;">
	<span class="logo"></span>
	<span class="ganesh_logo"></span>
  </span>
      </a>
  <div class="grid_3" style="position:relative;">
      <a href="<?php echo Yii::app()->createUrl('site/index'); ?>"><h1 class="header_text"></h1></a>
   <h4 class="subheader_text">Let World Know Our Ganesh...</h4>
  </div>
  <nav class="grid_7 push_1">
	<a class="grid_1" href="<?php echo $this->createUrl("/vedic/vedic");?>">
		<span class="aarti_menu_logo"></span>
		<p>Aarti</p>
	</a>
	
	<a class="grid_1" href="<?php echo Yii::app()->createUrl('photo/index') ?>">
		<span class="photo_menu_logo"></span>
		<p>Photo</p>
	</a>
	
	<a class="grid_1" href="<?php echo $this->createUrl("/temple/index");?>">
		<span class="temple_menu_logo"></span>
		<p>Temples</p>
	</a>
	
	<a class="grid_1" href="">
		<span class="competition_menu_logo"></span>
		<p>Competition</p>
	</a>
	<a class="grid_1" href="<?php echo $this->createUrl("/recipe/index");?>">
		<span class="recipies_menu_logo"></span>
		<p style="left:348px;">Recipies</p>
	</a>
	<a class="grid_1" href="<?php echo $this->createUrl("/photo/myganesha");?>">
		<span class="my_ganesha_menu_logo"></span>
		<p>Today's Ganesha</p>
	</a>
	
  </nav>
  
  </header>

  <?php $this->widget('UserInfo'); ?>

  <div class="main container_12">
	<?php echo $content; ?>
  </div>
	</section>
  </div>
  <div class="footer">
  <div class="grid_10">
     <p> © Copyright 2012 A site decdicated to our Bappa developed by Mayuresh & Swapnil.</p>

      <blockquote><p>
          <em>
              कोटी कोटी रुपे तुझी, कोटी सूर्य चंद्र तारे कुठे कुठे शोधु तुला, तुझे अनंत देव्हारे...
          </em>
      </p>
      </blockquote>
  </div>
      <div class="social grid_2">
          <p><em>Let's Meet On...</em></p>
          <a href="https://twitter.com/GlobalGanesh" target="_blank"><span class="twitter"></span></a>
          <a href="http://www.facebook.com/GlobalGanesh" target="_blank"><span class="facebook"></span>
          <a href="/rss.xml"><span class="rss"></span></a>
      </div>
  </div>


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.gridnav.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/liteaccordion.jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.fancybox.pack.js?v=2.1.0"></script>
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.timeago.js"></script>
  <script type="text/javascript">
      var app = {
          user : {
              isAuthenticated : eval('<?php echo Yii::app()->user->isGuest ? 'false' : 'true' ?>'),
              name : ''
          }
      }
      $('document').ready(function(){
          $('#signup').fancybox();
          $('.upload_btn').click(function(){
              if(app.user.isAuthenticated === false){
                  $("a#signup").trigger('click');
                  return false;
              }
          });
          $('.fblogina').click(function() {
                  FB.login(function (response) {
                      if (response.authResponse) {
                          window.location = "<?php echo $this->createAbsoluteUrl('user/fbLogin') ?>";
                      } else {
                          // user clicked Cancel
                      }
                  }, {scope:'email,user_photos,user_location,publish_actions'});
              }//fblogin
          );
          var selected_menu = $('.selected_menu');
          $('#lt_sidebar ul').hover(function(){
              //get the selected class
              selected_menu.removeClass('selected_menu').stop().animate({height: "80px"}, {duration: 500, easing: "easeInOutQuad", complete: "callback"});
          },function(){
              //
              selected_menu.addClass('selected_menu').stop().animate({height: "220px"}, {duration: 500, easing: "easeOutQuad", complete: "callback"});
          })

          // find the elements to be eased and hook the hover event
          $('#lt_sidebar li').hover(function() {
              // if the element is currently being animated
              if ($(this).is(':animated')) {
                  $(this).addClass("active").stop().animate({height: "220px"}, {duration: 500, easing: "easeOutQuad", complete: "callback"});
              } else {
                  // ease in quickly
                  $(this).addClass("active").stop().animate({height: "220px"}, {duration: 400, easing: "easeOutQuad", complete: "callback"});
              }
          }, function () {
              // on hovering out, ease the element out
              if ($(this).is(':animated')) {
                  $(this).removeClass("active").stop().animate({height: "80px"}, {duration: 400, easing: "easeInOutQuad", complete: "callback"})
              } else {
                  // ease out slowly
                  $(this).removeClass("active").stop(':animated').animate({height: "80px"}, {duration: 500, easing: "easeInOutQuad", complete: "callback"});
              }
          });
          $("abbr.timeago").timeago();
      });
  </script>
<?php $this->renderClip('js-page-end'); ?>
</body>
</html>