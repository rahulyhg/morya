<?php
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$photo->caption,
);
?>

<img style="width:400;height:" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name?>" />
<?php

?>