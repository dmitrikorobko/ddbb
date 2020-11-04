    
 <?php
/**
 * Title banner for products.
 *
 * @since   0.0.1
 * @package ddbb
 */ 
$images = rwmb_meta( 'bt-img-file', array( 'link' => 'true' ) );
$subtitle = rwmb_meta( 'pr-subtitle' );
$button_url = rwmb_meta( 'pr-button_url' );
$button_text = rwmb_meta( 'pr-button_text' );
?>
	
    <div class="title-banner">
		<div class="ddbb-wrap">
			<div class="row product-title-banner-1" style="background-image: url(
			<?php foreach ( $images as $image ) {
				echo $image['full_url']; }?>)">

					<div class="container wpb_column vc_column_container vc_col-sm-12 d-flex align-items-center justify-content-center">
						<div class="vc_column-inner">
					
						<?php the_title( '<h1>', '</h1>' ); ?>

						<p>
						<?php if ( !empty($subtitle)) echo $subtitle; ?>
						</p>
						<?php if ( !empty($button_url) && !empty($button_text) ) {?>
						<div class="vc_btn3-container vc_btn3-inline">
							<a class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-ddbb-button-1" href="<?php echo $button_url; ?>" title="<?php echo $button_text; ?>"><?php echo $button_text; ?></a>
						</div>
						<?php }?>
						</div>
					</div>
			</div>
		</div>
	</div>
