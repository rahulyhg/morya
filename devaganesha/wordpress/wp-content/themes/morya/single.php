<?php
/*
Template Name: morya single page
*/
get_header(); 
?>

<div class="row-fluid mt10" >
<?php
get_sidebar('left');
?>


<div class="span6">
	<div class="title-bar"><?php echo the_title() ; ?></div>
<?php
if(have_posts()) :
	while(have_posts()) : the_post();
?>	
	<div class="blogs">
		<div>
			<img src="<?php echo get_template_directory_uri(); ?>/img/gan1.png" class="fl mr10" />
					<p class="fnt24 mt5"><a href="<?php echo the_permalink() ; ?>"><b><?php echo the_title() ; ?></b></a></p>
					<p>Posted on: <?php the_time(); ?> | author: <?php the_author();?></p>
		</div>
		<div class="clear"></div>
		<div class="blog-content">
			<?php the_content(); ?>
		</div>
		<div><span>posted in : <?php the_category(','); ?></span></div>
		<?php comments_template( '', true ); ?>
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