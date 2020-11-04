<?php
/**
 * ddbb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ddbb
 */


/* 
* Theme setup 
*/ 

$header_layout = 7; // choose what layout we use
$footer_layout = 8; // choose what layout we use
$is_woocommerce_shop = false; // webpage using woocommerce
$products_custom_active = false; // product custom post type activation
$products_single_show = false; // redirect PRODUCTS custom post type single pages on main page. 
$destinations_custom_active = false; 
$destinations_single_show = false;
$faq_custom_active = false; // product custom post type activation 
$faq_single_show = false; // redirect FAQ custom post type single pages on main page. 
$gallery_custom_active = false; // gallery custom post type activation
$catalog_custom_active = false; // catalog custom post type activation
$events_custom_active = true; // events custom post type activation

global $pagination_items;
$pagination_items = 4; // how many items on page (for gallery list, product list etc.)

/*
* Add visual composer css to other pages.
*/

add_action( 'wp_enqueue_scripts', 'add_theme_stylesheet' );

function add_theme_stylesheet() {
    if ( is_singular( array( 'gallery', 'faq', 'product', 'blog_post', 'catalog' ) ) || is_404() || is_post_type_archive('catalog')
    || is_tax('catalog_categories')) {
        //wp_enqueue_script( 'wpb_composer_front_js' );
        wp_enqueue_style( 'js_composer_front' );
        //wp_enqueue_style( 'js_composer_custom_css' );
    }
}

/* 
* Include  
*/ 

if ($products_custom_active == true) require get_stylesheet_directory() . '/inc/products-custom-post-type.php';
if ($destinations_custom_active == true) require get_stylesheet_directory() . '/inc/destinations-custom-post-type.php';
if ($faq_custom_active == true) require get_stylesheet_directory() . '/inc/faq-custom-post-type.php';
if ($gallery_custom_active == true) require get_stylesheet_directory() . '/inc/gallery-custom-post-type.php';
if ($catalog_custom_active == true) require get_stylesheet_directory() . '/inc/catalog-custom-post-type.php';
if ($events_custom_active == true) require get_stylesheet_directory() . '/inc/events-custom-post-type.php';

require get_stylesheet_directory() . '/inc/theme-settings.php';
require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');


/*
* Redirect custom single pages to homepage
*/

if ($faq_single_show == false) {
    add_action( 'template_redirect', 'redirect_faq' );
    function redirect_faq() {
        if ( is_singular('faq') ) {
            wp_redirect( home_url(), 302 );
            exit;
        }
    }
}

if ($products_single_show == false) {
    add_action( 'template_redirect', 'redirect_products' );
    function redirect_products() {
        if ( is_singular('products') ) {
            wp_redirect( home_url(), 302 );
            exit;
        }
    }
}

if ($destinations_single_show == false) {
    add_action( 'template_redirect', 'redirect_destinations' );
    function redirect_destinations() {
        if ( is_singular('destinations') ) {
            wp_redirect( home_url(), 302 );
            exit;
        }
    }
}

/**
* Remove width and height attributes from image tags
*/

add_filter( 'wp_calculate_image_srcset', '__return_false' );

/**
 * Allow SVG
 */

function my_custom_mime_types( $mimes ) {
 
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';
     
    // Optional. Remove a mime type.
    unset( $mimes['exe'] );
     
    return $mimes;
    }

add_filter( 'upload_mimes', 'my_custom_mime_types' );

/**
* Register menus
*/

function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'header-menu-two' => __( 'Header Menu 2' ),
      'footer-menu' => __( 'Footer Menu' ),
      'footer-menu-two' => __( 'Footer Menu 2' ),
      'horizontal-scroll-menu' => __('Horizontal scroll menu'),
      'catalog-menu' => __('Catalog menu')
    )
  );
}
add_action( 'init', 'register_menus' );

/**
* Register widgets
*/

register_sidebar( array(
	'name' => 'Footer Contact 1',
	'id' => 'footer_contact',
	'description' => 'Footer contact text',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
) );

register_sidebar( array(
	'name' => 'Footer Contact 2',
	'id' => 'footer_contact_two',
	'description' => 'Footer contact text 2',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
) );

register_sidebar( array(
	'name' => 'Footer Contact 3',
	'id' => 'footer_contact_three',
	'description' => 'Footer contact text 3',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
) );

register_sidebar( array(
	'name' => 'Footer Other',
	'id' => 'footer_other',
	'description' => 'Footer social icons',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
) );

register_sidebar( array(
	'name' => 'Catalog sidebar',
	'id' => 'catalog_sidebar',
	'description' => 'Sidebar for catalog',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '',
	'after_title' => '',
) );

/**
* Clean wp menu layout
*/

function clean_custom_menus($menu_name) {

	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = '';
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$classes = implode(" ", $menu_item->classes);
			
			$menu_list .= "\t\t\t\t\t". '<li class="nav-item '. $classes .'"><a class="nav-link" href="'. $url .'">'. $title .'</a></li>' ."\n";
		}


	} else {
        $menu_list = '';
	}
	
	echo $menu_list;
}

function horizontal_custom_menus($menu_name, $current_page) {

	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = '';
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
            $url = $menu_item->url;
            $object_id = $menu_item->object_id;
			$classes = implode(" ", $menu_item->classes);
            
            if ($current_page == $object_id) {
                $menu_list .= "\t\t\t\t\t". '<a class="'. $classes .' active" href="'. $url .'">'. $title .'</a>' ."\n";
            } else {
                $menu_list .= "\t\t\t\t\t". '<a class="'. $classes .'" href="'. $url .'">'. $title .'</a>' ."\n";
            }
			
		}
	} else {
        echo ("Menu is not added!!");
    }
	
	echo $menu_list;
}

/*
* Dropdown menu
*/

function dropdown_menu($menu_name, $current_page){

	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_items = buildTree($menu_items);
        ?>
        <ul class="nav" id="navbar-menu">
            <?php
            foreach( $menu_items as $item ){
                create_dropdown_menu($item);
            }
            ?>
        </ul>
        <?php

	} else {
        echo ("Menu is not added!!");
    }
	  
}

function create_dropdown_menu($item) {
    $link = $item->url;
    $title = $item->title;
    $id = $item->ID;
    
    if(property_exists($item, 'child')) {
        $children = $item->child;
        ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo $link; ?>" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $title; echo print_svg(get_bloginfo('template_directory') . '/assets/svg/select.svg') ;?>
                
            </a>
            <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown">    
            <?php 
            foreach($children as $child){
                dropdown_submenu($child);
            }
            ?>
            </div>
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $link; ?>">
                <?php echo $title; ?>
            </a>
        </li>
    <?php
    }
}

function dropdown_submenu($item){
    $link = $item->url;
    $title = $item->title;?>
    <a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $title; ?> <?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/arrow-right.svg');  ?></a>
    <?php
}

/*
* Menu with submenus.
*/

function catalog_menu($menu_name, $current_page){

	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_items = buildTree($menu_items);
        ?>
        <ul class="navbar-nav flex-column">
            <?php
            foreach( $menu_items as $item ){
                create_menu($item, $current_page);
            }
            ?>
        </ul>
        <?php

	} else {
        echo ("Menu is not added!!");
    }
	  
}

function buildTree( array &$elements, $parentId = 0 )
{
    $branch = array();
    foreach ( $elements as &$element )
    {
        if ( $element->menu_item_parent == $parentId )
        {
            $children = buildTree( $elements, $element->ID );
            if ( $children )
                $element->child = $children;
                $element->has_children = 1;
            $branch[$element->ID] = $element;
            unset( $element );
        }
    }
    return $branch;
}

function create_menu($item, $current_page) {
    $link = $item->url;
    $title = $item->title;
    $id = $item->ID;
    $object_id = $item->object_id;
    $active_style = "";

    if(is_singular( 'catalog' )){
        $terms = wp_get_post_terms( $current_page, 'catalog_categories', array( "fields" => "ids" ) );
        foreach ($terms as $term){
            if ($term == $object_id){
                $active_style = "active";
                break;
            }
        }
    } else {
        if($object_id == $current_page) {
            $active_style = "active";
        }
    }

    if(property_exists($item, 'child')) {
        $children = $item->child;
        ?>
        <li class="nav-item">
            <a class="nav-link <?php echo $active_style; ?>" href="<?php echo $link; ?>">
                <?php echo $title; ?>
            </a>
            <ul class="navbar-nav flex-column child">
            <?php 
            foreach($children as $child){
                create_menu($child, $current_page);
            }
            ?>
            </ul>
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item">
            <a class="nav-link <?php echo $active_style; ?>" href="<?php echo $link; ?>">
            <?php if ($item->menu_item_parent != 0) echo print_svg(get_bloginfo('template_directory') . '/assets/svg/arrow-right.svg');  ?> <?php echo $title; ?>
            </a>
        </li>
    <?php
    }
}

/**
* Choose header layout
*/

if ( ! function_exists( 'ddbb_header' ) ) {
	function ddbb_header() {
        global $header_layout;
		ob_start();
		get_template_part( 'header/layout', $header_layout );
		$output = ob_get_clean();

		echo apply_filters( 'ddbb_header', $output );
	}
}

/**
* Choose footer layout
*/

if ( ! function_exists( 'ddbb_footer' ) ) {
	function ddbb_footer() {
        global $footer_layout;
		ob_start();
		get_template_part( 'footer/layout', $footer_layout );
		$output = ob_get_clean();

		echo apply_filters( 'ddbb_footer', $output );
	}
}

/**
 * Header language listing
 */

function headerlang(){

    $languages = icl_get_languages('skip_missing=0');
    
    // Get current language
    if( ! empty( $languages ) ) {
        foreach( $languages as $x ){
            if( !empty( $x['active'] ) ) {
                $curr_lang = $x; // This will contain current language info.
                break;
            }
        }
    }

    $items = "";

    $items .= '<div class="nav-item dropdown"><a class="nav-item nav-link mr-md-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'. $curr_lang['language_code'] .' '. print_svg(get_bloginfo('template_directory') . '/assets/svg/select.svg') .'</a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
    <a class="dropdown-item active" href="' . $curr_lang['url'] . '">' . $curr_lang['language_code'] . '</a>
    ';

    // Get other languages
    if( ! empty( $languages ) ) {
        foreach( $languages as $l ){
            if(!$l['active']){
                $items .= '<a class="dropdown-item" href="' . $l['url'] . '">' . $l['language_code'] . '</a>';
            }      
        }
    }

    $items .= '</div></div>';

    return $items;
}


/**
*  Mobile language listing
*/

function moblang(){
    $languages = icl_get_languages('skip_missing=0');

	// Get current language
    if( ! empty( $languages ) ) {
        foreach( $languages as $x ){
            if( !empty( $x['active'] ) ) {
                $curr_lang = $x; // This will contain current language info.
                break;
            }
        }
    }

	$items = "";
	$items .= '<li class="menu-item active"><a href="' . $curr_lang['url'] . '">' . $curr_lang['language_code'] . '</a></li>';

    if( ! empty( $languages ) ) {
        foreach( $languages as $l ){
            if(!$l['active']){
                $items .= '<li class="menu-item"><a href="' . $l['url'] . '">' . $l['language_code'] . '</a></li>';
			}
        }
    }
    return $items;
}

/**
 * Wpbakery Button color disable
 */


add_action( 'vc_after_init', 'change_vc_button_colors' );

function change_vc_button_colors() {
	
	//Get current values stored in the color param in "Call to Action" element
		$param = WPBMap::getParam( 'vc_btn', 'color' );
	
	// Add New Colors to the 'value' array
	// btn-custom-1 and btn-custom-2 are the new classes that will be 
	// applied to your buttons, and you can add your own style declarations
	// to your stylesheet to style them the way you want.
		$param['value'][__( 'ddbb-button-1', 'ddbb' )] = 'ddbb-button-1';
        $param['value'][__( 'ddbb-button-2', 'ddbb' )] = 'ddbb-button-2';
        
	// Remove any colors you don't want to use.
		unset($param['value']['Blue']);
		unset($param['value']['Turquoise']);
		unset($param['value']['Pink']);
		unset($param['value']['Violet']);
		unset($param['value']['Peacoc']);
		unset($param['value']['Chino']);
		unset($param['value']['Mulled Wine']);
		unset($param['value']['Vista Blue']);
		unset($param['value']['Black']);
		unset($param['value']['Grey']);
		unset($param['value']['Orange']);
		unset($param['value']['Sky']);
		unset($param['value']['Green']);
		unset($param['value']['Juicy pink']);
		unset($param['value']['Sandy brown']);
		unset($param['value']['Purple']);
	
	// Finally "update" with the new values
		vc_update_shortcode_param( 'vc_btn', $param );
}

/**
 * Shortcode for template parts
*/

function template_part( $atts, $content = null ){
    $tp_atts = shortcode_atts(array( 
       'path' =>  null,
    ), $atts);         
    ob_start();  
    get_template_part($tp_atts['path']);  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;    
 }
 add_shortcode('template_part', 'template_part');  

/**
 * Shortcode for product category and template part
*/

function cat_template( $atts, $content = null ){
    global $product_category;
    $tp_atts = shortcode_atts(array( 
       'path' =>  null,
       'cat' => ''
    ), $atts);  
    
    $product_category = $tp_atts['cat'];

    ob_start();  
    get_template_part($tp_atts['path']);  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;    
 }
 add_shortcode('cat_template', 'cat_template');  



 /**
  * Metabox for banner-title image
  */

  function title_banner_field( $meta_boxes ) {
	$prefix = 'bt-';

	$meta_boxes[] = array(
		'id' => 'banner-title',
		'title' => esc_html__( 'Banner', 'ddbb' ),
		'post_types' => array('products','page', 'blog_post', "gallery" ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'img-file',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image for title banner. Leave empty if not needed', 'ddbb' ),
				'max_file_uploads' => '1',
				'force_delete' => 'true',
				'max_status' => 'true',
            ),
            array(
				'id' => $prefix . 'subtitle',
				'type' => 'text',
				'name' => esc_html__( 'Subtitle', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Subtitle for page', 'metabox-online-generator' ),
            ),
            array(
                'id'        => $prefix . 'hide_banner_title',
                'name'      => 'Hide Header Tittle Banner?',
                'type'      => 'switch',
                'style'     => 'rounded',
                'on_label'  => 'Yes',
                'off_label' => 'No',
            ),
            
            
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'title_banner_field' );


/** 
* Product names in contact form 7 
* Usage in cf7 - [select* products]
*/

function dynamic_field_values ( $tag, $unused ) {

    if ( $tag['name'] != 'products' )
        return $tag;

    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'products',
        'orderby'       => 'title',
        'order'         => 'ASC',
    );

    $custom_posts = get_posts($args);

    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {

        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;

    }

    return $tag;

}

add_filter( 'wpcf7_form_tag', 'dynamic_field_values', 10, 2);

/**
 * 
 * Autooptimize css incjection placement
 */

add_filter('autoptimize_filter_css_replacetag','te_css_replacetag',10,1);
function te_css_replacetag($replacetag) {
	return array("</head>","before");
}

/**
 * 
 * Print svg file into html
 */

function print_svg($file){
    $iconfile = new \DOMDocument();
    $iconfile->load($file);
    $tag = $iconfile->saveHTML($iconfile->getElementsByTagName('svg')[0]);
    return $tag;
}

/**
 * ------------------------------------------------------------------------------------------------
 * Check if WPML is active
 * ------------------------------------------------------------------------------------------------
 */


function wpml_active() {
    return class_exists( 'SitePress' );
}

/**
 * ------------------------------------------------------------------------------------------------
 * Deactivate WooCommerce plugins if isn't webshop or activate them if WooCommerce
 * 
 * WooCommerce
 * WooCommerce Load More Products
 * WooCommerce Multilingual
 * WooCommerce Product Image Flipper
 * Yoast SEO: WooCommerce
 * ------------------------------------------------------------------------------------------------
 */


function onoff_woocommerce_plugins() {
    global $is_woocommerce_shop;
    $woo_plugins = array( '/woocommerce/woocommerce.php', '/load-more-products-for-woocommerce/load-more-products.php', '/woocommerce-multilingual/wpml-woocommerce.php',
    '/woocommerce-product-image-flipper/image-flipper.php', '/wpseo-woocommerce/wpseo-woocommerce.php', '/woocommerce-pdf-invoices-packing-slips/woocommerce-pdf-invoices-packingslips.php' );
    
    if ( $is_woocommerce_shop == false ) {
        deactivate_plugins($woo_plugins);   
    } else if ( $is_woocommerce_shop == true ) {
        activate_plugins($woo_plugins);
    }

}
     
add_action( 'admin_init', 'onoff_woocommerce_plugins' );


/**
 * ------------------------------------------------------------------------------------------------
 * Check if WooCommerce is active
 * ------------------------------------------------------------------------------------------------
 */


function woo_active() {
    return class_exists( 'WooCommerce' );
}

/**
 * Check if it is woo page
 */

function is_realy_woocommerce_page() {
    if( function_exists ( "is_woocommerce" ) && is_woocommerce()){
        return true;
	}
	if( function_exists ( "is_product" ) && is_product()){
        return true;
    }
    $woocommerce_keys = array ( "woocommerce_shop_page_id" ,
        //"woocommerce_terms_page_id" ,
        "woocommerce_cart_page_id" ,
        "woocommerce_checkout_page_id" ,
        "woocommerce_pay_page_id" ,
        "woocommerce_thanks_page_id" ,
        "woocommerce_myaccount_page_id" ,
        "woocommerce_edit_address_page_id" ,
        "woocommerce_view_order_page_id" ,
        "woocommerce_change_password_page_id" ,
        "woocommerce_logout_page_id" ,
        "woocommerce_lost_password_page_id" ) ;

    foreach ( $woocommerce_keys as $wc_page_id ) {
        if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
            return true ;
        }
    }
    return false;
}

/**
 * Show mini-cart in header
 */

function mini_cart(){
	if (woo_active()) { 
		?>
		<div class="mini-cart d-none d-lg-flex">
		<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'ddbb' ); ?>">
		<span class="icon"><?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/mini-cart.svg')?></span>
		<span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span> 
		<span class="subtotal"><?php echo WC()->cart->get_cart_total(); ?></span></a>
		<div class="cart-content-wrap">
			<div class="cart-content">
				<?php woocommerce_mini_cart();?>
			</div>
		</div>
		</div>
		<?php 
	}
}

/**
 * Show mobile-mini-cart in header
 */

function mobile_cart(){
	if (woo_active()) { 
		?><a class="mobile-mini-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'ddbb' ); ?>">
		<span class="icon"><?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/mini-cart.svg')?></span>
		<span class="items-count"><?php echo is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : ''; ?></span></a>
		<?php 
	}
}


/* 
* WooCommerce stuff if plugin is active.
*/

if (woo_active()){

    /**
     * Show mini-cart contents / total Ajax
     */

    add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

    function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <div class="mini-cart d-none d-lg-flex">
        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'ddbb'); ?>">
        <span class="icon"><?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/mini-cart.svg')?></span>
        <span class="items-count"><?php echo $woocommerce->cart->cart_contents_count;?></span>
        <span class="subtotal"><?php echo $woocommerce->cart->get_cart_total(); ?></span></a>
        <div class="cart-content-wrap">	
            <div class="cart-content">
                    <?php woocommerce_mini_cart();?>
            </div>
        </div>
        </div>
        <?php
        $fragments['div.mini-cart'] = ob_get_clean();
        return $fragments;
    }

    /**
     * Show mobile-mini-cart contents / total Ajax
     */

    add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_minicart_fragment' );

    function woocommerce_header_add_to_minicart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <a class="mobile-mini-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'ddbb'); ?>">
        <span class="icon"><?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/mini-cart.svg')?></span>
        <span class="items-count"><?php echo $woocommerce->cart->cart_contents_count;?></span></a>
        <?php
        $fragments['a.mobile-mini-cart'] = ob_get_clean();
        return $fragments;
    }


    function lmp_button_style() {
        $button = '';
        return $button;
    }

    add_filter ( 'berocket_lmp_button_style', 'lmp_button_style', 10, 3 );

    /*
    * Add jquery for Woocommerce product plus minus 
    */

    add_action( 'wp_footer' , 'custom_quantity_fields_script' );
    function custom_quantity_fields_script(){
        ?>
        <script type='text/javascript'>
        jQuery( function( $ ) {
            if ( ! String.prototype.getDecimals ) {
                String.prototype.getDecimals = function() {
                    var num = this,
                        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                    if ( ! match ) {
                        return 0;
                    }
                    return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
                }
            }
            // Quantity "plus" and "minus" buttons
            $( document.body ).on( 'click', '.plus, .minus', function() {
                var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                    currentVal  = parseFloat( $qty.val() ),
                    max         = parseFloat( $qty.attr( 'max' ) ),
                    min         = parseFloat( $qty.attr( 'min' ) ),
                    step        = $qty.attr( 'step' );

                // Format values
                if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
                if ( max === '' || max === 'NaN' ) max = '';
                if ( min === '' || min === 'NaN' ) min = 0;
                if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

                // Change the value
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( currentVal >= max ) ) {
                        $qty.val( max );
                    } else {
                        $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                    }
                } else {
                    if ( min && ( currentVal <= min ) ) {
                        $qty.val( min );
                    } else if ( currentVal > 0 ) {
                        $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                    }
                }

                // Trigger change event
                $qty.trigger( 'change' );
            });
        });
        </script>
        <?php
    }

    /* Rearrange woocommerce product page info */

    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    add_action( 'woocommerce_single_product_summary', 'the_content', 20 );

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );

    add_action( 'woocommerce_single_product_summary', 'custom_show_addtional_information', 40 );
    function custom_show_addtional_information() {
    global $product;
    do_action( 'woocommerce_product_additional_information', $product );
    }

    /* Remove dwnld products from Woocommerce account */

    function CM_woocommerce_account_menu_items_callback($items) {
        unset( $items['downloads'] );
        return $items;
    }
    add_filter('woocommerce_account_menu_items', 'CM_woocommerce_account_menu_items_callback', 10, 1);

}

add_theme_support( 'title-tag' );

/*
*   Function for removing pagination in urls
*/

function get_nopaging_url() {

    global $wp;

    $current_url =  home_url( $wp->request );
    $position = strpos( $current_url , '/page' );
    $nopaging_url = ( $position ) ? substr( $current_url, 0, $position ) : $current_url;

    return trailingslashit( $nopaging_url );

}

/*Auto updates*/

add_filter( 'auto_update_plugin', '__return_true' );


?>
