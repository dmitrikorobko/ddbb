<?php
/**
 * Products layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */
global $product_quantity;

query_posts(array(
   'post_type' => 'products',
   'posts_per_page' => $product_quantity,
   'order'=>'ASC'
)); ?>
<div class="row products-list-nourl mainpage">

<?php

while (have_posts()) : the_post(); 

$sku = rwmb_meta( 'pr-product_sku' );
?>
<div class="col-12 col-md-6 d-flex flex-column align-items-start justify-content-start fx-op-up">

<?php if (has_post_thumbnail( $post->ID ) ): 
   $image = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>
    <a href="<?php the_permalink() ?>" class="w-100"><img src="<?php echo $image;?>"> </a>
<?php endif; ?> 
<div class="info">
    <div> 
        <h3><?php the_title(); ?></h3>
    </div>
</div>

<div class="addinfo">
    <div> 
        <?php if ($sku) {?><p><?php echo $sku;?></p> <?php } ?>
    </div>
</div>


</div>

<?php endwhile;?>

</div>
