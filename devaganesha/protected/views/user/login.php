<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<a class="fblogina" href="#"><span class="facebook_connect"></span></a>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
    'action'=>Yii::app()->createUrl('user/login'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe',array('style'=>'display:inline')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div>
        <?php echo CHtml::submitButton('Login',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
