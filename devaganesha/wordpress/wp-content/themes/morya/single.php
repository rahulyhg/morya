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
	<div class="title-head"><?php echo the_title() ; ?></div>
<?php
if(have_posts()) :
	while(have_posts()) : the_post();
?>	
	<div class="blogs">
		<div style="border-bottom:1px solid #cccccc;">
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style fl">
				<a class="addthis_button_facebook"></a>
			<a class="addthis_button_twitter"></a>
			<a class="addthis_button_pinterest_share"></a>
			<a class="addthis_button_email"></a>
			<a class="addthis_button_compact"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
			</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script>
		<div class="fr">
			<div><strong>Posted on : <?php the_date(); ?></strong></div>
			<div><strong>author : <?php the_author();?></strong></div>
		</div>
		<div class="clear"></div>
		</div>
		
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