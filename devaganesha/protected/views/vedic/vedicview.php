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
)); */

//$uname = User::model()->findByPk($model->user_id);
?>

    <div class="title-bar">&nbsp;<?php echo $model->name_of_god;?>(<?php echo $model->title;?>)</div>
	<div class="mt10">Posted on : <?php echo $model->node->created; ?> | author : <?php //echo $vedic->user->name; ?></div>
	<div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('vedic/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
    <div class="blog-content">
        <div><?php echo $model->text; ?></div>
      
    </div>
	
	<?php comments_template( '', true ); ?>


