<div>
<a href="<?php echo Yii::app()->createUrl('photo/view',array('id' => $photo->id)) ?>" >
<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" />
</a>
</div>