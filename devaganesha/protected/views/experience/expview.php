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


   <div class="title-bar">&nbsp;<?php echo $model->title;?></div>
	<div class="mt10"><strong>Posted on : <?php echo $model->node->created; ?> | author : <?php echo $model->node->creator->name; ?></strong></div>
	<div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('experience/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
    <div class="blog-content">
        <div><?php echo html_entity_decode($model->text, ENT_COMPAT, "UTF-8"); ?></div>

    </div>
	
	<div class="mt20"><a href="<?php echo Yii::app()->createUrl('experience/index');?>">Back to  All</a></div>


