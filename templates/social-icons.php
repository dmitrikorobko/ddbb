<?php
/**
 * Social icons template
 *
 * @since   0.0.1
 * @package ddbb
 */

$options = get_option( 'ddbb_settings' );
?>  

                
						<?php if ( !empty( $options['ddbb_text_field_facebook'] ) ) { ?>
                            <a href="<?php echo $options['ddbb_text_field_facebook']; ?>" target="_blank">
                                <img class="facebook-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/social_fb.svg">
                            </a>
						<?php } ?>
			
		
                        <?php if ( !empty( $options['ddbb_text_field_instagram'] ) ) { ?>
                            <a href="<?php echo $options['ddbb_text_field_instagram']; ?>" target="_blank">
							    <img class="instagram-svg" src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/social_inst.svg">
							</a>
						<?php } ?>	
				