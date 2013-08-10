<?php
/**
 * Author: swapnil
 * File : view.php
 * Date: 3/9/12
 * Time: 6:17 PM
 */
?>
<div id="accordion" style="margin-bottom:10px !important;">
<h3>Show comments</h3>
<div class="single_comment">
    <h4><b><?php echo $comment->user->name; ?></b></h4>
        <abbr style="color:#A0A0A0" class="timeago" title="<?php echo date("c", strtotime($comment->created)); ?>">
            <?php echo $comment->created; ?>
        </abbr>
        <p><?php echo($comment->comment) ?></p>
    <span class="like-wrapper">
        <?php // $this->renderPartial('//comment/like',array('comment'=>$comment)) ?>
    </span>
</div>
</div>