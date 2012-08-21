<?php
$this->breadcrumbs=array(
	'Vedics',
);

?>

<h1>Uttar Pooja</h1>
<p>jbdbhdbhbdhcbhdchhbdhbchdbchbdhkbhdbhkdbchbdhcbhdbchkbdchdbshckhdcdshbchkdbkhbcbkhdbchkb</P>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));

?>


<?php
$this->menu=array(
	array('label'=>'Add Arti', 'url'=>array('addvedic')),
	array('label'=>'Add Mantra', 'url'=>array('addmantra')),
	array('label'=>'Add Atharva Shirsha', 'url'=>array('addatharva')),
	array('label'=>'Add Uttar Pooja vidhi', 'url'=>array('addpooja')),
);

?>