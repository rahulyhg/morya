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
  <div id="fb-root"></div>


    <div class="container-fluid">
            <div class="row-fluid">
      <div class="fl" style="padding-top:10px;"><a href="<?php echo Yii::app()->createUrl('site/index');?>" class="logo"><h1>Devaganesha.com</h1></a></div>
    <div class="fl">
    <ul class="menu">
      <li><div class="menu-single"><div class="aarti"></div><div class="tac"><a href="<?php echo Yii::app()->createUrl('vedic/vedic');?>" class="menu-item">Aarti</a></div></div></li>
            <li><div  class="menu-single"><div class="photo"></div><div class="tac"><a href="<?php echo Yii::app()->createUrl('photo/index');?>" class="menu-item">photo</a></div></div></li>
            <li><div  class="menu-single"><div class="temple"></div><div class="tac"><a href="<?php echo Yii::app()->createUrl('temple/index');?>" class="menu-item">Temples</a></div></div></li>
            <li><div  class="menu-single"><div class="compi"></div><div class="tac"><a href="" class="menu-item">Comeptition</a></div></div></li>
            <li><div  class="menu-single"><div class="recipe"></div><div class="tac"><a href="<?php echo Yii::app()->createUrl('recipe/index');?>" class="menu-item">Recipe</a></div></div></li>
            <li><div  class="menu-single"><div class="myganesha"></div><div class="tac"><a href="<?php echo Yii::app()->createUrl('site/myganesha');?>" class="menu-item">My ganesha</a></div></div></li>
    </ul>
    </div>  
	    <div class="fr">
	<?php Yii::app()->controller->widget('UserInfo'); ?>
       <div class="clear"></div>
      <div class="pt5"><div class="fbsoc fl"></div><div class="twitsoc fl"></div><div class="pinsoc fl"></div><div class="glsoc fl"></div><div class="ytsoc fl"></div><div class="dbsoc fl"></div><div class="rsssoc fl"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>