    
 <?php
/**
 * Title banner template.
 *
 * @since   0.0.1
 * @package ddbb
 */ 

$options = get_option( 'ddbb_settings' );

/* Separate banner on single page */
$images = rwmb_meta( 'bt-img-file', array( 'link' => 'true', 'limit' => 1 ) );
$image = null;
if ($images) {
	$image = reset( $images );
}
$subtitle = rwmb_meta( 'bt-subtitle' );

/* Default Fullscreen background banner */

$fullscreen_default = $options['ddbb_text_field_pr-subpage-header-img'];

/* Default Banner */

$banner_default = $options['ddbb_text_field_pr-subpage-header-banner'];
$products_archive_subtitle = $options['ddbb_text_field_products_archive_subtitle'];

$hide = rwmb_meta( 'bt-hide_banner_title' );

?>
	<?php if(!is_front_page() && !is_home() && $hide == 0){?> 
    <div class="title-banner">
		<div class="ddbb-wrap">
			<?php if (!empty($fullscreen_default) && empty($banner_default)) { ?>

			<div class="row full-banner">  
                
				<div class="absolute-bg">
					<img src="<?php echo $fullscreen_default; ?>">
				</div>

				<div class="container wpb_column vc_column_container vc_col-sm-12 d-flex align-items-center justify-content-start">
					<div class="vc_column-inner">
				
					<?php the_title( '<h1>', '</h1>' ); ?>
					</div>
				</div>
			</div>

			<?php } else if (empty($fullscreen_default) && !empty($banner_default)) { ?> 

			<div class="row title-banner-1 dscds" <?php if($images) {?>style="background-image: url(<?php echo $image['full_url']; ?>)"<?php } 
					else { ?> style="background-image: url(<?php echo $banner_default; ?>)" <?php } ?>>

					<div class="container wpb_column vc_column_container vc_col-sm-12 d-flex align-items-center justify-content-center">
						<div class="vc_column-inner">
						<?php if (is_post_type_archive('catalog')){
							$post_type_obj = get_post_type_object( $post_type );
							$title = apply_filters( 'post_type_archive_title', $post_type_obj->labels->name, $post_type );
							echo "<h1>" . $title . "</h1>";
						} else if (is_tax('catalog_categories')){
							$term_id = get_queried_object_id();
							$term_name = get_term( $term_id )->name;
							echo "<h1>" . $term_name . "</h1>";
						} else if (is_singular( 'catalog' )){
							//$term_list = wp_get_post_terms( $post->ID, 'catalog_categories', array('fields' => 'names') );
							$postterms = wp_get_post_terms($post->ID, 'catalog_categories');  
							//$parentId = $postterms[0]->parent;                   
							//$parentObj = get_term_by('id', $parentId, 'catalog_categories');  
							echo "<h1>" . $postterms[0]->name . "</h1>";
						} 
						else {
							 the_title( '<h1>', '</h1>' ); }?>
						</div>
					</div>
			</div>	

			<?php }
			
			else {?> 

			<div class="row title-banner-1"<?php if($images) {?>style="background-image: url(<?php echo $image['full_url']; ?>)"<?php } ?>>

					<div class="container wpb_column vc_column_container vc_col-sm-12 d-flex align-items-center justify-content-center">
						<div class="vc_column-inner">

						<?php
							if (is_post_type_archive('products')){
							$post_type_obj = get_post_type_object( $post_type );
							$title = apply_filters( 'post_type_archive_title', $post_type_obj->labels->name, $post_type );
							echo "<h1>" . $title . "</h1>";
							}
							else {
								the_title( '<h1>', '</h1>' ); 
							}?>
						<?php if ( !empty($subtitle)) {?> <h1 class="subtitle"> <?php echo $subtitle; ?></h1><?php } 
						else if (!empty($products_archive_subtitle) && is_post_type_archive('products')) {?> <h1 class="subtitle"> <?php echo $products_archive_subtitle; ?></h1><?php }  ?>
						</div>
					</div>
			</div>

			<?php }?>
		</div>
	</div>
		<?php }?>			