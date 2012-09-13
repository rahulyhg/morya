<?php
$this->breadcrumbs=array(
	'Temples',
);

$this->menu=array(
	array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
	array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
);

switch($templeType){
case TempleType::Historic : $heading = "Historic Temples";$addhead = "Add historic Temple";break;
case TempleType::Popular : $heading = "Most Popular Temples";$addhead = "Add Most popular Temple";break;
}
?>
<h1><?php echo $heading;?></h1>
<p><?php echo CHtml::link($addhead,array('create','templeType'=>$templeType));?></P>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 

$this->menu=array(
	array('label'=>$addhead, 'url'=>array('create','templeType'=>$templeType)),
	//array('label'=>'Manage Temple', 'url'=>array('admin')),
);*/
?>
<div class="mid-region">
    <div class="tab">&nbsp;<?php echo $heading;?></div>
    <div><?php echo CHtml::link("Add ".$heading,array('create','templeType'=>$templeType));?></div>

    <?php foreach($elementsList as $temple){ ?>
    <div class="cont-disp">
        <div class="title_head"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>"><?php echo $temple->name;?></a></div>

        <div><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb].$temple->primary_pic; ?>" height="100px" width="100px"/><?php echo $temple->description;?></div>
        <div><b>Established In : </b>&nbsp;<?php echo $temple->established;?></div>
        <div><b>How to reach : </b>&nbsp;<?php echo $temple->how_to_go;?></div>
        <div><b>History : </b>&nbsp;<?php echo $temple->history;?></div>
        <div><b>Other Pics : </b></div>
        <div class="clear"></div>
    </div>
    <?php } ?>
</div>