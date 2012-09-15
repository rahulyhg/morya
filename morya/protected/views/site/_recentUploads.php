<?php foreach($elementsList as $photo){ ?>
    <a class="fancybox-thumb" href="<?php echo Yii::app()->request->baseUrl; ?>/upload/screen/<?php echo $photo->file_name; ?>" title="<?php echo $photo->caption; ?>">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/thumb/<?php echo $photo->file_name; ?> " style="width:60px;height:60px;margin:2px"  />
    </a>
<?php } ?>
