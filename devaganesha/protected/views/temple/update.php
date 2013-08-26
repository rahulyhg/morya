<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="title-bar">Edit <?php echo $model->name; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>