<?php foreach($recipes as $recipe){
    //$user_name = User::model()->findByPk($recipe->user_id);
    //$pri_pic = Photo::model()->findByPk($recipe->primary_pic);
//echo $recipe->prime->file_name;
	$singlepage = Yii::app()->createUrl('recipe/recipeview',array('slug'=>$recipe->slug));
    ?>

    <div class="cont-disp">

        <div class="fnt24" style="text-align:center;"><a href="<?php echo $singlepage;?>"><?php echo $recipe->title; ?></a></div>

        <div class="mt10">
		<?php 
		if(isset($recipe->rec_pic->file_name) && $recipe->rec_pic->file_name != '')
		{
			$recimg = PhotoType::$relativeFolderName[PhotoType::Thumb].$recipe->rec_pic->file_name;
		}else{
			$recimg = get_template_directory_uri()."/img/recipe_noimg.jpg";
		}
		
		?>
			<div class="fl mr10"><img src="<?php echo $recimg; ?>" width="150" height="150"/></div>
			<div class="fl ml10">
			<p><strong> Cooking Time : </strong><?php echo $recipe->cooking_time;?> minutes</p>
			<p><strong>Ingradients : </strong><?php echo substr(strip_tags(html_entity_decode($recipe->ingredients, ENT_COMPAT, "UTF-8")),0,25)." ... "; ?><a href="<?php echo $singlepage;?>">Read More</a></p>
            <p><strong> Method : </strong><?php echo substr(strip_tags(html_entity_decode($recipe->method, ENT_COMPAT, "UTF-8")),0,50)." ... "; ?><a href="<?php echo $singlepage;?>">Read More</a></p>
			<p><strong>Posted on : </strong><?php echo $recipe->node->created; ?><strong> | author : </strong><a href="<?php echo Yii::app()->createUrl('site/myganesha',array('id'=>$recipe->node->user_id));?>"><?php echo $recipe->node->creator->name; ?></a></p>
			</div>
			<div class="clear"></div>
        </div>
		
        <div class="clear"></div>


    </div>
    <?php }?>