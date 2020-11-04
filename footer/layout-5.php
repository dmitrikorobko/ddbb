<?php
/**
 * The footer layout 3 + not printable svg.
 *
 * @since   0.0.1
 * @package ddbb
 */

$site_name = get_bloginfo( 'name' );
$options = get_option( 'ddbb_settings' );
?>  
	<?php if ( !empty($options['ddbb_text_field_footer-banner-h2'] )){ ?>
	<div class="prefooter">
		<div class="ddbb-wrap">
	<div class="row banner-full-1" <?php if ( !empty($options['ddbb_text_field_footer-banner-img'] )){ ?>style="background-image: url(<?php echo $options['ddbb_text_field_footer-banner-img']; ?>)" <?php }?>>
				<div class="col d-flex flex-column align-items-center justify-content-center">
					<?php if ( !empty($options['ddbb_text_field_footer-banner-h2'] )){ ?><h2><?php echo $options['ddbb_text_field_footer-banner-h2']; ?></h2> <?php }?>
					<?php if ( !empty($options['ddbb_text_field_footer_banner_html'] )){ ?><?php echo $options['ddbb_text_field_footer_banner_html']; ?><?php }?>
					<?php if ( !empty($options['ddbb_text_field_footer-banner-p'] )){ ?><p><?php echo $options['ddbb_text_field_footer-banner-p']; ?></p> <?php }?>
					<?php if ( !empty($options['ddbb_text_field_footer-banner-button'] )){ ?><div class="vc_btn3-container vc_btn3-inline"><a class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-classic vc_btn3-color-ddbb-button-1" href="<?php echo $options['ddbb_text_field_footer-banner-url']; ?>" title="<?php echo $options['ddbb_text_field_footer-banner-button']; ?>"><?php echo $options['ddbb_text_field_footer-banner-button']; ?></a></div> <?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<footer class="footer-3 footer-3-5" <?php if ( !empty($options['ddbb_text_field_pr-footer-bg'] )){ ?>style="background-image: url(<?php echo $options['ddbb_text_field_pr-footer-bg']; ?>)" <?php }?>>          
        <div class="container">
			<div class="row information">
				<div class="col-lg-3 d-none d-lg-flex align-items-start justify-content-start">
                    <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/logofooter.svg" class="logo"></a>
                </div>
                <?php if ( !empty( $options['ddbb_text_field_pr-email'] ) || !empty( $options['ddbb_text_field_pr-phone'] ) ) { ?>
				<div class="col-md-4 col-lg-6 d-flex flex-row align-items-start justify-content-center contact">
                    <div>
                        <?php if ( !empty($options['ddbb_text_field_pr-country-code'] )){ ?>
                            <img class="call-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/call.svg">
						    <a class="phone" href="tel:<?php echo $options['ddbb_text_field_pr-country-code']; ?><?php echo $options['ddbb_text_field_pr-phone']; ?>" title="">(<?php echo $options['ddbb_text_field_pr-country-code']; ?>) <?php echo $options['ddbb_text_field_pr-phone']; ?></a>
						<?php } ?>
					</div>
					<div>
						<?php if ( !empty( $options['ddbb_text_field_pr-email'] ) ) { ?>
							<img class="email-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/email.svg">
							<a href="mailto:<?php echo $options['ddbb_text_field_pr-email']; ?>" target="_blank"><?php echo $options['ddbb_text_field_pr-email']; ?></a>
						<?php } ?>
					</div>
                </div>
                <?php } ?>
				<?php if ( !empty( $options['ddbb_text_field_facebook'] ) || !empty( $options['ddbb_text_field_instagram'] ) ) { ?>
				<div class="col-md-4 col-lg-3 d-flex flex-row align-items-start justify-content-end social">
					<div>
						<?php if ( !empty( $options['ddbb_text_field_facebook'] ) ) { ?>
							<a href="<?php echo $options['ddbb_text_field_facebook']; ?>" target="_blank"><img class="facebook-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/social_fb.svg"></a>
						
						<?php } ?>
					</div>
					<div>
						<?php if ( !empty( $options['ddbb_text_field_instagram'] ) ) { ?>
							<a href="<?php echo $options['ddbb_text_field_instagram']; ?>" target="_blank"><img class="instagram-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/social_inst.svg"></a>
							
						<?php } ?>
                    </div>

				</div>
				<?php } ?>
			</div>
			
			<div class="row copyright">
				<div class="col-12 col-lg-6 d-flex align-items-start justify-content-start">
					<p><?php _e('Copyright', 'ddbb');?> <?php echo date("Y"); ?> <?php echo $site_name;?></p>
				</div>
				<div class="col-12 col-lg-6 d-flex align-items-start justify-content-end">
					<p>Design by Blur</p>
				</div>
			</div>
			
		</div>
	</footer>