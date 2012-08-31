
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temple-form',
	'enableAjaxValidation'=>false,
)); ?>

<script type="text/javascript">
function uploadComplete(id, fileName, responseJSON){
$("#photoid").val() = responseJSON["id"];
}
</script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'established'); ?>
		<?php echo $form->textField($model,'established',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'established'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'how_to_go'); ?>
		<?php echo $form->textArea($model,'how_to_go',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'how_to_go'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history'); ?>
		<?php echo $form->textArea($model,'history',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'history'); ?>
	</div>
	<div class="row">
	<h1>Upload Temple's Photo</h1>
<input type="hidden" name="photo_id" />
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('photo/postUpload'),
               'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10,// minimum file size in bytes
               'onComplete'=>"js:uploadComplete",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->