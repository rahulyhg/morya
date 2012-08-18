<?php
$this->breadcrumbs=array(
	'Vedics',
);

$this->menu=array(
	array('label'=>'Create Vedic', 'url'=>array('create')),
	array('label'=>'Manage Vedic', 'url'=>array('admin')),
);
?>

<h1>Vedics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
