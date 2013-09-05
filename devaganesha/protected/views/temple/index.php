<?php
$head = TempleType::$heading[$templeType];
$this->breadcrumbs=array(
	$head,
);
$this->setPageTitle('All the Temples and Mandals of Lord ganesh.');
Yii::app()->clientScript->registerMetaTag('Get the information about all the popular Temples and Mandals of lord ganesha all over the world. Ganesh mandals in mumbai, pune and all over maharashtra. Navsache ganpati wish full filling ganesh', 'description');
?>
	<div>
			<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head"><?php echo $head ;?></h2>
</div>
</div>
		<div class="fr mt10">
		<div class="btn"><?php echo CHtml::link("Add new $head ",array('create','type'=>$templeType));?></div>
		</div>
		<div class="clear"></div>
    </div>
	<hr/>
	<?php 
	$i = 1;
	foreach($elementsList as $temple){
	$singleurl = Yii::app()->createUrl('temple/templeview',array('slug'=>$temple->slug));
    ?>
    <div class="each-temple">
        <div class="fnt24" style="text-align:center;"><a href="<?php echo $singleurl;?>"><?php echo $temple->name;?></a></div>
        <div class="mt10" style="text-align:center;">
             <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb].$temple->main_pic->file_name; ?>" class="img-polaroid"/>
		</div>
		<div class="mt10"><?php echo substr(strip_tags(html_entity_decode($temple->description, ENT_COMPAT, "UTF-8")),0,50)." ... ";?><a href="<?php echo $singleurl;?>">Read More</a></div>
        <div><b>Established In : </b>&nbsp;<?php echo $temple->established;?></div>
        <div class="mt10"><b>How to reach : </b>&nbsp;<?php echo html_entity_decode($temple->how_to_go, ENT_COMPAT, "UTF-8");?></div>
        <div class="mt10"><b>History : </b><?php echo substr(strip_tags(html_entity_decode($temple->history, ENT_COMPAT, "UTF-8")),0,50)." ... ";?><a href="<?php echo $singleurl;?>">Read More</a></div>
		<div class="mt10"><strong>Posted on : <?php echo $temple->node->created; ?> | author : <a href="<?php echo Yii::app()->createUrl('site/myganesha',array('id'=>$temple->node->user_id));?>"><?php echo $temple->node->creator->name; ?></a></strong></div>
		<div class="mb10"><a href="<?php echo $singleurl;?>">Leave reply </a></div>
    </div>
	<?php if($i%2 == 0){ ?>
	 <div class="clear"></div>
	 <?php } ?>
    <?php 
		$i++;
	} ?>
	
	 <div class="clear"></div>
	 
	 <div class="mt10">
	<?php $this->widget('CLinkPager', array(
		'pages' => $pages,
	)) ?>
	</div>
