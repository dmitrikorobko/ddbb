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
						<?php get_template_part( 'templates/menu', 'products' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="main product"> 
        <div class="ddbb-wrap hr-line">
			<div class="container">
				<div class="row">
					<div class="col product-heading">
						<h2><?php if ( !empty($heading)) echo $heading; ?></h2>
					</div>
				</div>

				<div class="row product-content">
					<div class="col-sm-8">
					<?php 
			
						if (have_posts()) :
							while (have_posts()) :
								the_post();
								the_content();
							endwhile;
						endif;		
				
					?>
					</div>
					<div class="col-sm-4">
						<div class="wpb_single_image wpb_content_element">
						<img src="<?php foreach ( $product_images as $image ) echo $image['full_url']; ?>">
						</div>
						<div class="product-img-title wpb_content_element">
							<p><?php if ( !empty($img_desc)) echo $img_desc; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="ddbb-wrap" id="contact">
			<div class="container">	
				<div class="row">
					<div class="col-sm-12">
						<?php if ( !empty($options['ddbb_text_field_pr-cf7-heading'] )){ ?>
						<h2><?php echo $options['ddbb_text_field_pr-cf7-heading']; ?></h2> <?php } ?>
						<?php if ( !empty($options['ddbb_text_field_pr-cf7-text'] )){ ?>
						<p class="text-center"><?php echo $options['ddbb_text_field_pr-cf7-text']; ?></p><?php } ?>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<?php if ( !empty($options['ddbb_text_field_pr-cf7-shortcode'] )){ ?>
						<?php echo do_shortcode($options['ddbb_text_field_pr-cf7-shortcode']); ?> <?php } ?>
					</div>
				</div>

			</div>
        </div>
	</div>  
	  
<?php get_footer(); ?>	