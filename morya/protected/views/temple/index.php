<?php
$this->breadcrumbs=array(
	'Temples',
);

$this->menu=array(
	array('label'=>'Create Temple', 'url'=>array('create')),
	array('label'=>'Manage Temple', 'url'=>array('admin')),
);
?>

<h1>Temples</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
