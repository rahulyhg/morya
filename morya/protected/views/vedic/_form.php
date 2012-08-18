<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vedic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_of_god'); ?>
		<?php echo $form->textField($model,'name_of_god',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name_of_god'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textArea($model,'slug',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'audio_path'); ?>
		<?php echo $form->textField($model,'audio_path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'audio_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'audio_length'); ?>
		<?php echo $form->textField($model,'audio_length'); ?>
		<?php echo $form->error($model,'audio_length'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'audio_size'); ?>
		<?php echo $form->textField($model,'audio_size',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'audio_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->