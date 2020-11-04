<?php
/**
 * Products layout with svg icons.
 *
 * @since   0.0.1
 * @package ddbb
 */
//require_once(get_stylesheet_directory() . '/external/meta-box/meta-box.php');
query_posts(array(
   'post_type' => 'faq',
   'order'=>'ASC'
)); ?>


<?php

while (have_posts()) : the_post(); ?>

<div class="faq hr-line-up"></div>
<div class="faq p-t-xxl p-b-xxl">

    <div class="container">
        <div class="row">

            <div class="col-12 col-md-4 col-lg-4  d-flex">

                        <h2><?php the_title(); ?></h2>


            </div>

            <div class="col-12 col-md-8 col-lg-8  d-flex flex-column">

                        <?php
                        $values = rwmb_meta( 'faq-qa' );

                        foreach ( $values as $value ) { ?>
                            <h3><?php echo $value['question'];?></h3>
                            <p><?php echo $value['answer'];?></p>
                        <?php }
                        ?>

            </div>

        </div>
    </div>

</div>
<?php endwhile;?>


