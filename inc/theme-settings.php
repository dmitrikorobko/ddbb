<?php
add_action( 'admin_menu', 'ddbb_add_admin_menu' );
add_action( 'admin_init', 'ddbb_settings_init' );


function ddbb_add_admin_menu(  ) { 

	add_menu_page( 'Additional setup', 'Additional setup', 'manage_options', 'ddbb', 'ddbb_options_page' );

}


function ddbb_settings_init(  ) { 

	register_setting( 'pluginPage', 'ddbb_settings' );

	add_settings_section(
		'ddbb_pluginPage_section', 
		__( 'Please fill:', 'ddbb' ), 
		'ddbb_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'ddbb_text_field_instagram', 
		__( 'Instagram url', 'ddbb' ), 
		'ddbb_text_field_0_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_facebook', 
		__( 'Facebook url', 'ddbb' ), 
		'ddbb_text_field_1_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_twitter', 
		__( 'Twitter url', 'ddbb' ), 
		'ddbb_text_field_2_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_linkedin', 
		__( 'LinkedIn url', 'ddbb' ), 
		'ddbb_text_field_3_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_footer-banner-h2', 
		__( 'Footer banner H2', 'ddbb' ), 
		'ddbb_text_field_4_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_footer-banner-p', 
		__( 'Footer banner P', 'ddbb' ), 
		'ddbb_text_field_5_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_footer-banner-button', 
		__( 'Footer banner button text', 'ddbb' ), 
		'ddbb_text_field_6_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_footer-banner-url', 
		__( 'Footer banner button url', 'ddbb' ), 
		'ddbb_text_field_7_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_footer-banner-img', 
		__( 'Footer banner image url', 'ddbb' ), 
		'ddbb_text_field_13_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_header-button-text', 
		__( 'Header menu button text', 'ddbb' ), 
		'ddbb_text_field_8_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_header-button-url', 
		__( 'Header menu button url', 'ddbb' ), 
		'ddbb_text_field_9_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-cf7-heading', 
		__( 'Products contact form heading', 'ddbb' ), 
		'ddbb_text_field_10_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-cf7-text', 
		__( 'Products contact form text', 'ddbb' ), 
		'ddbb_text_field_11_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-cf7-shortcode', 
		__( 'Products contact form shortcode', 'ddbb' ), 
		'ddbb_text_field_12_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-phone', 
		__( 'Your phone number', 'ddbb' ), 
		'ddbb_text_field_14_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-country-code', 
		__( 'Your contry code ex.: +372', 'ddbb' ), 
		'ddbb_text_field_15_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-woo-header-img', 
		__( 'Woocommerce header fullscreen image', 'ddbb' ), 
		'ddbb_text_field_16_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-woo-header-banner', 
		__( 'Woocommerce header banner image', 'ddbb' ), 
		'ddbb_text_field_17_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-subpage-header-img', 
		__( 'Subpages header fullscreen image', 'ddbb' ), 
		'ddbb_text_field_18_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-subpage-header-banner', 
		__( 'Subpages header banner image', 'ddbb' ), 
		'ddbb_text_field_19_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-email', 
		__( 'Your email', 'ddbb' ), 
		'ddbb_text_field_20_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_pr-footer-bg', 
		__( 'Footer background image', 'ddbb' ), 
		'ddbb_text_field_21_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_currency', 
		__( 'Site currency', 'ddbb' ), 
		'ddbb_text_field_22_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_before_contact_number', 
		__( 'Text before contact number', 'ddbb' ), 
		'ddbb_text_field_23_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_footer_banner_html', 
		__( 'For Html code in footer banner', 'ddbb' ), 
		'ddbb_text_field_24_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_additional_phone', 
		__( 'Additional phone number', 'ddbb' ), 
		'ddbb_text_field_25_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_products_archive_subtitle', 
		__( 'Products archive subtitle', 'ddbb' ), 
		'ddbb_text_field_26_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);

	add_settings_field( 
		'ddbb_text_field_tripadvisor', 
		__( 'Tripadvisor url', 'ddbb' ), 
		'ddbb_text_field_27_render', 
		'pluginPage', 
		'ddbb_pluginPage_section' 
	);


}


function ddbb_text_field_0_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_instagram]' value='<?php echo $options['ddbb_text_field_instagram']; ?>'>
	<?php

}


function ddbb_text_field_1_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_facebook]' value='<?php echo $options['ddbb_text_field_facebook']; ?>'>
	<?php

}


function ddbb_text_field_2_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_twitter]' value='<?php echo $options['ddbb_text_field_twitter']; ?>'>
	<?php

}

function ddbb_text_field_27_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_tripadvisor]' value='<?php echo $options['ddbb_text_field_tripadvisor']; ?>'>
	<?php

}


function ddbb_text_field_3_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_linkedin]' value='<?php echo $options['ddbb_text_field_linkedin']; ?>'>
	<?php

}

function ddbb_text_field_4_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_footer-banner-h2]' value='<?php echo $options['ddbb_text_field_footer-banner-h2']; ?>'>
	<?php

}

function ddbb_text_field_5_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_footer-banner-p]' value='<?php echo $options['ddbb_text_field_footer-banner-p']; ?>'>
	<?php

}

function ddbb_text_field_6_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_footer-banner-button]' value='<?php echo $options['ddbb_text_field_footer-banner-button']; ?>'>
	<?php

}

function ddbb_text_field_7_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_footer-banner-url]' value='<?php echo $options['ddbb_text_field_footer-banner-url']; ?>'>
	<?php

}

function ddbb_text_field_13_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_footer-banner-img]' value='<?php echo $options['ddbb_text_field_footer-banner-img']; ?>'>
	<?php

}


function ddbb_text_field_8_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_header-button-text]' value='<?php echo $options['ddbb_text_field_header-button-text']; ?>'>
	<?php

}

function ddbb_text_field_9_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_header-button-url]' value='<?php echo $options['ddbb_text_field_header-button-url']; ?>'>
	<?php

}

function ddbb_text_field_10_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-cf7-heading]' value='<?php echo $options['ddbb_text_field_pr-cf7-heading']; ?>'>
	<?php

}

function ddbb_text_field_11_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-cf7-text]' value='<?php echo $options['ddbb_text_field_pr-cf7-text']; ?>'>
	<?php

}

function ddbb_text_field_12_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-cf7-shortcode]' value='<?php echo $options['ddbb_text_field_pr-cf7-shortcode']; ?>'>
	<?php

}

function ddbb_text_field_14_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-phone]' value='<?php echo $options['ddbb_text_field_pr-phone']; ?>'>
	<?php

}

function ddbb_text_field_15_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-country-code]' value='<?php echo $options['ddbb_text_field_pr-country-code']; ?>'>
	<?php

}

function ddbb_text_field_16_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-woo-header-img]' value='<?php echo $options['ddbb_text_field_pr-woo-header-img']; ?>'>
	<?php

}

function ddbb_text_field_17_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-woo-header-banner]' value='<?php echo $options['ddbb_text_field_pr-woo-header-banner']; ?>'>
	<?php

}

function ddbb_text_field_18_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-subpage-header-img]' value='<?php echo $options['ddbb_text_field_pr-subpage-header-img']; ?>'>
	<?php

}

function ddbb_text_field_19_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-subpage-header-banner]' value='<?php echo $options['ddbb_text_field_pr-subpage-header-banner']; ?>'>
	<?php

}

function ddbb_text_field_20_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-email]' value='<?php echo $options['ddbb_text_field_pr-email']; ?>'>
	<?php

}

function ddbb_text_field_21_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_pr-footer-bg]' value='<?php echo $options['ddbb_text_field_pr-footer-bg']; ?>'>
	<?php

}

function ddbb_text_field_22_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_currency]' value='<?php echo $options['ddbb_text_field_currency']; ?>'>
	<?php

}

function ddbb_text_field_23_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_before_contact_number]' value='<?php echo $options['ddbb_text_field_before_contact_number']; ?>'>
	<?php

}

function ddbb_text_field_24_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_footer_banner_html]' value='<?php echo $options['ddbb_text_field_footer_banner_html']; ?>'>
	<?php

}


function ddbb_text_field_25_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_additional_phone]' value='<?php echo $options['ddbb_text_field_additional_phone']; ?>'>
	<?php

}

function ddbb_text_field_26_render(  ) { 

	$options = get_option( 'ddbb_settings' );
	?>
	<input type='text' name='ddbb_settings[ddbb_text_field_products_archive_subtitle]' value='<?php echo $options['ddbb_text_field_products_archive_subtitle']; ?>'>
	<?php

}





function ddbb_settings_section_callback(  ) { 

	echo __( 'Here you can setup additional settings.', 'ddbb' );

}


function ddbb_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Theme additional settings</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
