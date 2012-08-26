<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	'Create',
);

?>

<h1>Add Your recipe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>