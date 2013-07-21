<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
    array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
);
?>

<div class="title-bar">Add Temple Information Here</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>