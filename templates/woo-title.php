    
 <?php
/**
 * Woo title banner template.
 *
 * @since   0.0.1
 * @package ddbb
 */ 
$options = get_option( 'ddbb_settings' );
?>
	
    <div class="title-banner">
		<div class="ddbb-wrap">
			<div class="row title-banner-woo">  
                
                    <?php if ( !empty($options['ddbb_text_field_pr-woo-header-img'] )){ ?>
                            <div class="absolute-bg">
                                <img src="<?php echo $options['ddbb_text_field_pr-woo-header-img']; ?>">
                            </div>
                    <?php } ?>

					<div class="container wpb_column vc_column_container vc_col-sm-12 d-flex align-items-center justify-content-start">
						<div class="vc_column-inner">
					
						<?php the_title( '<h1>', '</h1>' ); ?>
						</div>
					</div>
            </div>
        </div>
    </div>
  