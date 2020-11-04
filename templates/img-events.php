<?php
/**
 * Events layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */

$options = get_option( 'ddbb_settings' );

query_posts(array(
   'post_type' => 'events',
   /*
   'meta_query'  => array(

   ), */
   'order'=>'ASC'
)); ?>

<?php

while (have_posts()) : the_post(); ?>
<?php
$short_desc = rwmb_meta( 'ev-short_description' );
$date = rwmb_meta( 'ev-date' );
$url = rwmb_meta( 'ev-url' );
?>
<div class="row event">
    <div class="col-12 d-flex align-items-center justify-content-center fx-op-up">
        <div class="row content">
            <div class="col-12 col-md-6 d-flex align-items-start justify-content-start">
                <?php if (has_post_thumbnail( $post->ID ) ): 
                $image = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>
                    <img src="<?php echo $image?>">  
                <?php endif; ?> 
            </div>
            <div class="col-12 col-md-6 info">
                <div class="date-title d-flex align-items-center justify-content-center">
                    <span class="date-button"><?php echo date( 'd.m', $date ); ?></span>
                    <h2><?php the_title(); ?></h2>
                </div>
                <?php if ($short_desc) { ?>
                <div class="short-desc">
                    <?php echo $short_desc; ?>
                </div>
                <?php }?>
                <?php if ($short_desc) { ?>
                <div class="book-url">
                    <a href="<?php if($url){echo $url;}else{echo "https://www.tableonline.fi/ee/tallinn/butterfly-lounge/1051/book";} ?>" target="_blank"><?php _e('Book a table','ddbb'); ?></a>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php endwhile;?>