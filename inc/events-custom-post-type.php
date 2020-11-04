<?php
/**
 * Get meta-box plugin
 */

require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');

/**
 * Register events Post type 
 */

function create_posttype_events() {

    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Events' ),
                'add_new_item' => __('Add New Event'),
                'new_item' => __('New Event'),
                'edit_item' => __('Edit Event'),
                'view_item' => __('View Event'),
                'all_items' => __('All events'),
                'search_items' => __('Search Event'),
                'not_found' => __('No events found.')
            ),
            'supports' => array(
                'title',
                //'editor',
                'thumbnail',
                //'excerpt', 
                'custom-fields', 
                'revisions', 
                'post-formats'
            ),
            'public' => true,
			'has_archive' => false,	
			//'taxonomies'  => array( 'category' ),
            'rewrite' => array('slug' => 'events')
        )
    );
}

add_action( 'init', 'create_posttype_events' );

/**
 * Add svg meta-box
 */


function events_content_fields( $meta_boxes ) {
	$prefix = 'ev-';

	$meta_boxes[] = array(
		'id' => 'events-content',
		'title' => esc_html__( 'events content', 'ddbb' ),
        'post_types' => array('events' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'short_description',
                'type'    => 'wysiwyg',
                'raw'     => false,
                'options' => array(
                    'textarea_rows' => 4,
                    'teeny'         => true,
                ),
				'name' => esc_html__( 'Event Short Description', 'ddbb' ),
            ),
            array(
				'id' => $prefix . 'date',
				'type' => 'date',
                'name' => esc_html__( 'Event Date', 'ddbb' ),
                'js_options' => array(
                    'dateFormat'      => 'dd-mm-yy',
                ),
                'timestamp' => true,
			), array(
				'id' => $prefix . 'url',
				'type' => 'text',
				'name' => esc_html__( 'Event Booking URL', 'ddbb' ),
            ),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'events_content_fields' );

?>