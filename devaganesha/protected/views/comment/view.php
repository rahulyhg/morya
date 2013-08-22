<?php
/**
 * Author: swapnil
 * File : view.php
 * Date: 3/9/12
 * Time: 6:17 PM
 */
?>


		<div><div class="fl"><h4><b><?php echo $comment->user->name; ?></b></h4></div>
		<?php if($comment->user_id  == Yii::app()->user->id){ ?>
			<div class="fr"><a href="#"><i class="icon-remove"></i></a></div>
		<?php } ?>
		<div class="clear"></div></div>
        <abbr style="color:#A0A0A0" class="timeago" title="<?php echo date("c", strtotime($comment->created)); ?>">
            <?php echo $comment->created; ?>
        </abbr>
        <p><?php echo($comment->comment) ?></p>
		<hr/>
    <span class="like-wrapper">
        <?php // $this->renderPartial('//comment/like',array('comment'=>$comment)) ?>
    </span>

