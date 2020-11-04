<?php
/**
 * Get meta-box plugin
 */

require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');

/**
 * Register Products Post type 
 */

function create_posttype_products() {

    register_post_type( 'products',
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Products' ),
                'add_new_item' => __('Add New Product'),
                'new_item' => __('New Product'),
                'edit_item' => __('Edit Product'),
                'view_item' => __('View Product'),
                'all_items' => __('All Products'),
                'search_items' => __('Search Product'),
                'not_found' => __('No products found.')
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
			'exclude_from_search' =>false,
            'public' => true,
			'has_archive' => 'products',	
			'taxonomies'  => array( 'category' ),
			'rewrite' => array('slug' => 'products',
			'pages' => true,
            'feeds' => true),
        )
    );
}

add_action( 'init', 'create_posttype_products' );

/**
 * Add svg meta-box
 */

function products_svg_field( $meta_boxes ) {
	$prefix = 'pr-';

	$meta_boxes[] = array(
		'id' => 'svg-thumb',
		'title' => esc_html__( 'Svg', 'ddbb' ),
		'post_types' => array('products' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'svg-file',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Product SVG image', 'ddbb' ),
				'max_file_uploads' => '1',
				'force_delete' => 'true',
				'max_status' => 'true',
			),
		),
	);

	return $meta_boxes;
}

function products_banner_fields( $meta_boxes ) {
	$prefix = 'pr-';

	$meta_boxes[] = array(
		'id' => 'banner-info',
		'title' => esc_html__( 'Banner informaton', 'ddbb' ),
		'post_types' => array('products' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'subtitle',
				'type' => 'text',
				'name' => esc_html__( 'Subtitle', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Subtitle for product banner', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'button_text',
				'type' => 'text',
				'name' => esc_html__( 'Button text', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Text for banner button', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'button_url',
				'type' => 'text',
                'name' => esc_html__( 'Button url', 'metabox-online-generator' ),
                'desc' => esc_html__( 'URL address for button', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}

function products_content_fields( $meta_boxes ) {
	$prefix = 'pr-';

	$meta_boxes[] = array(
		'id' => 'products-content',
		'title' => esc_html__( 'Products content', 'ddbb' ),
		'post_types' => array('products' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'short_desc',
				'type' => 'textarea',
				'name' => esc_html__( 'Product short description', 'metabox-online-generator' ),
				'placeholder' => esc_html__( 'Type short description', 'metabox-online-generator' ),
			),
            array(
				'id' => $prefix . 'heading',
				'type' => 'text',
				'name' => esc_html__( 'Main heading h2', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Heading for product description', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'img_description',
				'type' => 'text',
				'name' => esc_html__( 'Product image description', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'img_files',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Product image', 'ddbb' ),
				'max_file_uploads' => '1',
				'force_delete' => 'true',
				'max_status' => 'true',
			),
			array(
				'id' => $prefix . 'product_price',
				'type' => 'text',
				'name' => esc_html__( 'Product price', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'product_sale_price',
				'type' => 'text',
				'name' => esc_html__( 'Product sale price', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'product_sizes',
				'type' => 'text',
				'name' => esc_html__( 'Product sizes', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'product_sku',
				'type' => 'text',
				'name' => esc_html__( 'Product SKU', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'products_svg_field' );
add_filter( 'rwmb_meta_boxes', 'products_banner_fields' );
add_filter( 'rwmb_meta_boxes', 'products_content_fields' );

?>