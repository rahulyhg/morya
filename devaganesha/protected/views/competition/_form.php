<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'class'=>'span12')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>10,'class'=>'span12')); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>
	
	<div>
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array(0=>'Photo',1=>'recipe')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>3,'class'=>'span12')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'instructions'); ?>
		<?php echo $form->textArea($model,'instructions',array('rows'=>3,'class'=>'span12')); ?>
		<?php echo $form->error($model,'instructions'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'prizes'); ?>
		<?php echo $form->textArea($model,'prizes',array('rows'=>3,'class'=>'span12')); ?>
		<?php echo $form->error($model,'prizes'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'organiser'); ?>
		<?php echo $form->textField($model,'organiser',array('size'=>60,'class'=>'span12')); ?>
		<?php echo $form->error($model,'organiser'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>60,'class'=>'span12')); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'class'=>'span12')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'class'=>'span12')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date',array('class'=>'datepicker')); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date',array('class'=>'datepicker')); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'winner_ann_date'); ?>
		<?php echo $form->textField($model,'winner_ann_date',array('class'=>'datepicker')); ?>
		<?php echo $form->error($model,'winner_ann_date'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->