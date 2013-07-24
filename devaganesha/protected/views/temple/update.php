<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Temple', 'url'=>array('index')),
	array('label'=>'Create Temple', 'url'=>array('create')),
	array('label'=>'View Temple', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Temple', 'url'=>array('admin')),
);
?>

<div class="title-bar">Edit Temple <?php echo $model->name; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>