<?php
add_theme_support( 'post-thumbnails' );

function home_news_excerpt( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'home_news_excerpt', 999 );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebars(2,array(
		'name'          => __('Sidebar %d'), $i,
		'id'            => "sidebar-$i",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="top-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title-bar">',
		'after_title'   => '</div>' 
	));
	
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


add_action( 'save_post', 'morya_create_node' );

function morya_create_node( $post_id ) {
	//verify post is not a revision
		$node = new Node ;
		$node->type = NodeType::Post ;
		$node->user_id = 0 ;
		if($node->save())
			add_post_meta($post_id, 'node_id',$node->id, true);
		
}
