<?php
$this->breadcrumbs=array(
    VedicType::$heading[$vedicType]
);

$this->setPageTitle('All Aarti Mantra Shlokas for Lord Ganesha');
Yii::app()->clientScript->registerMetaTag('Get all the Aarti Mantra Shlokas for Ganesh Utsav.', 'description');
?>

    <div class="title-head">&nbsp;<?php echo VedicType::$heading[$vedicType];?></div>
    <div class="btn fr"><?php echo CHtml::link("Add New ".VedicType::$heading[$vedicType],array('addvedic','type'=>$vedicType));?></div>
	<div class="clear"></div>
	<hr/>
        <?php foreach($elementsList as $vedic){
    //$uname = User::model()->findByPk($vedic->user_id);
	
    ?>
		<div>
            <div class="fnt24 fl"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('slug'=>$vedic->slug))?>"><?php echo $vedic->title;?> - <?php echo VedicType::$godnames[$vedic->name_of_god];?></a>
            </div>
			<!--<div class="fr" style="margin-top:-5px;"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('slug'=>$vedic->slug))?>"><span class="btn" title="view"><i class="icon-eye-open"></i>&nbsp;View</span></a></div>-->
            <div class="clear"></div>
			<hr/>
          </div>
        <?php } ?>
		
	<div class="mt10">
	<?php $this->widget('CLinkPager', array(
		'pages' => $pages,
	)) ?>
	</div>