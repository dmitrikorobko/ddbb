<?php
/**
 * The header layout 6 + not printable svg.
 *
 * @since   0.0.1
 * @package ddbb
 */
$options = get_option( 'ddbb_settings' );
?>    
    					
	<header class="header-1">
		
		<div class="mob-header d-lg-none">
			<div class="container">
				<div class="row">
					<div class="col-6 d-flex align-items-center justify-content-start logochange">
						<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory') ?>/assets/img/logo.png" class="logo"></a>
						<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory') ?>/assets/img/logo-black.svg" class="logo black"></a>
					</div>
					<div class="col-6 d-flex align-items-center justify-content-end">
						<?php mobile_cart();?>
						<div id="menubtn" class="animz"><div class="openclose"></div></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="menu drop">
			<div class="container">
                <?php if ( !empty( $options['ddbb_text_field_facebook'] ) || !empty( $options['ddbb_text_field_instagram'] ) ){ ?>
                <div class="row addrow-contact addrow-social d-lg-flex">
                    <div class="col align-items-center justify-content-end d-flex">
                        <div>
                            <?php if ( !empty( $options['ddbb_text_field_facebook'] ) ) { ?>
                                <a href="<?php echo $options['ddbb_text_field_facebook']; ?>" target="_blank">
                                <?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/social_fb.svg')?>
                                
                                </a>
                            <?php } ?>
                        </div>
                        <div>
                            <?php if ( !empty( $options['ddbb_text_field_instagram'] ) ) { ?>
                                <a href="<?php echo $options['ddbb_text_field_instagram']; ?>" target="_blank">
                                <?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/social_inst.svg')?>
                                </a>
                            <?php } ?>
                        </div>
                        <div>
                            <?php if ( !empty( $options['ddbb_text_field_tripadvisor'] ) ) { ?>
                                <a href="<?php echo $options['ddbb_text_field_tripadvisor']; ?>" target="_blank">
                                <?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/social_tripadvisor.svg')?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>  
                </div>
                <?php } ?>
				<div class="row">
					
					<div class="col-lg-2 align-items-center justify-content-start d-none d-lg-flex logochange">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory') ?>/assets/img/logo.png" class="logo"></a>
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_bloginfo('template_directory') ?>/assets/img/logo-black.svg" class="logo black"></a>
					</div> 
					
					<nav class="col-lg-8 d-flex align-items-center justify-content-center mob-nav">
				
							<?php dropdown_menu("header-menu", $page_id ); ?>

					</nav>
					
					<div class="col-lg-2 d-flex align-items-center justify-content-end mob-contact">
						<?php if (wpml_active()) { ?>
						<div class="lang-switch d-none d-lg-block"><?php echo headerlang(); ?></div>
						<div class="d-lg-none d-flex mob-lang"><?php echo moblang(); ?></div>
						<?php }?>
						<?php if ( !empty($options['ddbb_text_field_header-button-text'] )){ ?>
						<a class="d-lg-flex vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-color-ddbb-button-1" href="<?php echo $options['ddbb_text_field_header-button-url']; ?>" title=""><?php echo $options['ddbb_text_field_header-button-text']; ?></a>
						<?php } ?>
						<?php mini_cart();?>
					</div>
				</div>
			</div>
		</div>

		
	</header>