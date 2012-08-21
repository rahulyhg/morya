<?php
$this->breadcrumbs=array(
	'Vedics',
);
?>

<?php  

if($vedicType)
{?>
<h1>Aarti</h1>
<?php }else{ ?>
<h1>Other vedics</h1>
<?php }?>
<p>jbdbhdbhbdhcbhdchhbdhbchdbchbdhkbhdbhkdbchbdhcbhdbchkbdchdbshckhdcdshbchkdbkhbcbkhdbchkb</P>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

?>

<?php
$this->menu=array(
	array('label'=>'Add Arti', 'url'=>array('addvedic')),
	array('label'=>'Add Mantra', 'url'=>array('addvedic')),
	array('label'=>'Add Atharva Shirsha', 'url'=>array('addvedic')),
	array('label'=>'Add Uttar Pooja vidhi', 'url'=>array('addvedic')),
);
?>