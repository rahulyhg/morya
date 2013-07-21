<?php
$this->breadcrumbs=array(
	'Vedics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vedic', 'url'=>array('index')),
	array('label'=>'Create Vedic', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vedic-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vedics</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vedic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'type',
		'name_of_god',
		'title',
		'slug',
		'text',
		/*
		'audio_path',
		'audio_length',
		'audio_size',
		'user_id',
		'created',
		'modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
