<?php
$this->breadcrumbs=array(
    VedicType::$heading[$vedicType] => array('vedic/vedic',array('vedicType'=>$vedicType)),
	'add',
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
        'url'=>array('vedic','vedicType'=>VedicType::Atharva),
        'itemOptions'=>array('class'=>'atharvashirsha_menu'),
    ),
	array('label'=>'Uttar Pooja', 'url'=>array('vedic','vedicType'=>VedicType::Pooja),
        'itemOptions'=>array('class'=>'uttarpooja_menu')
        )
);
?>

<div class="title-bar">Add your new <?php echo VedicType::$heading[$vedicType];?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model ,'vedicType'=>$vedicType)); ?>