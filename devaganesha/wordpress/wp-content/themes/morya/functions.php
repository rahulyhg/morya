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
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	));
	
}
add_action( 'widgets_init', 'arphabet_widgets_init' );
