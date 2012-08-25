<?php
$this->breadcrumbs=array(
	'Recipes',
);

?>

<h1>Recipes</h1>
<p><?php echo CHtml::link('Add your Recipe Here',array('create'));?></p>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
