<?php

$this->breadcrumbs=array(
    VedicType::$heading[$model->type]=>array('vedic',array('type'=>$model->type)),
	$model->title,
);


?>
    <div class="title-bar"><?php echo $model->name_of_god;?>(<?php echo $model->title;?>)</div>
	<div class="mt10"><strong>Posted on : <?php echo $model->node->created; ?> | author : <?php echo $model->node->creator->name; ?></strong></div>
	<div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('vedic/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
    <div class="blog-content">
        <div><?php echo html_entity_decode($model->text, ENT_COMPAT, "UTF-8"); ?></div>
      
    </div>
	
	<div class="mt20"><a href="<?php echo Yii::app()->createUrl('vedic/vedic',array('type'=>$model->type));?>">Back to  All</a></div>
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


