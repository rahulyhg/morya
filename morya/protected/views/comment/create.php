<div class="form">

<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
));
?>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_id'); ?>
		<?php echo $form->hiddenField($model,'photo_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'photo_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>
		
	<div class="row buttons">
		<?php echo CHtml::submitButton('Comment'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->