<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	'Create',
);
$this->menu=array(
    array('label'=>'Recipes', 'url'=>array('index')),
    );
?>

<div class="tab">Add Your recipe Here</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>