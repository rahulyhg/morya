<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage morya
 * @since morya
 */
?>
<div id="comments">
<div id="accordion" style="margin-bottom:10px !important;">

<h3>Show comments</h3>
<div class="single_comment">
<?php
global $post;
$cc = array_shift(Yii::app()->createController('comment'));
$post_id = $post->ID;
$node_id = get_post_meta( $post_id,'node_id', true );
$node = new Node ;
$nodem = $node->loadModel($node_id);
if($nodem->comments){
	foreach($nodem->comments as $comment){
		$cc->renderPartial('//comment/view',array('comment'=>$comment));
	}
}else{
echo "<p>Be the first one to give the comment.</p>";
}
?>
</div>
</div>
<?php 
$new_comment = new Comment ;
$new_comment->node_id = $node_id ;
Yii::app()->session['post_id'] = $post_id;
$cc->renderPartial('//comment/create',array('comment'=>$new_comment)); ?>
</div>