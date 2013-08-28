<div class="mt10 ml10">
	   <?php 
	   foreach($experiences as $exp){ ?>

         <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug));?>"><?php echo $exp->title; ?></a></div>
         <div class="mt10"><strong>Posted on : <?php echo $exp->node->created; ?> | author : <?php echo $exp->node->creator->name; ?></strong></div>
		 <div><span> <a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug));?>">Leave reply </a></span>
		  <?php if($exp->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('experience/update',array('id'=>$exp->id));?>">Edit</a></span>
			   <span>&nbsp;|&nbsp;<?php echo CHtml::link('Delete','#',array("submit"=>array('experience/delete','id'=>$exp->id),"confirm" => "Are you sure?"));?></span>
		<?php } ?>
		   </div>
		 
		<div class="blog-content"><?php echo html_entity_decode($exp->text, ENT_COMPAT, "UTF-8"); ?></div>
		
        <div class="clear"></div>

    <?php }
	?>
</div>