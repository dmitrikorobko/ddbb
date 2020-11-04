<?php
/**
 * The main template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */

get_header();
?>

	<div class="main">
        <div class="ddbb-wrap">
		<?php 
		if (is_realy_woocommerce_page() || is_singular( 'blog_post' )){
			?><div class="container"> <?php
		}	
		if (have_posts()) :
			while (have_posts()) :
				the_post();
				the_content();
			endwhile;
		endif;		
		if (is_realy_woocommerce_page() || is_singular( 'blog_post' )){
			?></div> <?php
		}
        ?>
        </div>
	</div>  
		  
<?php get_footer(); ?>	