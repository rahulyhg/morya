<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	'Create',
);

?>

<div class="title-bar">Add New <?php echo TempleType::$heading[$templeType];?> Here</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'templeType'=>$templeType)); ?>