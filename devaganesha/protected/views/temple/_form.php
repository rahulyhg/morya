
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temple-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<script type="text/javascript">
    var uploaded = 0;
function templeUploadComplete(id, fileName, responseJSON){
    //echo responseJSON;
    if(responseJSON.id){
        switch(uploaded){
            case 0 : $("#photo_id").append('<input type="hidden" name="Temple[primary_pic]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  1 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic1]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  2 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic2]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  3 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic3]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
            case  4 : $("#photo_id").append('<input type="hidden" name="Temple[secondary_pic4]" value="' + responseJSON.id + '" />');
                uploaded = uploaded + 1;
                break;
        }
    }
}
</script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="controls">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>255,'class'=>'span12')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6,'class'=>'span12','id'=>'temple-desc')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'established'); ?>
		<?php echo $form->textField($model,'established',array('size'=>4,'maxlength'=>4,'class'=>'span12')); ?>
		<?php echo $form->error($model,'established'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'how_to_go'); ?>
		<?php echo $form->textArea($model,'how_to_go',array('rows'=>6,'class'=>'span12','id'=>'how-to-go')); ?>
		<?php echo $form->error($model,'how_to_go'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'history'); ?>
		<?php echo $form->textArea($model,'history',array('rows'=>6,'class'=>'span12','id'=>'temple-history')); ?>
		<?php echo $form->error($model,'history'); ?>
	</div>
	<div id="photo_id"></div>
<?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Temple)),
               'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10,// minimum file size in bytes
               'onComplete'=>"js:templeUploadComplete",
			   'uploadButtonText'=>'Upload temples image here',
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
));
?>
	
	<div class="controls mt10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$(document).ready(function(){
	tinymce.init({
		selector: "#temple-desc",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	tinymce.init({
		selector: "#how-to-go",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	tinymce.init({
		selector: "#temple-history",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
});

</script>