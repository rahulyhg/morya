<?php 
/**
 * Template Name: Left Sidebar Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 */
?>
<div class="span3">
	<div class="top-widget">
		<div class="title-bar">Find more</div>
			<ul>
				<?php wp_list_pages(); ?>
			</ul>
	</div>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>