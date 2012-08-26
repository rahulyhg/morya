<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/text.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link type="text/css" href="css/sunny/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />	
	<script type="text/javascript" src="/js/jquery-1.8.0.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.8.23.custom.min.js"></script>
	<script type="text/javascript">
	$("#accordion").accordion();
	</script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container_12">
<header class"grid_12">
	<img class="grid_2" id="logo" src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.jpg" />
	<h1 class="grid_10 push_1" ><?php echo CHtml::encode(Yii::app()->name); ?></h1>
</header>
<div class="clear"></div>
<div id="center-content" class="container_12">
<aside class="grid_2">
	<nav id="accordion">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Vedic','items'=>array(
					array('label'=>'Aarti','url'=>$this->createAbsoluteUrl('/vedic/vedic',array('vedicType'=>VedicType::Aarti))),
					array('label'=>'Mantra Pushpanjali','url'=>$this->createAbsoluteUrl('/vedic/vedic',array('vedicType'=>VedicType::Mantra))),
					array('label'=>'Atharva Shirsh','url'=>$this->createAbsoluteUrl('/vedic/vedic',array('vedicType'=>VedicType::Atharva))),
					array('label'=>'Uttar Puja','url'=>$this->createAbsoluteUrl('/vedic/vedic',array('vedicType'=>VedicType::Pooja))),
					)),
				array('label'=>'Ganesh Temples','items'=>array(
					array('label'=>'Historic Temples','url'=>$this->createAbsoluteUrl('/temple/index',array('templeType'=>TempleType::Historic))),
					array('label'=>'Most Popular','url'=>$this->createAbsoluteUrl('/temple/index',array('templeType'=>TempleType::Popular))),
				)),
				array('label'=>'Recipies', 'url'=>array('/recipe/index')),
				array('label'=>'Ganesh Gaatha'),
				array('label'=>'My Ganesha','items'=>array(
					array('label'=>'Recipies'),
					array('label'=>'Makhars')
				)),
				array('label'=>'Member\'s Area', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</nav>
</aside>
<div class="grid_9">
<section>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
</section>
<section>
	<?php echo $content; ?>
</section>

</div>
<sidebar class="grid_1">
</sidebar>
</div>
<div class="clear"></div>

<footer class="grid_12">
		<p>Copyright &copy; <?php echo date('Y'); ?> by <?php echo CHtml::link(CHtml::encode("www.ganpatibappamorya.com"),array('site/index'))?></a>. All Rights Reserved.</p>
</footer>
</body>
</html>
