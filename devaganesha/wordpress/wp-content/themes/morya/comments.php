<?php
/**
 * The template for displaying Comments.
 *
 * @package WordPress
 * @subpackage morya
 * @since morya
 */
?>

<div class="comments-pg">
<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>  
<?php endif; ?>  
      
<?php if(!empty($post->post_password)) : ?>  
    <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>  
    <?php endif; ?>  
<?php endif; ?>  
  
    <?php if($comments) : ?>  
        <ol>  
        <?php foreach($comments as $comment) : ?>  
            <li id="comment-<?php comment_ID(); ?>">  
                <?php if ($comment->comment_approved == '0') : ?>  
                    <p>Your comment is awaiting approval</p>  
                <?php endif; ?>  
                <?php comment_text(); ?>  
                <cite><?php comment_type(); ?> by <?php comment_author_link(); ?> on <?php comment_date(); ?> at <?php comment_time(); ?></cite>  
            </li>  
        <?php endforeach; ?>  
        </ol>  
    <?php else : ?>  
        <p>Be the first to give the comment</p>  
    <?php endif; ?>  
  

		<div class="lvrpl">Leave Reply</div>
    <?php if(comments_open()) : ?>  
        <?php if(get_option('comment_registration') && !$user_ID) : ?>  
            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>  
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">  
                <?php if($user_ID) : ?>  
                    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>  
                <?php else : ?>  
                    <div><label>Name <?php if($req) echo "(required)"; ?></label><input type="text" name="author" id="author" class="span12" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />  
                    </div>  
                    <div><label>Mail (will not be published) <?php if($req) echo "(required)"; ?></label><input type="text" name="email" id="email" class="span12" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />  
                    </div>  
                    <div> <label>Website</label><input type="text" name="url" id="url" class="span12" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />  
                    </div>  
                <?php endif; ?>  
                <div> <label>Comments</label><textarea name="comment" id="comment" rows="6" tabindex="4" class="span12"></textarea></div>  
                <div><input name="submit" type="submit" id="submit" class="btn" tabindex="5" value="Submit Comment" />  
                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>  
                <?php do_action('comment_form', $post->ID); ?>  
            </form>  
        <?php endif; ?>  
    <?php else : ?>  
        <p>The comments are closed.</p>  
    <?php endif; ?>  
	
	</div>