<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experience-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="controls">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>30,'class'=>'span12')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'text'); ?>
        <?php echo $form->textArea($model,'text',array('rows'=>10, 'cols'=>50,'class'=>'span12')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Share' : 'Save',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->