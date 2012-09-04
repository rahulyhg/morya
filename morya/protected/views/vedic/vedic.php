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
<div><h1><?php echo $heading;?></h1></div>
<?php foreach($elementsList as $vedic){ ?>
<div><span><h3><?php echo $vedic->title;?><h3></span>
<?php if($vedicType == VedicType::Aarti || VedicType::Mantra){ ?>
<span><?php echo CHtml::link($addhead,array('addvedic','vedicType'=>$vedicType));?><span></div>
<?php } ?>
<div><?php echo $vedic->name_of_god;?></div>
<div><?php echo $vedic->text;?></div>
<?php } ?>


<?php/* $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/
?>
<div style="float:right width:30%">
<h3>Find more <?php echo $heading ?> here<h3>
<?php foreach($elementsList as $vedic){?>
<div><?php echo CHtml::link($vedic->title,array('vedicview','ved_title'=>$vedic->slug));?></div>
<?php } ?>
</div>