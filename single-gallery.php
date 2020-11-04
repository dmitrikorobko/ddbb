<?php
/**
 * The template for displaying single products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */

get_header();
$options = get_option( 'ddbb_settings' );
$images = rwmb_meta( 'gal-images', array( 'size' => 'thumbnail' ) );
?>    

	<div class="main d-gallery single"> 
        <div class="ddbb-wrap hr-line-up p-t-xxl p-b-xxl">
			<div class="container">
	
                <div class="row">
                    <?php 
                    $i = 1;
                    foreach ( $images as $image ) {
                        /*
                        if($i % 4 === 0 || $i == 1) {
                            echo '<div class="row">';
                       
                        } */

                        $src = wp_get_attachment_image_src( $image['ID'], $size = 'large', $icon = false  ); //getting large image array
                        echo '<div class="col-6 col-sm-6 col-md-4">';
                        echo '<a href="', $src[0], '" class="fx-op-up" data-toggle="lightbox" data-gallery="', the_title() ,'" ><img src="', $image['url'], '" class="img-fluid"></a>';
                        echo '</div>';
                        /*
                        if($i % 3 === 0) {
                            echo '</div>';
                        } 

                        $i++;
                        */
                    }
                    ?>
                </div>
			</div>
		</div>		
	</div>  
	  
<?php get_footer(); ?>	