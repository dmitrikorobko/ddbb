<?php
/**
 * Horizontal menu, scrolls on mobile
 *
 * @since   0.0.1
 * @package ddbb
 */
global $wp_query;
$current_id = $wp_query->get_queried_object_id();

?>

<div class="horizontal-sroll-menu hr-line"> 

        <div class="container">
            <div class="row">
                <div class="scroll-menu">
                    <nav>
                        <?php horizontal_custom_menus("horizontal-scroll-menu", $current_id);?> 
                    </nav>
                </div>
            </div>
        </div>
</div>