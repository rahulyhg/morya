<?php

$this->breadcrumbs=array(
    VedicType::$heading[$model->type]=>array('vedic',array('vedicType'=>$model->type)),
	$model->title,
);

$this->menu=array(
    array(
        'label'=>'Aarti',
        'url'=>array('vedic','vedicType'=>VedicType::Aarti),
        'itemOptions'=>array(
            'class'=>'aarti_sidemenu selected_menu',
            'style'=>'height:220px;'
        ),
    ),
    array(
        'label'=>'Mantra Pushpanjali',
        'url'=>array('vedic','vedicType'=>VedicType::Mantra),
        'itemOptions'=>array('class'=>'mantrapushpanjali_menu'),
    ),
    array(
        'label'=>'Atharva shirsha',
        //'url'=>array('vedic','vedicType'=>VedicType::Atharva),
        'url'=>$this->createAbsoluteUrl('page', array('view' => 'atharva')),
        'itemOptions'=>array('class'=>'atharvashirsha_menu'),
    ),
    array('label'=>'Uttar Pooja', 'url'=>array('vedic/page','view'=>'pooja'),
        'itemOptions'=>array('class'=>'uttarpooja_menu')
    ),
    array(
        'label'=>'Ganesh Names',
        'url'=>$this->createAbsoluteUrl('page', array('view' => 'ganesh_names')),
        //'url'=>array('vedic','vedicType'=>VedicType::Pooja),
        'itemOptions'=>array('class'=>'uttarpooja_menu')
    )
);
?>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name_of_god',
		'title',
		'text',
	),
)); */?>
<div class="mid-region">
    <div class="tab">&nbsp;<?php echo $model->name_of_god;?>(<?php echo $model->title;?>)</div>

    <div class="cont-disp">
        <div style="text-align: center;"><?php echo $model->text; ?></div>
    </div>

</div>
<div>
    <div class="tab">Get More <?php echo VedicType::$heading[$model->type]; ?> Here</div>
    <?php
    foreach($elements as $element){
        ?>
        <div><?php echo CHtml::link($element->title,array('vedic/vedicview','ved_title'=>$element->slug));?></div>
        <?php } ?>
</div>
