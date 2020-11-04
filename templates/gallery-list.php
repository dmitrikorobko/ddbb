<?php
/**
 * Gallery layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */

global $pagination_items;

$the_posts = new WP_Query( array(
   'post_type' => 'gallery',
   'posts_per_page' => $pagination_items,
   'paged' => $paged,
   'order'=>'ASC'
)); ?>
<div class="row d-gallery">

<?php

while ( $the_posts->have_posts() ) : $the_posts->the_post();

$subtitle = rwmb_meta( 'gal-subtitle' ); ?>

<?php if (has_post_thumbnail( $post->ID ) ): 
    $image = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>

<div class="col-12 col-md-6 list-items d-flex align-items-center justify-content-center fx-op-up">

    <a href="<?php the_permalink() ?>" class="list-item">
        <div>
     
            <img src="<?php echo $image?>">  
     
            <div class="overlay">
                <h2><?php the_title(); ?></h2>
                <?php if ($subtitle) {?><h3><?php echo $subtitle;?></h3><?php }?>
            </div>
        </div>    
    </a>

</div>

<?php endif; ?> 

<?php endwhile;?>

<div class="pagination">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $the_posts->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => false,
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
</div>

</div>
