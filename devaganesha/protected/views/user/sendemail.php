<?php
/* @var $this UserController */
/* @var $model SendEmailForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Invite User';
$this->breadcrumbs=array(
	'Invite User',
);?>


<p>
Please fill out the following form to invite users to devaganesha. Thank you!
</p>

<?php 
// Begin Popup widget
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'invite-user',
	'options'=>array(
		'title'=>Yii::t('invite', 'Invite User'),
		'autoOpen'=>true,
		'modal'=>'true',
		'width'=>'auto',
		'height'=>'auto',
	),
));
?>
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'invite-user-form',
		'enableClientValidation'=>true,
	    'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	
		<p class="note">Fields with <span class="required">*</span> are required.</p>
	
		<?php echo $form->errorSummary($model); ?>
	
		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('title' => "Enter Your Name", 'placeholder' => "Enter Your Name", 'id' => "invitee-name")); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email', array('title' => "Enter Friend's Email", 'placeholder' => "Enter Friend's Email", 'id' => "invite-email")); ?><br>
			<span id="invite-email-hint">(For multiple users use comma separated list. e.g. user1@example.com,user2@example.com)</span>
			<?php echo $form->error($model,'email'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'subject'); ?>
			<?php echo $form->textField($model,'subject',array('size'=>50, 'maxlength'=>128, 'title' => "Enter Subject", 'placeholder' => "Enter Subject", 'id' => "invite-subject")); ?>
			<?php echo $form->error($model,'subject'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'body'); ?>
			<?php echo $form->textArea($model,'body', array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'body'); ?>
		</div>
	
		<?php //if(CCaptcha::checkRequirements()): ?>
		<div class="row">
			<?php //echo $form->labelEx($model,'verifyCode'); ?>
			<div>
			<?php //$this->widget('CCaptcha'); ?>
			<?php //echo $form->textField($model,'verifyCode'); ?>
			</div>
			<!-- <div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div> -->
			<?php //echo $form->error($model,'verifyCode'); ?>
		</div>
		<?php //endif; ?>
	
		<div class="row">
			<?php echo CHtml::ajaxSubmitButton(Yii::t('submit','Send'),
					CHtml::normalizeUrl(array('user/sendemail','render'=>false)),array('success'=>'js: function(data) {
	                        $("#invite-user").dialog("close");
	                    }'),array('id'=>'closeInviteUserDialog')); ?>
		</div>
	
	<?php $this->endWidget(); ?>
	
	</div><!-- form -->
<?php 
// End Popup widget
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>