<?php
/**
 * Get meta-box plugin
 */

require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');

/**
 * Register Catalog Post type 
 */

function create_posttype_catalog() {

    register_post_type( 'catalog',
        array(
            'labels' => array(
                'name' => __( 'Catalog' ),
                'singular_name' => __( 'Catalog' ),
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
			'has_archive' => 'catalog',	
			'taxonomies'  => array( 'catalog_categories' ),
            'rewrite' => array('slug' => 'catalog/%catalog_categories%',
            'pages' => true,
            'feeds' => true),
        )
    );
}

add_action( 'init', 'create_posttype_catalog', 9 );

function catalog_categories_taxonomy() {
 
    $catalog_cats = array(
      'name' => _x( 'Catalog Categories', 'taxonomy general name' ),
      'singular_name' => _x( 'Category', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Categories' ),
      'all_items' => __( 'All Categories' ),
      'parent_item' => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item' => __( 'Edit Category' ), 
      'update_item' => __( 'Update Category' ),
      'add_new_item' => __( 'Add New Category' ),
      'new_item_name' => __( 'New Category' ),
      'menu_name' => __( 'Categories' ),
    );    
   
    register_taxonomy('catalog_categories',array('catalog'), array(
      'hierarchical' => true,
      'labels' => $catalog_cats,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'catalog', 'pages' => true,
      'feeds' => true),
    ));
   
  }

add_action( 'init', 'catalog_categories_taxonomy', 8 );

/*
* Rewrite rules
*/

add_filter('post_type_link', 'catalog_permalink_structure', 10, 4);
function catalog_permalink_structure($post_link, $post, $leavename, $sample)
{
    if ( false !== strpos( $post_link, '%catalog_categories%' )) {
        $event_type_term = get_the_terms( $post->ID, 'catalog_categories' );
        if ($event_type_term){
            $post_link = str_replace( '%catalog_categories%', array_pop( $event_type_term )->slug, $post_link );
        } else {
            $post_link = str_replace( '/%catalog_categories%', '', $post_link );
            //$rules = array();
            //$rules[$post_type_slug . '/?$'] = 'index.php?' . $term->taxonomy;
            //$wp_rewrite->rules = $rules + $wp_rewrite->rules;
        }
        
    }
    return $post_link;
}

function generate_taxonomy_rewrite_rules( $wp_rewrite ) {
    $rules = array();
    $post_types = get_post_types( array( 'name' => 'catalog', 'public' => true, '_builtin' => false ), 'objects' );
    $taxonomies = get_taxonomies( array( 'name' => 'catalog_categories', 'public' => true, '_builtin' => false ), 'objects' );
    foreach ( $post_types as $post_type ) {
      $post_type_name = $post_type->name; //
      $post_type_slug = $post_type->rewrite['slug']; // 

      foreach ( $taxonomies as $taxonomy ) {
        if ( $taxonomy->object_type[0] == $post_type_name ) {
          $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
          foreach ( $terms as $term ) {
            //$rules[$post_type_slug . '/' . $term->slug .  '/'. $post_slug .'/?$'] = 'index.php?' . $post_type_slug . '=' . $post_slug;
            $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
            $rules[$post_type_slug . '/' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=' . $wp_rewrite->preg_index( 1 );
          }
        }
      }
    }

    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
  }
add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');

//flush_rewrite_rules();
function catalog_price_fields( $meta_boxes ) {
	$prefix = 'cat-';

	$meta_boxes[] = array(
		'id' => 'catalog-price',
		'title' => esc_html__( 'Product price / stock', 'ddbb' ),
		'post_types' => array('catalog' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
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
				'id' => $prefix . 'product_price_tk',
				'type' => 'text',
                'name' => esc_html__( 'Product price per x(tk)', 'metabox-online-generator' ),
                'desc' => esc_html__( 'Fill if price for more than 1tk', 'metabox-online-generator' )
            ),
            array(
				'id' => $prefix . 'product_stock',
				'name' => esc_html__( 'In Stock', 'metabox-online-generator' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Check if product in stock', 'metabox-online-generator' ),
            ),
            array(
				'id' => $prefix . 'product_popular',
				'name' => esc_html__( 'Is popular product', 'metabox-online-generator' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Check if you want to place it on main page', 'metabox-online-generator' ),
			),
			
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'catalog_price_fields' );

function catalog_addprice_fields( $meta_boxes ) {
	$prefix = 'cat-';

	$meta_boxes[] = array(
		'id' => 'catalog-addprice',
		'title' => esc_html__( 'Additional prices', 'ddbb' ),
		'post_types' => array('catalog' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'product_addprice',
				'type' => 'text',
				'name' => esc_html__( 'Product price', 'metabox-online-generator' ),
			),
            array(
				'id' => $prefix . 'product_addprice_tk',
				'type' => 'text',
                'name' => esc_html__( 'Product price per x(tk)', 'metabox-online-generator' ),
                'desc' => esc_html__( 'Fill if price for more than 1tk', 'metabox-online-generator' )
            ),
            array(
				'id' => $prefix . 'product_addprice2',
				'type' => 'text',
				'name' => esc_html__( 'Product price', 'metabox-online-generator' ),
			),
            array(
				'id' => $prefix . 'product_addprice2_tk',
				'type' => 'text',
                'name' => esc_html__( 'Product price per x(tk)', 'metabox-online-generator' ),
                'desc' => esc_html__( 'Fill if price for more than 1tk', 'metabox-online-generator' )
            ),
            
			
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'catalog_addprice_fields' );

function catalog_images_metabox( $meta_boxes ) {
	$prefix = 'cat-';

	$meta_boxes[] = array(
		'id' => 'catalog-gallery',
		'title' => esc_html__( 'Gallery images', 'ddbb' ),
		'post_types' => array('catalog' ),
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

add_filter( 'rwmb_meta_boxes', 'catalog_images_metabox' );

function add_bread($post_id, $taxonomy){

    $post_type_obj = get_post_type_object( 'catalog' );
    $current_term = get_queried_object();

  
    echo '<a href="' . get_post_type_archive_link( 'catalog' ) . '">' . $post_type_obj->labels->name . '</a>';

    if (!is_post_type_archive('catalog')){
        $terms = wp_get_post_terms( $post_id, $taxonomy, array( "fields" => "ids" ) ); // getting the term IDs
        if( $terms ) {
            $term_array = trim( implode( ',', (array) $terms ), ' ,' );
            $neworderterms = get_terms($taxonomy, 'orderby=none&include=' . $term_array );
            foreach( $neworderterms as $orderterm ) {  
                echo ' / <a href="' . get_term_link( $orderterm ) . '">' . $orderterm->name . '</a>';
                if ($current_term == $orderterm) {
                    break;
                } 
                
                
            }
        }
    }

}

?>