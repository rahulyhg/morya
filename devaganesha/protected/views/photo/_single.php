<!--<li class="tj_row_1">
    <div class="photo_thumb">
        <h3><?php //$photo->caption ;?></h3>
        <?php
       // $img = PhotoType::$folderName[PhotoType::Thumb] . $photo->file_name;
        //list($width, $height, $type, $attr) = getimagesize($img);
        ?>
        <a href="<?php // echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>">
            <img src="<?php //echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" style="width:<?php //echo PhotoType::$dimension[PhotoType::Thumb]['width']; ?>px;height:<?php //echo  PhotoType::$dimension[PhotoType::Thumb]['height'] ?>px;" />
        </a>
        <div class="white_mask_wrapper">
            <div class="white_mask">
                <span class="darshan"><p>789</p></span>
                <span class="modak"><p><?php //echo count($photo->node->modaks); ?></p></span>
                <div class="add_collection">
				<a class="addthis_button_compact"></a>
				</div>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script>
            </div>
        </div>
    </div>
</li> -->
       <?php
        $img = PhotoType::$folderName[PhotoType::Screen] . $photo->file_name;
        list($width, $height, $type, $attr) = getimagesize($img);
        ?>

		<div class="pin">
		  <div class="white_mask_wrapper">
            <div class="white_mask">
                <span class="darshan"><p>789</p></span>
                <span class="modak"><p><?php //echo count($photo->node->modaks); ?></p></span>
                <div class="add_collection">
				<a class="addthis_button_compact"></a>
				</div>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script>
            </div>
        </div>
			<a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>"><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen] . $photo->file_name ;?>" alt=""></a>
			
			<div class="description"><a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>"><?php echo $photo->caption; ?></a></div>
			<?php if($photo->description){?>
			<div class="description"><strong>Tags : </strong><?php echo $photo->description; ?></div>
			<?php } ?>
			<div class="convo">
      			
				<?php if(!$photo->node->creator->ganpati_pic){ ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/prof.gif" alt="pp" />
				<?php }else{ ?>
				<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Profile].$photo->node->creator->id.".jpg"; ?>" alt="pp" width="40" height="40"/>
				<?php } ?>
		        <p>
		          <a href=""><?php echo $photo->node->creator->name; ?></a>
		        </p>
       		</div>
		</div>