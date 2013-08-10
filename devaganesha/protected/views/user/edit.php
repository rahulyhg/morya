<?php
$this->breadcrumbs=array(
	'Edit Profile',
);
?>
<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>
<div class="title-bar">Edit your profile</div>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        'action'=>Yii::app()->createUrl('user/edit'),
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
    )); ?>

    <div>
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

	 <div>
        <?php echo $form->hiddenField($model,'password'); ?>
    </div>
	
    <div>
        <?php echo $form->labelEx($model,'contact'); ?>
        <?php echo $form->textField($model,'contact',array('class'=>'span8')); ?>
        <?php echo $form->error($model,'contact'); ?>
    </div>

	<div>
        <?php echo $form->labelEx($model,'ganpati_pic'); ?>
        <?php echo $form->fileField($model,'ganpati_pic'); ?>
        <?php echo $form->error($model,'ganpati_pic'); ?>
		<?php if($model->ganpati_pic){ ?>
		<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Profile].$model->id.".jpg"; ?>" width="100" height="100"/>
		<?php } ?>
    </div> 
	
	
    <div>
        <?php echo $form->labelEx($model,'add_line_1'); ?>
        <?php echo $form->textField($model,'add_line_1',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'add_line_1'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'add_line_2'); ?>
        <?php echo $form->textField($model,'add_line_2',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'add_line_2'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'city'); ?>
        <?php //echo $form->textField($model,'city',array('maxlength'=>50,'class'=>'span8')); ?>
		<?php $htmlOptions = array('class'=>'span8','style'=>'margin-bottom:5px','empty' => "Select city");?>
		<?php //echo Chosen::dropDownList($model->city,$model->city,$cityarr, $htmlOptions); 
		$this->widget('ext.chosen.Chosen',array(
			'name' => 'User[city]', // input name
			'value' => $model->city, // selection
			'data' =>$cityarr,
			'htmlOptions'=>$htmlOptions,
		));
		?>
        <?php echo $form->error($model,'city'); ?>
    </div>
	
	
    <div>
        <?php echo CHtml::submitButton('Update',array('class'=>'btn')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->