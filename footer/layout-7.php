<?php
/**
 * The footer layout 1.
 *
 * @since   0.0.1
 * @package ddbb
 */

$site_name = get_bloginfo( 'name' );
$options = get_option( 'ddbb_settings' );
$page_id = get_queried_object_id();
?>  
	<?php if ( !empty($options['ddbb_text_field_footer-banner-h2'] && !is_front_page() && !is_page(1557))){ ?>
	<div class="prefooter">
		<div class="ddbb-wrap">
	<div class="row banner-full-1" <?php if ( !empty($options['ddbb_text_field_footer-banner-img'] )){ ?>style="background-image: url(<?php echo $options['ddbb_text_field_footer-banner-img']; ?>)" <?php }?>>
				<div class="col d-flex flex-column align-items-center justify-content-center">
					<h1><?php echo $options['ddbb_text_field_footer-banner-h2']; ?></h1>
    <?php if (!empty($options['ddbb_text_field_footer-banner-p'])){?><p><?php echo $options['ddbb_text_field_footer-banner-p']; ?></p><?php } ?>
					<div class="vc_btn3-container vc_btn3-inline"><a class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-ddbb-button-1" href="<?php echo $options['ddbb_text_field_footer-banner-url']; ?>" title="<?php echo $options['ddbb_text_field_footer-banner-button']; ?>"><?php echo $options['ddbb_text_field_footer-banner-button']; ?></a></div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<footer class="footer-1">          
        <div class="container">
			<div class="row information">
				<div class="col-lg-3 d-none d-lg-flex align-items-start justify-content-start">
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/logo-black.png" class="logo"></a>
				</div>
				<div class="col-lg-3 d-none d-lg-flex align-items-start justify-content-start contact">
					
				</div>
				<div class="col-md-4 col-lg-3 d-flex flex-column align-items-start justify-content-start contact">
					<div>
					<?php 
						if(is_active_sidebar('footer_contact')){
							dynamic_sidebar('footer_contact');
						}
					?>
					</div>
				</div>
		
				<div class="col-md-4 col-lg-3 d-flex flex-column align-items-end justify-content-start p-logos">
                    <div>
					<?php 
						if(is_active_sidebar('footer_contact_two')){
							dynamic_sidebar('footer_contact_two');
						}
					?>
					</div>
				</div>
	
			</div>
			
			<div class="row copyright">
				<div class="col-12 col-lg-6 d-flex align-items-start justify-content-start">
					<p><?php _e('Copyright', 'ddbb');?> <?php echo date("Y"); ?> <?php echo $site_name;?></p>
				</div>
				<div class="col-12 col-lg-6 d-flex align-items-start justify-content-end">
               
				</div>
			</div>
			
		</div>
	</footer>