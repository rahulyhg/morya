		<?php foreach($sliderarr as $slide){
				//echo "cap=".$slider->node->caption;
			if($slide->type == 0){
		?>
				<section>

					<a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$slide->photoes->slug)) ?>"><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen] . $slide->photoes->file_name; ?>" alt="Australian road sign picturing a kangaroo" height="225px"></a>
					<p class="slider-text">
						<a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$slide->photoes->slug)) ?>"><strong><?php echo $slide->photoes->caption;?></strong></a>
					</p>
				</section>
			<?php }else if($slide->type == 2){ ?>
				<section>
						<a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$slide->temples->slug));?>"><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen] . $slide->temples->main_pic->file_name; ?>" alt="Australian road sign picturing a kangaroo" height="225px"></a>
						<p class="slider-text">
							<a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$slide->temples->slug)) ?>"><strong><?php echo $slide->temples->name;?></strong></a>
						</p>
				</section>
			<?php	}else if($slide->type == 4){
				if($slide->recepies->rec_pic->file_name != ''){
					$imgurl = PhotoType::$relativeFolderName[PhotoType::Screen] . $slide->recepies->rec_pic->file_name;
				}else{
					$imgurl = get_template_directory_uri()."/img/recipe_noimg.jpg";
				}
			?>
				<section>
						<a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$slide->recepies->slug));?>"><img src="<?php echo $imgurl; ?>" alt="No image" height="225px"></a>
						<p class="slider-text">
							<a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$slide->recepies->slug)); ?>"><strong><?php echo $slide->recepies->title;?></strong></a>
						</p>
				</section>
			<?php }else if($slide->type == 3){ ?>
			<section>
				<p><a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$slide->exp->slug));?>"><strong><?php echo $slide->exp->title; ?></strong></a></p>
				<p>--&nbsp;<?php echo $slide->creator->name; ?></p>
			</section>
			<?php	}
			} ?>