<?php
/**
 * Author: swapnil
 * File : view.php
 * Date: 3/9/12
 * Time: 6:17 PM
 */
?>
<div class="single_comment">
    <h3><?php echo $comment->user->name; ?></h3>
    <em class="comment_date">said on : <?php echo $comment->created; ?></em>
    <p><?php echo $comment->comment; ?></p>
    <span class="like-wrapper">
        <?php $this->renderPartial('//comment/like',array('comment'=>$comment)) ?>
    </span>
</div>