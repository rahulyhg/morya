<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Devaganesha.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skin.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui-1.10.2.custom.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.jscrollpane.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen"  />
	 <style>
      body {
        margin-top: 10px; /* 60px to make the container go all the way to the bottom of the topbar */
        overflow-x: hidden;
      }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>
    <div class="container-fluid">
            <div class="row-fluid">
      <div class="fl"><a href="<?php echo Yii::app()->createUrl('site/index');?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ganesha-logo.png" alt="logo" /></a></div>
    <div class="fl mt10">
    <ul class="menu">
      <li><div class="menu-single"><a href="<?php echo Yii::app()->createUrl('vedic/vedic');?>" class="menu-item"><div class="aarti"></div><div class="tac">Aarti</div></a></div></li>
      <li><div  class="menu-single"><a href="<?php echo Yii::app()->createUrl('photo/index');?>" class="menu-item"><div class="photo"></div><div class="tac">photo</div></a></div></li>
      <li><div  class="menu-single"><a href="<?php echo Yii::app()->createUrl('temple/index');?>" class="menu-item"><div class="temple"></div><div class="tac">Temples</div></a></div></li>
      <li><div  class="menu-single"><a href="" class="menu-item"><div class="compi"></div><div class="tac">Comeptition</div></a></div></li>
      <li><div  class="menu-single"><a href="<?php echo Yii::app()->createUrl('recipe/index');?>" class="menu-item"><div class="recipe"></div><div class="tac">Recipe</div></a></div></li>
            <li><div  class="menu-single"><a href="<?php echo Yii::app()->createUrl('site/myganesha');?>" class="menu-item"><div class="myganesha"></div><div class="tac">My ganesha</div></a></div></li>
    </ul>
    </div>  
	    <div class="fr mt10">
	<?php Yii::app()->controller->widget('UserInfo'); ?>
       <div class="clear"></div>
      <div class="pt5">
	  		<a href="http://facebook.com/ohmyganesha" target="_blank"><div class="fbsoc fl"></div></a>
			<a href="http://twitter.com" target="_blank"><div class="twitsoc fl"></div></a>
			<a href="http://pintrest.com" target="_blank"><div class="pinsoc fl"></div></a>
			<a href="" target="_blank"><div class="glsoc fl"></div></a>
			<a href="" target="_blank"><div class="ytsoc fl"></div></a>
			<a href="" target="_blank"><div class="dbsoc fl"></div><a>
			<a href="" target="_blank"><div class="rsssoc fl"></div></a>
      </div>
    </div>
    <div class="clear"></div>
  </div>