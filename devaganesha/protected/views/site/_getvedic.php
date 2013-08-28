     <div class="fl mt10 ml10">
	 <?php 
		foreach($vedics as $vedic){ ?>
		
            <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'slug'=>$vedic->slug))?>"><?php echo $vedic->name_of_god;?>(<?php echo $vedic->title;?>)</a>
            </div>
			
			<div class="mt10"><strong>Posted on : <?php echo $vedic->node->created; ?></strong></div>
			<div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'slug'=>$vedic->slug))?>">Leave reply </a></span>
		   <?php if($vedic->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('vedic/update',array('id'=>$vedic->id))?>">Edit</a></span>
			<span>&nbsp;|&nbsp;<?php echo CHtml::link('Delete','#',array("submit"=>array('vedic/delete','id'=>$vedic->id),"confirm" => "Are you sure?"));?></span>
		   <?php } ?>
		   </div>
            <div class="blog-content"><?php echo html_entity_decode($vedic->text, ENT_COMPAT, "UTF-8");?></div>
        <?php } ?>
		</div>