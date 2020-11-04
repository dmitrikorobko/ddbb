<?php
/**
 * The template for displaying single products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */
global $post;
get_header();
$options = get_option( 'ddbb_settings' );
$images = rwmb_meta( 'bt-img-file', array( 'link' => 'true' ) );
$product_images = rwmb_meta( 'pr-img_files' );
$sku = rwmb_meta( 'pr-product_sku' );
$short_desc = rwmb_meta( 'pr-short_desc' );
?>    

	<div class="main product single-2"> 
        <div class="ddbb-wrap hr-line">
			<div class="container">
				<div class="row main-content">
					<div class="col-sm-6 main-img">
						<div class="wpb_single_image wpb_content_element">
						<img src="<?php foreach ( $product_images as $image ) echo $image['full_url']; ?>">
						</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="category">
                            <?php 
                            foreach( get_the_category() as $category ){ 
                                echo '<h4>' . $category->cat_name . '</h4>'; 
                            } 
                            ?>
                        </div>
                        <div class="summary">
                            <h1><?php the_title(); ?></h1>
                            <?php if ($short_desc) {?>
                                <p><?php echo $short_desc;?></p>
                            <?php }?>
                            <?php if ($sku) {?><p><b><?php _e('Model','ddbb'); ?>:</b> <?php echo $sku;?></p> <?php } ?>
                        </div>
                        <?php available_colors();?>
                        <div class="vc_btn3-container vc_btn3-inline">
                            <a class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-ddbb-button-1" href="#contact" title="<?php _e('Order Now','ddbb'); ?>"><?php _e('Order Now','ddbb'); ?></a>
                        </div>
					</div>
				</div>
                <div class="row content">
                    <div class="col-sm-12">
                        <?php 
                            
                            if (have_posts()) :
                                while (have_posts()) :
                                    the_post();
                                    the_content();
                                endwhile;
                            endif;		
                    
                        ?>
                    </div>
                </div>
			</div>
		</div>		
		<div class="ddbb-wrap" id="contact">
			<div class="container">	
				<div class="row p-t-xxl">
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