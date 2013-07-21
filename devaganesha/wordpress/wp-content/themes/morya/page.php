<?php
/*
Template Name: morya static page
*/
get_header(); 
?>
<div class="row-fluid mt10" >
<?php
get_sidebar('left');
?>
		<div id="primary" class="span6">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
				<div class="title-bar"><strong><?php the_title(); ?></strong></div>

					<?php  the_content(); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php
get_sidebar('right');
?>
</div>
<?php get_footer(); ?>