  <?php foreach($elementsList1 as $temple){ ?>
                    <li><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>">
					<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Mini] . $temple->main_pic->file_name; ?>" width="75" height="75" alt="" /></a>
					<a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>"><?php echo $temple->name;?></a>
					</li>
  <?php } ?>