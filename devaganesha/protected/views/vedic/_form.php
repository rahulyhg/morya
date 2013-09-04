<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vedic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="controls">
		<?php echo $form->labelEx($model,'name_of_god'); ?>
		<?php echo $form->dropDownList($model,'name_of_god',VedicType::$godnames); ?>
		<?php echo $form->error($model,'name_of_god'); ?>
	</div>

	<div class="controls">
		<label>Title for <?php echo  VedicType::$heading[$vedicType];?></label>
		<?php echo $form->textField($model,'title',array('maxlength'=>255,'class'=>'span12 ')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="controls">
		<label><?php echo  VedicType::$heading[$vedicType];?></label>
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
		menubar:false,
		statusbar: false,
		toolbar: "bold italic underline | alignleft aligncenter alignright | outdent indent"
	});
});

</script>