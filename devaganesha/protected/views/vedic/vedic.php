<?php
$this->breadcrumbs=array(
    VedicType::$heading[$vedicType] => array('vedic/vedic',array('vedicType'=>$vedicType))
);

$this->setPageTitle('All Aarti Mantra Shlokas for Lord Ganesha');
Yii::app()->clientScript->registerMetaTag('Get all the Aarti Mantra Shlokas for Ganesh Utsav.', 'description');
?>

    <div class="title-bar">&nbsp;<?php echo VedicType::$heading[$vedicType];?></div>
    <div class="btn"><?php echo CHtml::link("Add New ".VedicType::$heading[$vedicType],array('addvedic','type'=>$vedicType));?></div>

        <?php foreach($elementsList as $vedic){
    //$uname = User::model()->findByPk($vedic->user_id);
	
    ?>
		<div class="cont-disp">
            <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'slug'=>$vedic->slug))?>"><?php echo $vedic->title;?>(<?php echo $vedic->name_of_god;?>)</a>
            </div>
			
			<div class="mt10"><strong>Posted on : <?php echo $vedic->node->created; ?> | author : <?php echo $vedic->node->creator->name; ?></strong></div>
            <div class="blog-content"><?php echo html_entity_decode($vedic->text, ENT_COMPAT, "UTF-8");?></div>
           <div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'slug'=>$vedic->slug))?>">Leave reply </a></span>
		   </div>
            <div class="clear"></div>
          </div>
        <?php } ?>
		
	<div class="mt10">
	<?php $this->widget('CLinkPager', array(
		'pages' => $pages,
	)) ?>
	</div>