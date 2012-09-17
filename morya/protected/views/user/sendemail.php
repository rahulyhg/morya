<?php
/* @var $this UserController */
/* @var $model SendEmailForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Invite User';
$this->breadcrumbs=array(
	'Invite User',
);?>

<h1>Invite User</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Please fill out the following form to invite users to ganeshpics. Thank you!
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invite-user-form',
	'enableClientValidation'=>true,
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
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>