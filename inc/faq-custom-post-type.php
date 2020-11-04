<?php
/**
 * Get meta-box plugin
 */

require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');

/**
 * Register Faq Post type 
 */

function create_posttype_faq() {

    register_post_type( 'faq',
        array(
            'labels' => array(
                'name' => __( 'FAQ' ),
                'singular_name' => __( 'FAQ' ),
                'add_new_item' => __('Add New FAQ'),
                'new_item' => __('New FAQ'),
                'edit_item' => __('Edit FAQ'),
                'view_item' => __('View FAQ'),
                'all_items' => __('All FAQ'),
                'search_items' => __('Search FAQ'),
                'not_found' => __('No FAQ found.')
            ),
            'supports' => array(
                'title',
                'thumbnail',
                'excerpt', 
                'custom-fields', 
                'revisions', 
                'post-formats'
            ),
            'public' => true,
			'has_archive' => false,	
            'rewrite' => array('slug' => 'faq')
        )
    );
}

add_action( 'init', 'create_posttype_faq' );

/**
 * Add svg meta-box
 */

function faq_question_answer( $meta_boxes ) {
	$prefix = 'faq-';

	$meta_boxes[] = array(
		'id' => 'fasq',
		'title' => esc_html__( 'Questions and Answers', 'ddbb' ),
		'post_types' => array('faq' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'qa',
				'type' => 'fieldset_text',
				'name' => esc_html__( 'Faq Question and Answer', 'ddbb' ),
                'options' => array(
                    'question'    => 'Question ',
                    'answer' => 'Answer',
                ),
                'clone' => true,
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'faq_question_answer' );

?>