<?php
/**
 * Products layout with svg icons.
 *
 * @since   0.0.1
 * @package ddbb
 */

query_posts(array(
   'post_type' => 'catalog',
   'order'=>'DESC',
   'meta_query' => array(
        array(
            'key' => 'cat-product_popular',
            'value' => 1
        )
    )
)); 
$options = get_option( 'ddbb_settings' );
$currency = $options['ddbb_text_field_currency'];
?>
                        <div class="row">
                            <?php while ( have_posts() ) : the_post(); ?>
                            <?php
                            $price = rwmb_meta( 'cat-product_price' );
                            $saleprice = rwmb_meta( 'cat-product_sale_price' ); 
                            $tk = rwmb_meta( 'cat-product_price_tk' );
                            $instock = rwmb_meta( 'cat-product_stock' );
                            ?>
                            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column align-items-start justify-content-start fx-op-up">
                                <div class="item">
                                    <a href="<?php the_permalink() ?>">
                                    <div class="img">
                                        <?php if ($saleprice) { ?><div class="sale-label">%</div><?php }?>  
                                        <?php if (has_post_thumbnail( $post->ID ) ): 
                                        $image = get_the_post_thumbnail_url( $post->ID, 'thumbnail' ); ?>
                                            <img src="<?php echo $image;?>" class="w-100">
                                        <?php endif; ?> 
                                        <div class="info">
                                            <div class="title col-8">
                                                <h3><?php the_title(); ?></h3>                                    
                                            </div>
                                            <div class="price col-4">
                                                <?php if ($saleprice) { ?><span class="sale"><?php if ($currency) { echo $currency; } echo $saleprice;?></span><br>
                                                <span class="actual"><?php if ($currency) { echo $currency; } echo $price;?></span> <?php } else { ?>
                                                <span class="actual"><?php if ($currency) { echo $currency; } echo $price;?></span><?php }?> 
                                                <?php if ($tk) { ?>/<?php echo $tk . 'tk'; }?> 
                                            </div>
                                        </div>
                                    
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <?php endwhile;?>
                        </div>