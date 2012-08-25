<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vedic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
	<?php echo $form->hiddenField($model,'type',array('value'=>$vedicType)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->