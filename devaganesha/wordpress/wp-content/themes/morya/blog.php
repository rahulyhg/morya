<?php
/*
Template Name: morya blog page
*/
get_header(); 
?>

<div class="row-fluid mt10" >
<?php
get_sidebar('left');
?>


<div class="span6">
	<div class="title-bar">Blogs</div>
<?php
query_posts('showposts=10');
if(have_posts()) :
	while(have_posts()) : the_post();
?>	
	<div class="blogs">
		<div>
			<img src="<?php echo get_template_directory_uri(); ?>/img/gan1.png" class="fl mr10" />
					<p class="fnt24 mt5"><a href="<?php echo the_permalink() ; ?>"><b><?php echo the_title() ; ?></b></a></p>
					<p><strong>Posted on: <?php the_date(); ?> | author: <?php the_author();?></strong></p>
					
		</div>
		<div class="clear"></div>
		<div class="blog-content">
			<?php the_excerpt(); ?>
		</div>
		<div><span>posted in : <?php the_category(','); ?> </span> | <span> <a href="<?php echo the_permalink() ; ?>">Leave reply </a></span></div>
	
	</div>
	
		<?php

	endwhile ;
endif;
?>
</div>
		<?php
get_sidebar('right');
?>
</div>

<?php get_footer(); ?>