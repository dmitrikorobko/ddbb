<?php
/**
 * Products layout with thumb images.
 *
 * @since   0.0.1
 * @package ddbb
 */
$options = get_option( 'ddbb_settings' );
$currency = $options['ddbb_text_field_currency'];
global $product_category;
global $pagination_items;
global $wp;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

if( isset( $_GET['price_low'] ) && isset( $_GET['price_high'] ) ) {
    $the_posts = new WP_Query( array(
        'post_type' => 'products',
        'posts_per_page' => $pagination_items,
        'category_name' => $product_category,
        'paged' => $paged,
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'pr-product_sale_price',
                'value' => array( $_GET['price_low'], $_GET['price_high'] ),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            ),
            array(
                'relation' => 'AND',
                array(
                    'key' => 'pr-product_price',
                    'value' => array( $_GET['price_low'], $_GET['price_high'] ),
                    'type' => 'numeric',
                    'compare' => 'BETWEEN'
                ),
                array(
                    'key' => 'pr-product_sale_price',
                    'value' => '',
                    'type' => 'numeric',
                    'compare' => 'NOT EXISTS'
                ),
            )
        )
    ));
} else {
    $the_posts = new WP_Query( array(
        'post_type' => 'products',
        'posts_per_page' => $pagination_items,
        'category_name' => $product_category,
        'paged' => $paged,
        'order'=>'ASC'
    ));
}
?>
<div class="products-sort-menu hr-line"> 

        <div class="container">
            <div class="row">
                <div class="scroll-menu">
                <nav>
                <div class="col-6 col-md-4 d-flex align-items-center justify-content-start filter">
                    <span><?php _e('Filter Products','ddbb'); ?></span>
                </div>
                <div class="col-12 col-md-8 d-flex align-items-center justify-content-end">
                    <a href="<?php echo get_nopaging_url()?>"><?php _e('All','ddbb'); ?></a>
                    <a href="<?php echo get_nopaging_url()?>?price_low=0&price_high=199"><?php _e('Under','ddbb'); ?> €200</a>
                    <a href="<?php echo get_nopaging_url()?>?price_low=200&price_high=399">€200 - 400</a>
                    <a href="<?php echo get_nopaging_url()?>?price_low=400&price_high=599">€400 - 600</a>
                    <a href="<?php echo get_nopaging_url()?>?price_low=599&price_high=100000000"><?php _e('More than','ddbb'); ?> €600</a>
                </div>
</nav>
                </div>
            </div>

        </div> 

</div>

<div class="container">
<div class="row products-list-nourl">

<?php while ( $the_posts->have_posts() ) : $the_posts->the_post(); ?>
<?php
 $price = rwmb_meta( 'pr-product_price' );
 $saleprice = rwmb_meta( 'pr-product_sale_price' ); 
 $size = rwmb_meta( 'pr-product_sizes' );
 $sku = rwmb_meta( 'pr-product_sku' );
?>
<div class="col-12 col-md-6 d-flex flex-column align-items-start justify-content-start fx-op-up">

        <?php if (has_post_thumbnail( $post->ID ) ): 
           $image = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>
            <a href="<?php echo home_url( $wp->request )?>/#contact" class="w-100"><img src="<?php echo $image;?>"> </a>
        <?php endif; ?> 
        <div class="info">
            <div> 
                <h3><?php the_title(); ?></h3>
            </div>
            <div>
                <?php if ($saleprice) { ?><p><?php if ($currency) { echo $currency; } echo $saleprice;?></p><p class="oldprice"><?php if ($currency) { echo $currency; } echo $price;?></p> <?php } else { ?><p><?php if ($currency) { echo $currency; } echo $price;?></p><?php }?>  
            </div>
        </div>
        
        <div class="addinfo">
            <div> 
                <?php if ($sku) {?><p><?php echo $sku;?></p> <?php } ?>
                <?php if ($size) {?><p><?php _e('Sizes','ddbb'); ?>: <?php echo $size;?></p>  <?php } ?>
            </div>
            <div>
                <a href="<?php echo home_url( $wp->request )?>/#contact" class="order"><?php _e('Order now','ddbb'); ?></a>
            </div>
        </div>


</div>
<?php endwhile;?>

<div class="pagination p-b-xl">
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
</div>
