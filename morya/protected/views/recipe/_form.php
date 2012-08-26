<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recipe-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cooking_time'); ?>
		<?php echo $form->textField($model,'cooking_time'); ?>
		<?php echo $form->error($model,'cooking_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingredients'); ?>
		<?php echo $form->textArea($model,'ingredients',array('rows'=>4, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ingredients'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'method'); ?>
		<?php echo $form->textArea($model,'method',array('rows'=>8, 'cols'=>50)); ?>
		<?php echo $form->error($model,'method'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->