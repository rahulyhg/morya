<?php
$this->breadcrumbs=array(
	'Temples',
);

$this->menu=array(
	array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
	array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
);

switch($templeType){
case TempleType::Historic : $heading = "Historic Temples";$addhead = "Add historic Temple";break;
case TempleType::Popular : $heading = "Most Popular Temples";$addhead = "Add Most popular Temple";break;
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
