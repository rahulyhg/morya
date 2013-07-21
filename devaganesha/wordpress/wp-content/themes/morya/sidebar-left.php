<?php 
/**
 * Template Name: Left Sidebar Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 */
?>
<div class="span3">
<div class="title-bar"><strong>See more</strong></div>
<ul>
<li><strong>more links</strong>
	<ul>
		<?php wp_list_pages(); ?>
	</ul>
</li>
</ul>
</div>