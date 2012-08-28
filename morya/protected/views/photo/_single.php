<li class="tj_row_1">
    <div class="grid_3 photo_thumb">
        <h3><?php $photo->caption ;?></h3>
        <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" style="width:220px;height:220px" />
        <div class="white_mask_wrapper">
            <div class="white_mask">
                <span class="darshan"><p>789</p></span>
                <span class="modak"><p>789</p></span>
                <span class="add_collection"><p>789</p></span>
            </div>
        </div>
    </div>
</li>