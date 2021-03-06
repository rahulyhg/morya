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
		<label><?php echo MahimaType::$heading[$type];?></label>
        <?php echo $form->textArea($model,'text',array('rows'=>10, 'cols'=>50,'class'=>'span12','id'=>'exp-editor')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
		<?php echo $form->hiddenField($model,'type',array('value'=>$type)); ?>
	<div class="controls">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Share' : 'Save',array('class'=>'btn btn-primary mt10')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$(document).ready(function(){
	tinymce.init({
		selector: "#exp-editor",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
});

</script>