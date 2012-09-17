<?php
$this->breadcrumbs=array(
	'Experiences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Experience', 'url'=>array('index')),
);
?>

<div class="tab">Add Your Experience</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>