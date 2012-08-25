<?php
$this->breadcrumbs=array(
	'Temples',
);

switch($templeType){
case TempleType::Historic : $heading = "Historic Temples of Ganeshji";$addhead = "Add historic Temple";break;
case TempleType::Popular : $heading = "Most Popular Temples of Ganeshji";$addhead = "Add Most popular Temple";break;
}
?>
<h1><?php echo $heading;?></h1>
<p><?php echo CHtml::link($addhead,array('create','templeType'=>$templeType));?></P>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
/*
$this->menu=array(
	array('label'=>$addhead, 'url'=>array('create','templeType'=>$templeType)),
	//array('label'=>'Manage Temple', 'url'=>array('admin')),
);*/
?>
