<?php
/**
 * Products layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */
global $wp_query;
$current_id = $wp_query->get_queried_object_id();

$menu_items = new WP_Query(array(
   'post_type' => 'products',
   'order'=>'ASC'
)); ?>

<div class="scroll-menu">
  <nav>
    <?php
    if($menu_items->have_posts())
    {
        while ( $menu_items->have_posts() ) {
            $menu_items->the_post();
            if( $current_id == get_the_ID() ) { ?>
                <a href="<?php the_permalink() ?>" class="current"><?php the_title(); ?></a>
            <?php } else {?>
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            <?php
            }
        }
    }
    ?>
  </nav>
</div>