<?php
/**
 * Products layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */
query_posts(array(
   'post_type' => 'products',
   'order'=>'ASC'
)); ?>
<div class="row">

<?php

while (have_posts()) : the_post(); ?>
<div class="col-12 col-md-6 d-flex align-items-center justify-content-center fx-op-up">
    <a href="<?php the_permalink() ?>">
        <div class="item">
        <?php if (has_post_thumbnail( $post->ID ) ): 
           $image = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>
            <img src="<?php echo $image?>">  
        <?php endif; ?> 
            <h3><?php the_title(); ?></h3>
        </div>    
    </a>
</div>

<?php endwhile;?>

</div>
