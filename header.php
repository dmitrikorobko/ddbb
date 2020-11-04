<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ddbb
 */
$options = get_option( 'ddbb_settings' );


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- META -->  
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#ffffff" />
	
    <?php if ( ! function_exists( '_wp_render_title_tag' ) ) {
	    function theme_slug_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php }
        add_action( 'wp_head', 'theme_slug_render_title' );
    }?>

    <base href="<?php echo home_url(); ?>">
    <link rel="canonical" href="<?php echo home_url(); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="contact" content="<?php echo $options['ddbb_text_field_pr-email']; ?>">
    <meta name="copyright" content="Copyright (c) <?php bloginfo('name'); ?>">
    
    <!-- CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    <?php wp_head(); ?> 
    <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
</head>

<body <?php body_class(); ?> >

<?php ddbb_header(); ?>    

    <?php 
    
    if (woo_active()) {
        if(is_realy_woocommerce_page() || is_product()) {
            get_template_part( 'templates/woo', 'title' );
        } else {
            header_banner();
        }
    } else {
        header_banner();
    }

    function header_banner() {
        global $products_title_layout;
        if(!is_singular( 'products')){
            get_template_part( 'templates/banner', 'title' );
        }
        
        if(is_singular( 'products')){
            if ($products_title_layout == 2){
                get_template_part( 'templates/product', 'title-2' ); 
            } else {
                echo $products_title_layout;
                get_template_part( 'templates/product', 'title-1' ); 
            } 
        }
    }

	?>   

