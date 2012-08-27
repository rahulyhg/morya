<?php
$this->breadcrumbs=array(
	'Vedics',
);
?>

<?php  

switch($vedicType){
case VedicType::Aarti : $heading = "Aarti";$addhead = "Add Arti";break;
case VedicType::Mantra : $heading = "Mantra Pushpanjali";$addhead = "Add Mantra";break;
case VedicType::Atharva : $heading = "Atharva shirsha";$addhead = "Add Atharva Shirsha";break;
case VedicType::Pooja : $heading = "Uttar Pooja";$addhead = "Add Uttar Pooja vidhi";break;

}
?>
<h1><?php echo $heading;?></h1>
<?php if($vedicType == VedicType::Aarti || VedicType::Mantra){ ?>
<p><?php echo CHtml::link($addhead,array('addvedic','vedicType'=>$vedicType));?></P>
<?php } ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>

<?php
/*$this->menu=array(
	array('label'=>'Add Arti', 'url'=>$this->createAbsoluteUrl('addvedic',array('vedicType'=>VedicType::Aarti))),
	array('label'=>'Add Mantra', 'url'=>$this->createAbsoluteUrl('addvedic',array('vedicType'=>VedicType::Mantra))),
	array('label'=>'Add Atharva Shirsha', 'url'=>$this->createAbsoluteUrl('addvedic',array('vedicType'=>VedicType::Atharva))),
	array('label'=>'Add Uttar Pooja vidhi', 'url'=>$this->createAbsoluteUrl('addvedic',array('vedicType'=>VedicType::Pooja))),
);*/
?>