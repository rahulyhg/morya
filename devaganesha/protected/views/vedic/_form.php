<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vedic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="controls">
		<?php echo $form->labelEx($model,'name_of_god'); ?>
		<?php echo $form->textField($model,'name_of_god',array('maxlength'=>255,'class'=>'span12 ')); ?>
		<?php echo $form->error($model,'name_of_god'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('maxlength'=>255,'class'=>'span12 ')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>10,'class'=>'span12 ','id'=>'vedic-editor')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
	<?php echo $form->hiddenField($model,'type',array('value'=>$vedicType)); ?>
	<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'btn btn-primary mt10')); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$(document).ready(function(){
	tinymce.init({
		selector: "#vedic-editor",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
});

</script>