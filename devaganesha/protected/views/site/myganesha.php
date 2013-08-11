<div class="row-fluid">
<div class="mt10">
<div class="title-bar">Photos</div>
    <div id="container">
    <?php
         foreach($photos as $photo){
            $this->renderPartial('//photo/_single',array('photo'=>$photo));
        }
    ?>
     </div> 
</div>
<div class="mt10">
<div class="title-bar">Aarti and mantra</div>
	<div>
        <?php 
		if(!empty($vedics)){
		foreach($vedics as $vedic){
    ?>
		<div class="span6">
            <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'ved_title'=>$vedic->slug))?>"><?php echo $vedic->name_of_god;?>(<?php echo $vedic->title;?>)</a>
            </div>
			
			<div class="mt10"><strong>Posted on : <?php echo $vedic->node->created; ?></strong></div>
			<div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'ved_title'=>$vedic->slug))?>">Leave reply </a></span>
		   <?php if($vedic->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('vedic/update',array('id'=>$vedic->id))?>">Edit</a></span>
			<span>&nbsp;|&nbsp;<?php echo CHtml::link('Delete','#',array("submit"=>array('vedic/delete','id'=>$vedic->id),"confirm" => "Are you sure?"));?></span>
		   <?php } ?>
		   </div>
            <div class="blog-content"><?php echo html_entity_decode($vedic->text, ENT_COMPAT, "UTF-8");?></div>
           
            
          </div>
        <?php } 
		}else{?>
		
		<?php echo "<p>You haven't added any aarti or mantra yet.</p>";
		}
		?>
		<div class="clear"></div>
		</div>
</div>
<div class="mt10">
<div class="title-bar">Temples</div>
<div>
<?php 
	if(!empty($temples)){
	foreach($temples as $temple){
    ?>
    <div class="span6">
        <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>"><?php echo $temple->name;?></a></div>
		<div class="mt10"><strong>Posted on : <?php echo $temple->node->created; ?></strong></div>
		<div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('temple/templeview',array('temple_name'=>$temple->slug))?>">Leave reply </a></span>
			 <span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('temple/update',array('id'=>$temple->id));?>">Edit</a></span>
		     <span>&nbsp;|&nbsp;<?php echo CHtml::link('Delete','#',array("submit"=>array('temple/delete','id'=>$temple->id),"confirm" => "Are you sure?"));?></span>
		    </div>
        <div class="mt10">
             <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->main_pic->file_name; ?>" height="200px" width="200px" class="fl mr10"/>
             <p><?php echo html_entity_decode($temple->description, ENT_COMPAT, "UTF-8");?></p>

        </div>
        <div><b>Established In : </b>&nbsp;<?php echo $temple->established;?></div>
        <div class="mt10"><b>How to reach : </b>&nbsp;<?php echo html_entity_decode($temple->how_to_go, ENT_COMPAT, "UTF-8");?></div>
        <div class="mt10"><b>History : </b>&nbsp;<?php echo html_entity_decode($temple->history, ENT_COMPAT, "UTF-8");?></div>

        <div class="mt10"><?php
           if(isset($temple->pic1->file_name)){
           ?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic1->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
            <?php }
            if(isset($temple->pic2->file_name)){?>
               <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic2->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
            <?php } ?>
       <?php if(isset($temple->pic3->file_name)){?>
        <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic3->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
        <?php }
    if(isset($temple->pic4->file_name)){?><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$temple->pic4->file_name; ?>" height="100px" width="100px" style="padding: 5px" border="1px #000000"/>
    <?php } ?></div>
        <div class="clear"></div>
			
    </div>
    <?php }
	}else{ ?>
		<?php echo "<p>You haven't added any temple yet.</p>";?>
	<?php } ?>
	<div class="clear"></div>
</div>
</div>
<div class="mt10">
<div class="title-bar">Recipes</div>
<div>
  <?php 
  if(!empty($recipes)){
  foreach($recipes as $recipe){    ?>
    <div class="span6">

        <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>"><?php echo $recipe->title; ?></a></div>
 
        <div class="mt10"><strong>Posted on : <?php echo $recipe->node->created; ?></strong></div>
		<div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>">Leave reply </a></span>
	
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('recipe/update',array('id'=>$recipe->id));?>">Edit</a></span>
			   <span>&nbsp;|&nbsp;<?php echo CHtml::link('Delete','#',array("submit"=>array('recipe/delete','id'=>$recipe->id),"confirm" => "Are you sure?"));?></span>
		   </div>
        <div class="mt10">
		<?php 
		if(isset($recipe->rec_pic->file_name) && $recipe->rec_pic->file_name != '')
		{
			$recimg = PhotoType::$relativeFolderName[PhotoType::Screen].$recipe->rec_pic->file_name;
		}else{
			$recimg = get_template_directory_uri()."/img/recipe_noimg.jpg";
		}
		
		?>
		<img src="<?php echo $recimg; ?>" height="200px" width="200px" class="fl mr10"/>
			<p><strong>Ingradients :</strong></p>
            <p><?php echo html_entity_decode($recipe->ingredients, ENT_COMPAT, "UTF-8"); ?></p>
        </div>
		<div class="clear"></div>
		<div class="mt10"><strong> Cooking Time :</strong><?php echo $recipe->cooking_time;?></div>
        <div class="mt10"><strong> Method :</strong></div>
        <div><p><?php echo html_entity_decode($recipe->method, ENT_COMPAT, "UTF-8"); ?></p></div>

    </div>
    <?php }
	}else{
		echo "<p>You haven't added any recipe yet.</p>";
	} ?>
	<div class="clear"></div>
	</div>
</div>
<div class="mt10">
	<div class="title-bar">Experiences/ Ganesha Mahima / wishes</div>
	<div>
	   <?php 
	   if(!empty($experiences)){
	   foreach($experiences as $exp){ ?>
	 <div class="span6">

         <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug));?>"><?php echo $exp->title; ?></a></div>
         <div class="mt10"><strong>Posted on : <?php echo $exp->node->created; ?> | author : <?php echo $exp->node->creator->name; ?></strong></div>
		 <div><span> <a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug));?>">Leave reply </a></span>
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('experience/update',array('id'=>$exp->id));?>">Edit</a></span>
			   <span>&nbsp;|&nbsp;<?php echo CHtml::link('Delete','#',array("submit"=>array('experience/delete','id'=>$exp->id),"confirm" => "Are you sure?"));?></span>

		   </div>
		 
		<div class="blog-content"><?php echo html_entity_decode($exp->text, ENT_COMPAT, "UTF-8"); ?></div>
		
        <div class="clear"></div>

    </div>
    <?php }
	}else{
				echo "<p>You haven't share any experience of yours.</p>";
	}
	?>
	<div class="clear"></div>
	</div>
</div>
</div>
