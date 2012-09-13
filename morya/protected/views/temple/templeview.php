<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
    array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
);
?>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'description',
		'established',
		'how_to_go',
		'history',
	),
)); */?>

<div class="mid-region">
    <div class="tab">&nbsp;<?php echo $model->name;?></div>

    <div class="cont-disp">
        <div><?php echo $model->description; ?></div>
        <div><strong>Established In  :</strong> <?php echo $model->established ?></div>
        <div><strong> How to reach :</strong><?php echo $model->how_to_go;?></div>
        <div><p><strong>History :</strong><?php echo $model->history;?></p></div>
    </div>

</div>
<div>
    <div class="tab">Get More Temples Here</div>
    <?php
    foreach($elements as $element){
        ?>
        <div><?php echo CHtml::link($element->name,array('temple/templeview','temple_name'=>$element->slug));?></div>
        <?php } ?>
</div>
