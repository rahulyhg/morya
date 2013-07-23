<?php
add_theme_support( 'post-thumbnails' );

function home_news_excerpt( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'home_news_excerpt', 999 );