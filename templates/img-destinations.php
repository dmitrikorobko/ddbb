<?php
/**
 * Products layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */

$options = get_option( 'ddbb_settings' );
$currency = $options['ddbb_text_field_currency'];

query_posts(array(
   'post_type' => 'destinations',
   /*
   'meta_query'  => array(

   ), */
   'order'=>'ASC'
)); ?>

<div class="row p-b-lg heading">
    <div class="col-12 col-md-8 d-flex align-items-center justify-content-start fx-op-up">
        <h2><?php _e('Popular Destinations','ddbb'); ?></h2>
    </div>
    <div class="col-12 col-md-4 d-none d-lg-flex align-items-center justify-content-end fx-op-up">
        <a href="#"><?php _e('See all places','ddbb'); ?></a>
    </div>
</div>


<div class="row featured">

<?php

while (have_posts()) : the_post(); ?>
<?php
$price = rwmb_meta( 'pr-destination_start_price' );
?>
<div class="col-12 col-md-4 d-flex align-items-center justify-content-center fx-op-up">
    <a href="<?php the_permalink() ?>">
        <div class="item">
        <?php if (has_post_thumbnail( $post->ID ) ): 
           $image = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>
            <img src="<?php echo $image?>">  
        <?php endif; ?> 
            <div class="information">
                <h3><?php the_title(); ?></h3>
                <p><?php _e('From','ddbb'); ?>: <?php echo $price; if ($currency) { echo $currency; } ?></p>
            </div>
        </div>    
    </a>
</div>
<?php endwhile;?>
</div>


<div class="row p-b-lg heading d-flex d-sm-none">
    <div class="col-12 col-md-4 align-items-center justify-content-end fx-op-up">
        <a href="#"><?php _e('See all places','ddbb'); ?></a>
    </div>
</div>