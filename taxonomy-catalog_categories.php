<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */
$options = get_option( 'ddbb_settings' );
$page_id = get_queried_object_id();
$current_term = get_queried_object()->term_id;
$currency = $options['ddbb_text_field_currency'];
global $post;
global $pagination_items;
global $wp;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$the_posts = new WP_Query( array(
    'post_type' => 'catalog',
    'tax_query' => array(
        array(
            'taxonomy' => 'catalog_categories',
            'field'    => 'term_id',
            'terms'    => $current_term
        ),
    ),
    'paged' => $paged,
    'order'=>'DESC'
));
   


get_header();
?>
	
     
    <div class="main catalog taxonomy"> 
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
                    <div class="col-12 col-lg-9 catalog-items">
                        <div class="row">
                            <div class="col-12 breadcrumbs">
                            <?php if(is_object($post)) add_bread($post->ID, 'catalog_categories');?>
                            </div>
                        </div>
                        <div class="row">
                            <?php while ( $the_posts->have_posts() ) : $the_posts->the_post(); ?>
                            <?php
                            $price = rwmb_meta( 'cat-product_price' );
                            $saleprice = rwmb_meta( 'cat-product_sale_price' ); 
                            $tk = rwmb_meta( 'cat-product_price_tk' );
                            $instock = rwmb_meta( 'cat-product_stock' );
                            ?>
                            <div class="col-12 col-md-4 d-flex flex-column align-items-start justify-content-start fx-op-up">
                                <div class="item">
                                    <a href="<?php the_permalink() ?>">
                                    <div class="img">
                                        <?php if ($saleprice) { ?><div class="sale-label">%</div><?php }?>  
                                        <?php if (has_post_thumbnail( $post->ID ) ): 
                                        $image = get_the_post_thumbnail_url( $post->ID, 'thumbnail' ); ?>
                                            <img src="<?php echo $image;?>" class="w-100">
                                        <?php endif; ?> 
                                        <div class="price">
                                            <?php if ($saleprice) { ?><span class="sale"><?php if ($currency) { echo $currency; } echo $saleprice;?></span>
                                            <span class="actual"><?php if ($currency) { echo $currency; } echo $price;?></span> <?php } else { ?>
                                            <span class="actual"><?php if ($currency) { echo $currency; } echo $price;?></span><?php }?>  
                                            <?php if ($tk) { ?>/<?php echo $tk . 'tk'; }?> 
                                        </div>
                                    </div>
                                    
                                    <div class="title">
                                            <h3><?php the_title(); ?></h3>                                    
                                    </div>
                                    </a>
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
                </div>
            </div>
        </div>
    </div> 
	  
<?php get_footer(); ?>	


