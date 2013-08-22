<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'action'=>Yii::app()->createUrl('user/register'),
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <div>
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>

    <div>
        <?php echo CHtml::submitButton('Register',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->