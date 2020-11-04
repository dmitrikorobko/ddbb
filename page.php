<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */
$options = get_option( 'ddbb_settings' );
$fullscreen_default = $options['ddbb_text_field_pr-subpage-header-img'];

get_header();
?>
	
     
	<div class="main">

	
        <div class="ddbb-wrap <?php if (is_page() && !is_front_page() && !is_home() && !empty($fullscreen_default) && !is_realy_woocommerce_page()) {?>fullbg-page<?php } ?>">
			
		<?php 
			if (woo_active()) {

				if (is_realy_woocommerce_page() || is_product()){
					?><div class="container"> <?php
				}
				the_content();
				if (is_realy_woocommerce_page() || is_product()){
					?></div> <?php
				}

			} else {

				the_content();

			}
			
        ?>
        </div>
	</div>  
	  
<?php get_footer(); ?>	