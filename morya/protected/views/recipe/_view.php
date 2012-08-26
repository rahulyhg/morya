<div class="view">

	<h2 style="text-align:center;"><?php echo CHtml::encode($data->title); ?></h2>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cooking_time')); ?>:</b>
	<?php echo CHtml::encode($data->cooking_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingredients')); ?>:</b>
	<?php echo CHtml::encode($data->ingredients); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('method')); ?>:</b>
	<?php echo CHtml::encode($data->method); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>