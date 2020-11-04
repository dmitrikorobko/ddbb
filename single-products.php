<?php
/**
 * The template for displaying single products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddbb
 */

global $products_single_layout; 

if ($products_single_layout == 2) {
	require get_stylesheet_directory() . '/single-products/2.php'; }
else {
	require get_stylesheet_directory() . '/single-products/1.php'; 
	};


?>	