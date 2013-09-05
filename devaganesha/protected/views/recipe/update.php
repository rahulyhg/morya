<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Edit',
);
$this->setPageTitle('Edit - '.$model->name);
Yii::app()->clientScript->registerMetaTag('Get all the Recipes for ganesh Utsav. Recipes for prasad Naivaidya. Ganeshas favourites. Sugerless recipes.', 'description');
?>

	<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head">Edit recipe - <?php echo $model->title; ?></h2>
</div>
</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>