<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="title-head">Edit recipe - <?php echo $model->title; ?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>