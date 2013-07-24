<?php
$this->breadcrumbs=array(
	'Temples',
);

switch($templeType){
    case TempleType::Historic : $heading = "Historic Temples";$addhead = "Add historic Temple";break;
    case TempleType::Popular : $heading = "Most Popular Temples";$addhead = "Add Most popular Temple";break;
}

$this->menu=array(
    array('label'=>$addhead, 'url'=>array('create','templeType'=>$templeType)),
	array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
	array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
    array('label'=>'Ganesh Names', 'url'=>$this->createAbsoluteUrl('vedic/page', array('view' => 'ganesh_names'))),
    array('label'=>'Lalbaug cha Raja', 'url'=>$this->createAbsoluteUrl('temple/page', array('view' => 'lalbuag'))),
);


?>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

$this->menu=array(
	array('label'=>$addhead, 'url'=>array('create','templeType'=>$templeType)),
	//array('label'=>'Manage Temple', 'url'=>array('admin')),
);*/
?>

    <div class="title-bar">&nbsp;<?php echo $heading;?></div>
	<div class="btn"><?php echo CHtml::link("Add new Temples",array('create','templeType'=>$templeType));?></div>

    <?php foreach($elementsList as $temple){
    ?>
    <div class="cont-disp">
        <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>"><?php echo $temple->name;?></a></div>
		<div class="mt10">Posted on : <?php echo $temple->node->created; ?> | author : <?php //echo $vedic->user->name; ?></div>
        <div class="mt10">
             <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->main_pic->file_name; ?>" height="200px" width="200px" class="fl mr10"/>
             <p><?php echo $temple->description;?></p>

        </div>
        <div><b>Established In : </b>&nbsp;<?php echo $temple->established;?></div>
        <div class="mt10"><b>How to reach : </b>&nbsp;<?php echo $temple->how_to_go;?></div>
        <div class="mt10"><b>History : </b>&nbsp;<?php echo $temple->history;?></div>

        <div class="mt10"><?php
           if(isset($temple->pic1->file_name)){
           ?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic1->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
            <?php }
            if(isset($temple->pic2->file_name)){?>
               <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic2->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
            <?php } ?>
       <?php if(isset($temple->pic3->file_name)){?>
        <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic3->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
        <?php }
    if(isset($temple->pic4->file_name)){?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic4->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
    <?php } ?></div>
        <div class="clear"></div>
				<div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>">Leave reply </a></span>
		   <?php if($temple->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('temple/update',array('id'=>$temple->id));?>">Edit</a></span>
		   <?php } ?>
		   </div>
    </div>
    <?php } ?>
