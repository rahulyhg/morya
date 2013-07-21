<?php
$this->breadcrumbs=array(
    'Experiences'=>array('index'),
    $model->title,
);
$this->menu=array(
    array('label'=>'Experiences', 'url'=>array('index')),
    array('label'=>'Add Your Experiences', 'url'=>array('create')),
);
?>

<div class="mid-region">
    <div class="tab">&nbsp;<?php echo $model->title;?></div>

    <div class="cont-disp">
        <div><p><?php echo $model->text; ?></p></div>
        <div style="float: right;text-decoration: none;">Posted By : <a href="#"><?php echo $model->user->name;?></a></div>
        <div class="clear"></div>
    </div>

</div>
<div>
    <div class="tab">Read More Experiences Here</div>
    <?php
    foreach($elements as $element){
        ?>
        <div><?php echo CHtml::link($element->title,array('expview','exp_title'=>$element->slug));?></div>
        <?php } ?>
</div>




<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'cooking_time',
		'ingredients',
		'method',
	),
)); */?>
