<?php
/**
 * The template for displaying the footer
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ddbb
 */

?>
    
    <?php ddbb_footer(); ?>

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		var $i = jQuery.noConflict(true);
	</script> 

	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>	
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<?php wp_footer(); ?>
	
	<script type="text/javascript">
    if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
		document.write('<script src="https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2"><\/script>');
	}    
	</script>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/jquery.gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script> 

	<?php if ( is_singular( array('gallery', 'catalog') ) ) { ?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet">
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script> 
	<script type="text/javascript">
			
			
			(function($) {
				$(document).on('click', '[data-toggle="lightbox"]', function(event) {
					event.preventDefault();
					$(this).ekkoLightbox();
				});
			})(jQuery);
	</script>
	<?php 
	  
	} ?>
	
	
	<script type="text/javascript">
    if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
		cssVars({
  			exclude: '[href*=bootstrap]',
		});
	}    
	</script>

	<script src="<?php echo get_bloginfo('template_directory'); ?>/js/main.js"></script>
</body>
</html>