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

    <div class="title-bar"><h2><?php echo $model->name_of_god;?>(<?php echo $model->title;?>)</h2></div>
	<div class="mt10"><strong>Posted on : <?php echo $model->node->created; ?> | author : <?php echo $model->node->creator->name; ?></strong></div>
	<div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('vedic/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
    <div class="blog-content">
        <div><?php echo html_entity_decode($model->text, ENT_COMPAT, "UTF-8"); ?></div>
      
    </div>
	
	<div class="mt20"><a href="<?php echo Yii::app()->createUrl('vedic/vedic',array('vedicType'=>$model->type));?>">Back to  All</a></div>
		<div id="comments">
			<div id="accordion" style="margin-bottom:10px !important;">
			
			<h3>Show comments</h3>
			<div class="single_comment">
			<?php
			if($model->node->comments){
				foreach($model->node->comments as $comment){
					$this->renderPartial('//comment/view',array('comment'=>$comment));
				}
			}else{
			echo "<p>Be the first one to give the comment.</p>";
			}
			?>
			</div>
			</div>
		<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
			
		</div>


