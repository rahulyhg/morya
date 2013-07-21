<?php
$this->breadcrumbs=array(
	'Experiences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Experience', 'url'=>array('index')),
);
?>

<div class="title-bar">Share your experience about lord ganesha</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>