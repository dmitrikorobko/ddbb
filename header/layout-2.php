<?php
/**
 * The header layout 2.
 *
 * @since   0.0.1
 * @package ddbb
 */
$options = get_option( 'ddbb_settings' );
?>    
    					
	<header class="header-2">
		
		<div class="mob-header d-lg-none">
			<div class="container">
				<div class="row">
					<div class="col-6 d-flex align-items-center justify-content-start">
                        <a href="<?php echo get_home_url(); ?>" class="logo"><?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/logo.svg')?></a>
					</div>
					<div class="col-6 d-flex align-items-center justify-content-end">
						<?php mobile_cart();?>
						<div id="menubtn" class="animz"><div class="openclose"></div></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="menu">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-2 align-items-center justify-content-start d-none d-lg-flex">
						<a href="<?php echo get_home_url(); ?>" class="logo"><?php echo print_svg(get_bloginfo('template_directory') . '/assets/svg/logo.svg')?></a>
					</div> 
					
					<nav class="col-lg-6 d-flex align-items-center justify-content-start mob-nav">
						<ul class="nav" id="navbar-menu">
							<?php clean_custom_menus("header-menu"); ?>
						</ul>
					</nav>
					
					<div class="col-lg-4 d-flex align-items-center justify-content-end mob-contact">
						<?php if (wpml_active()) { ?>
						<div class="lang-switch d-none d-lg-flex"><?php echo headerlang(); ?></div>
						<div class="d-lg-none d-flex mob-lang"><?php echo moblang(); ?></div>
                        <?php }?>
						<?php if ( !empty($options['ddbb_text_field_pr-country-code'] )){ ?>
						<a class="phone" href="tel:<?php echo $options['ddbb_text_field_pr-country-code']; ?><?php echo $options['ddbb_text_field_pr-phone']; ?>" title="">(<?php echo $options['ddbb_text_field_pr-country-code']; ?>) <b><?php echo $options['ddbb_text_field_pr-phone']; ?></b></a>
						<?php } ?>
						<?php mini_cart();?>
					</div>
				</div>
			</div>
		</div>

		
	</header>