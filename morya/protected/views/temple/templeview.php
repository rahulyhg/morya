<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
    array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
);
?>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'description',
		'established',
		'how_to_go',
		'history',
	),
)); */

//$filename = Photo::model()->findByPk($model->primary_pic);
//$filename1 = Photo::model()->findByPk($model->secondary_pic1);
//$filename2 = Photo::model()->findByPk($model->secondary_pic2);
//$filename3 = Photo::model()->findByPk($model->secondary_pic3);
//$filename4 = Photo::model()->findByPk($model->secondary_pic4);

?>

<div class="mid-region">
    <div class="title_head"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$model->slug))?>"><?php echo $model->name;?></a></div>


    <div class="cont-disp">
        <p>
            <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$model->main_pic->file_name; ?>" height="200px" width="200px" style="padding: 5px;float: left;"/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->description;?>

        </p>
        <div><strong>Established In  :</strong> <?php echo $model->established ?></div>
        <div><strong> How to reach :</strong><?php echo $model->how_to_go;?></div>
        <div><p><strong>History :</strong><?php echo $model->history;?></p></div>
        <div><b>Other Pics : </b></div>
        <div><?php
            if(isset($temple->pic1->file_name)){
                ?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic1->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
                <?php }
            if(isset($temple->pic2->file_name)){?>
                <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic2->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
                <?php } ?>
            <?php if(isset($temple->pic3->file_name)){?>
                <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic3->file_name; ?>" height="200px" width="200px" style="padding: 5px" border="1px #000000"/>
                <?php }
            if(isset($temple->pic4->file_name)){?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic4->file_name; ?>" height="200px" width="200px" style="padding: 5px" border="1px #000000"/>
                <?php } ?></div>
        <div class="clear"></div>
    </div>

</div>
<div>
    <div class="tab">Get More Temples Here</div>
    <?php
    foreach($elements as $element){
        ?>
        <div><?php echo CHtml::link($element->name,array('temple/templeview','temple_name'=>$element->slug));?></div>
        <?php } ?>
</div>
