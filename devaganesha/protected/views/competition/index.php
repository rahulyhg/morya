<?php
$this->breadcrumbs=array(
	'Competitions',
);

$this->setPageTitle('Competitions');
Yii::app()->clientScript->registerMetaTag('Competition on photos, houshold ganesha, best Mandals and decoration.', 'description');
?>

<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head">Competitions</h2>
</div>
</div>

<div class="row-fluid mt10">
<?php foreach($dataProvider as $data){ ?>
<div class="span3 each-compit">
<div style="text-align:center;"><p class="comp-head"><?php echo $data->title;?></p></div>
<div><?php echo $data->description;?></div>
<div class="mt10">
	<div class="fl">
		<p><strong>Prizes: </strong></p>
		<p><?php echo $data->prizes;?></p>
		
	</div>
	<a href="<?php echo Yii::app()->createUrl('competition/view',array('slug'=>$data->slug));?>"><div class="fr parti-but">Participate &nbsp;&gt;&gt;</div></a>
	<div class="clear"></div>
</div>
</div>
<?php } ?>
</div>
