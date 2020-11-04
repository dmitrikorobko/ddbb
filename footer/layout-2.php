<?php
/**
 * The footer layout 1.
 *
 * @since   0.0.1
 * @package ddbb
 */

$site_name = get_bloginfo( 'name' );
$options = get_option( 'ddbb_settings' );
?>  
	<footer class="footer-1 hr-line-up">          
        <div class="container">
			<div class="row information">
				<div class="col-md-4 col-lg-3 d-flex align-items-start justify-content-start menu">
					<div>
						<ul class="nav">
							<?php clean_custom_menus("footer-menu"); ?>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-lg-3 d-flex align-items-start justify-content-start menu">
					<div>
                        <ul class="nav">
                            <?php clean_custom_menus("footer-menu-two"); ?>
                        </ul>
					</div>
				</div>
				<div class="col-md-4 col-lg-3 d-flex flex-column align-items-start justify-content-start contact">
					<div>
					<?php 
						if(is_active_sidebar('footer_contact_two')){
							dynamic_sidebar('footer_contact_two');
						}
					?>
					</div>
				</div>
				<?php if ( !empty( $options['ddbb_text_field_facebook'] ) || !empty( $options['ddbb_text_field_instagram'] ) ) { ?>
				<div class="col-md-4 col-lg-3 d-flex flex-column align-items-start justify-content-start social">
					<div>
						<?php if ( !empty( $options['ddbb_text_field_facebook'] ) ) { ?>
							<img class="facebook-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/social_fb.svg">
							<a href="<?php echo $options['ddbb_text_field_facebook']; ?>" target="_blank">Facebook</a>
						<?php } ?>
					</div>
					<div>
						<?php if ( !empty( $options['ddbb_text_field_instagram'] ) ) { ?>
							<img class="instagram-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/social_inst.svg">
							<a href="<?php echo $options['ddbb_text_field_instagram']; ?>" target="_blank">Instagram</a>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
			
			<div class="row copyright">
				<div class="col-12 col-sm-6 col-lg-6 d-flex align-items-start justify-content-start">
					<p><?php _e('Copyright', 'ddbb');?> <?php echo date("Y"); ?> <?php echo $site_name;?></p>
				</div>
				<div class="col-12 col-sm-6 col-lg-6 d-flex align-items-start justify-content-end">
					<p>Web by Dmitri Korobko</p>
				</div>
			</div>
			
		</div>
	</footer>