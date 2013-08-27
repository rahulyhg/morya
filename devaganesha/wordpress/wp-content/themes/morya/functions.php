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
   if ( 'page' == $_POST['post_type'] ||  'post' == $_POST['post_type']) 
   {
	//verify post is not a revision
		$node = new Node ;
		$node->type = NodeType::Post ;
		$node->user_id = 0 ;
		if($node->save())
			add_post_meta($post_id, 'node_id',$node->id, true);
	}
		
}

add_action( 'admin_init', 'morya_register_taxonomy_meta_boxes' );
function morya_register_taxonomy_meta_boxes()
{
	if ( !class_exists( 'RW_Taxonomy_Meta' ) )
		return;
	$meta_sections = array();
	$meta_section = array(
		'title'      => 'Node',             // section title
		'taxonomies' => array('category'), // list of taxonomies. Default is array('category', 'post_tag'). Optional
		'id'         => 'node',                 // ID of each section, will be the option name

		'fields' => array(                             // List of meta fields
			array(
				'name'    => 'Node Type',
				'id'      => 'node_type',
				'type'    => 'select',
				'options' => NodeType::$heading,
			),

		),
	);
	new RW_Taxonomy_Meta($meta_section);
}

function get_cat_by_node($node_type){
	$categories = get_categories();
	foreach($categories as $cat)
	{
		$meta = get_option('node');
		if (empty($meta)) $meta = array();
		if (!is_array($meta)) $meta = (array) $meta;
		$meta = isset($meta[$cat->term_id]) ? $meta[$cat->term_id] : array();
		$value = $meta['node_type'];
		if($value == $node_type) return $cat ; //returns the category object itself
	}
}
