<?php
/**
 * The template for displaying single products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */

get_header();
$options = get_option( 'ddbb_settings' );
$images = rwmb_meta( 'bt-img-file', array( 'link' => 'true' ) );
$heading = rwmb_meta( 'pr-heading' );
$product_images = rwmb_meta( 'pr-img_files' );
$img_desc = rwmb_meta( 'pr-img_description' );
?>    
    
	<div class="products-menu">
		<div class="ddbb-wrap hr-line">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php get_template_part( 'templates/hotizontal', 'menu' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main">

	
        <div class="ddbb-wrap <?php if (is_page() && !is_front_page() && !is_home() && !empty($fullscreen_default) && !is_realy_woocommerce_page()) {?>fullbg-page<?php } ?>">
			
		<?php the_content();?>
        </div>
    </div>  
    
<?php get_footer(); ?>	