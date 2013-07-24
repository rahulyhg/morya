<?php
$this->breadcrumbs=array(
	'Experiences'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Experience', 'url'=>array('index')),
	array('label'=>'Create Experience', 'url'=>array('create')),
	array('label'=>'View Experience', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Experience', 'url'=>array('admin')),
);
?>

<div class="title-bar">Edit - <?php echo $model->title;?></div> 

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>