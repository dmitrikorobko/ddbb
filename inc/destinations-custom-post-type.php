<?php
/**
 * Get meta-box plugin
 */

require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');

/**
 * Register Destinations Post type 
 */

function create_posttype_destinations() {

    register_post_type( 'destinations',
        array(
            'labels' => array(
                'name' => __( 'Destinations' ),
                'singular_name' => __( 'Destinations' ),
                'add_new_item' => __('Add New Destination'),
                'new_item' => __('New Destination'),
                'edit_item' => __('Edit Destination'),
                'view_item' => __('View Destination'),
                'all_items' => __('All Destinations'),
                'search_items' => __('Search Destination'),
                'not_found' => __('No Destinations found.')
            ),
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt', 
                'custom-fields', 
                'revisions', 
                'post-formats'
            ),
            'public' => true,
			'has_archive' => false,	
			//'taxonomies'  => array( 'category' ),
            'rewrite' => array('slug' => 'destinations')
        )
    );
}

add_action( 'init', 'create_posttype_destinations' );

/**
 * Add svg meta-box
 */


function destinations_content_fields( $meta_boxes ) {
	$prefix = 'pr-';

	$meta_boxes[] = array(
		'id' => 'destinations-content',
		'title' => esc_html__( 'Destinations content', 'ddbb' ),
        'post_types' => array('destinations' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'destination_start_price',
				'type' => 'text',
				'name' => esc_html__( 'Destination Start Price', 'metabox-online-generator' ),
            ),
            array(
				'id' => $prefix . 'featured',
				'name' => esc_html__( 'Featured', 'metabox-online-generator' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Choose, if destination is featured.', 'metabox-online-generator' ),
			)
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'destinations_content_fields' );

?>