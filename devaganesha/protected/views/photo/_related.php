 <?php foreach($elementsList as $photo){ ?>
				<div class="small-pin">
					<a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>">
						<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" alt="">
					</a>
				</div>
		  <?php } ?>