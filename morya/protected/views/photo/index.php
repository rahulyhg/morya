<?php
$this->breadcrumbs=array(
	'Ganesh Photos',
);?>
<div class="single-photo">
<?php
foreach($elementsList as $photo){
$this->renderPartial('_single',array('photo'=>$photo));
}
?>
</div>