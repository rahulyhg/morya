<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Historic', 'url'=>array('index','templeType'=>TempleType::Historic)),
    array('label'=>'Most Popular', 'url'=>array('index','templeType'=>TempleType::Popular)),
    array('label'=>'Lalbaug cha Raja', 'url'=>$this->createAbsoluteUrl('page', array('view' => 'lalbuag'))),
);
?>


    <div class="title-bar"><?php echo $model->name;?></div>

		<div class="mt10"><strong>Posted on : <?php echo $model->node->created; ?> | author : <?php echo $model->node->creator->name; ?></strong></div>
		 <div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('temple/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
        <div class="mt10">
            <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$model->main_pic->file_name; ?>" height="200px" width="200px" class="fl mr10"/>
            <p><?php echo $model->description;?></p>

        </div>
        <div><strong>Established In  : </strong> <?php echo $model->established ?></div>
        <div class="mt10"><strong> How to reach : </strong><?php echo $model->how_to_go;?></div>
        <div  class="mt10"><p><strong>History : </strong><?php echo $model->history;?></p></div>
     
        <div class="mt10"><?php
            if(isset($model->pic1->file_name)){
                ?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$model->pic1->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
                <?php }
            if(isset($model->pic2->file_name)){?>
                <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$model->pic2->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
                <?php } ?>
            <?php if(isset($model->pic3->file_name)){?>
                <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$model->pic3->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
                <?php }
            if(isset($model->pic4->file_name)){?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$model->pic4->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
                <?php } ?></div>
				
				<div class="mt20"><a href="<?php echo Yii::app()->createUrl('temple/index');?>">Back to  All</a></div>
		<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>



