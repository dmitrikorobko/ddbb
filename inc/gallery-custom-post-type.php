<?php
/**
 * Get meta-box plugin
 */

require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');

/**
 * Register Gallery Post type 
 */

function create_posttype_gallery() {

    register_post_type( 'gallery',
        array(
            'labels' => array(
                'name' => __( 'Gallery' ),
                'singular_name' => __( 'Gallery' ),
                'add_new_item' => __('Add New Gallery'),
                'new_item' => __('New Gallery'),
                'edit_item' => __('Edit Gallery'),
                'view_item' => __('View Gallery'),
                'all_items' => __('All Galleries'),
                'search_items' => __('Search Gallery'),
                'not_found' => __('No Galleries found.')
            ),
            'supports' => array(
                'title',
                'thumbnail',
                'custom-fields', 
                'revisions', 
                'post-formats'
            ),
            'public' => true,
			'has_archive' => false,	
            'rewrite' => array('slug' => 'gallery')
        )
    );
}

add_action( 'init', 'create_posttype_gallery' );

/**
 * Add svg meta-box
 */

function images_metabox( $meta_boxes ) {
	$prefix = 'gal-';

	$meta_boxes[] = array(
		'id' => 'gallery-custom',
		'title' => esc_html__( 'Gallery images', 'ddbb' ),
		'post_types' => array('gallery' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
            array(
				'id' => $prefix . 'subtitle',
				'type' => 'text',
				'name' => esc_html__( 'Subtitle for list with galleries', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'images',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Add images', 'ddbb' ),
                
            ),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'images_metabox' );

?>