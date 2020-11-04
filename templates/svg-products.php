<?php
/**
 * Products layout with svg icons.
 *
 * @since   0.0.1
 * @package ddbb
 */
//require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');
query_posts(array(
   'post_type' => 'products',
   'order'=>'ASC'
)); ?>
<div class="row">

<?php

while (have_posts()) : the_post(); ?>
<div class="col-6 col-md-4 col-lg-4  d-flex align-items-center justify-content-center">
    <a href="<?php the_permalink() ?>">
        <div class="item">
            <?php
            $images = rwmb_meta( 'pr-svg-file', array( 'link' => 'true' ) );

            foreach ( $images as $image ) {
                echo '<img src="', $image['url'], '">';
            }
            ?>
            <h4><?php the_title(); ?></h4>
        </div>
    </a>
</div>

<?php endwhile;?>

</div>
