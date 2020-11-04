<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ddbb
 */

get_header();
$sURL    = get_site_url();

?>

	<div class="main error-404">
		<div class="container">
	
				<div class="row justify-content-md-center">
					<div class="col-12 col-md-6">
						<h1><?php _e('Error 404', 'ddbb')?></h1>
						<h2><?php _e('This page has not been found', 'ddbb')?></h2>
						<p><?php _e('The page you are trying to access does not exist or has been moved. Try going back to our homepage.', 'ddbb')?></p>
						<a class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-ddbb-button-1" href="<?php echo $sURL ?>" title="Explore"><?php _e('Explore', 'ddbb')?></a>
					</div>
					<div class="col-12 col-md-6 d-flex align-items-end justify-content-end error404-img">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/svg/fireplace.svg">
					</div>				
				</div>

		</div>	
	</div>  
	  
<?php get_footer(); ?>	