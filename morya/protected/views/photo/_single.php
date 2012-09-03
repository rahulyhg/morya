<li class="tj_row_1">
    <div class="grid_2 photo_thumb">
        <h3><?php $photo->caption ;?></h3>
        <?php
        $img = PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name;
        list($width, $height, $type, $attr) = getimagesize($img);
        ?>
        <a href="<?php echo Yii::app()->createUrl('photo/view',array('id'=>$photo->id)) ?>">
            <img src="<?php echo $img ;?>" style="width:<?php echo PhotoType::$dimension[PhotoType::Thumb]['width'] ?>px;height:<?php echo  PhotoType::$dimension[PhotoType::Thumb]['height'] ?>px;" />
        </a>
        <div class="white_mask_wrapper">
            <div class="white_mask">
                <span class="darshan"><p>789</p></span>
                <span class="modak"><p>789</p></span>
                <span class="add_collection"><p>789</p></span>
            </div>
        </div>
    </div>
</li>