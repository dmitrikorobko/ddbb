<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */
global $post;
$page_id = get_queried_object_id();
$options = get_option( 'ddbb_settings' );
$currency = $options['ddbb_text_field_currency'];
$fullscreen_default = $options['ddbb_text_field_pr-subpage-header-img'];
$images = rwmb_meta( 'cat-images', array( 'size' => 'thumbnail' ) );
$price = rwmb_meta( 'cat-product_price' );
$saleprice = rwmb_meta( 'cat-product_sale_price' ); 
$tk = rwmb_meta( 'cat-product_price_tk' );
$instock = rwmb_meta( 'cat-product_stock' );
$addprice = rwmb_meta( 'cat-product_addprice' );
$addprice_tk = rwmb_meta( 'cat-product_addprice_tk' );
$addprice2 = rwmb_meta( 'cat-product_addprice2' );
$addprice2_tk = rwmb_meta( 'cat-product_addprice2_tk' );
get_header();
?>
	
    <div class="main catalog single"> 
        <div class="ddbb-wrap hr-line">
			<div class="container">
				<div class="row">
                    <div class="col-12 col-lg-3">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <span class="navbar-name"><?php _e( 'Category', 'ddbb' ); ?></span>
                            <span class="navbar-button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <?php _e( 'Category', 'ddbb' ); echo print_svg(get_bloginfo('template_directory') . '/assets/svg/select.svg') ;?></span>
                            <span class="navbar-bread"><?php if(is_object($post)) add_bread($post->ID, 'catalog_categories');?></span>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <?php catalog_menu("catalog-menu", $page_id ); ?>
                            </div>
                        </nav>
                        <?php 
                            if(is_active_sidebar('catalog_sidebar')){
                                dynamic_sidebar('catalog_sidebar');
                            }
                        ?>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12 breadcrumbs">
                            <?php if(is_object($post)) add_bread($post->ID, 'catalog_categories');?>
                            </div>
                        </div>
                        <div class="row mobile-rev">
                            <div class="col-md-6 images">
                                   
                                        <?php if ($saleprice) { ?><div class="sale-label">%</div><?php }?>
                                        <?php if (has_post_thumbnail( $post->ID ) ): 
                                        $image = get_the_post_thumbnail_url( $post->ID, 'medium' ); ?>
                                            <a href="<?php echo $image;?>" data-toggle="lightbox" data-gallery="<?php the_title()?>"><img src="<?php echo $image;?>" class="w-100"></a>
                                        <?php endif; ?> 
                      
                                <div class="row">
                                <?php 
                                $i = 1;
                                foreach ( $images as $image ) {
                                    /*
                                    if($i % 4 === 0 || $i == 1) {
                                        echo '<div class="row">';
                                
                                    } */

                                    $src = wp_get_attachment_image_src( $image['ID'], $size = 'large', $icon = false  ); //getting large image array
                                    echo '<div class="col-6 col-sm-6 col-md-6">';
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
                            <div class="col-md-6 info">
                                <h2><?php the_title(); ?></h2>
                                <div class="price">
                                            <h4><?php _e( 'Price', 'ddbb' ); ?>:</h4><?php if($addprice) echo "<br>"?>    
                                            <?php if ($saleprice) { ?><span class="sale"><?php if ($currency) { echo $currency; } echo $saleprice;?></span>
                                            <span class="actual"><?php if ($currency) { echo $currency; } echo $price;?></span> <?php } else { ?>
                                            <span class="actual"><?php if ($currency) { echo $currency; } echo $price;?></span><?php }?> 
                                            <?php if ($tk) { ?>/<?php echo $tk . 'tk'; }?>
                                            
                                            <?php if($addprice){?>
                                            <br>
                                            <span class="actual"><?php if ($currency) { echo $currency; } echo $addprice;?></span> 
                                            <?php if ($addprice_tk) { ?>/<?php echo $addprice_tk . 'tk'; }?>
                                            <?php } ?>

                                            <?php if($addprice2){?>
                                            <br>
                                            <span class="actual"><?php if ($currency) { echo $currency; } echo $addprice2;?></span> 
                                            <?php if ($addprice2_tk) { ?>/<?php echo $addprice2_tk . 'tk'; }?>
                                            <?php } ?>

                                            
                                </div>
                                
                                <h4><?php _e( 'Availability', 'ddbb' ); ?>: </h4>
                                <?php if ($instock) { ?><span class="instock"><?php _e( 'In Stock', 'ddbb' ); ?></span><?php  } 
                                else {?><span><?php _e( 'Out of Stock', 'ddbb' ); ?></span> <?php } ?>
                                <hr>
                                <?php the_content(); ?>
                                <div class="vc_btn3-container vc_btn3-inline"><a class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-ddbb-button-1" href="<?php site_url(); ?>#contact" title="Explore">Kontakt</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	  
<?php get_footer(); ?>	

    

