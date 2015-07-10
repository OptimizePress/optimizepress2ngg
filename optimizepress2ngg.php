<?php
/*
Plugin Name: OptimizePress 2 fix for NextGEN Gallery
Plugin URI: http://www.optimizepress.com
Description: Removes NGG 'parse_content' filter for AJAX requests in LE
Version: 1.0
Author: Luka Peharda
Author URI: http://www.optimizepress.com
*/

function op_remove_ngg_parse_content_filter()
{
    global $wp_filter;

    if (DOING_AJAX && class_exists('C_NextGen_Shortcode_Manager') && 0 === strpos($_POST['action'], 'optimizepress')) {
        remove_filter('the_content', array(C_NextGen_Shortcode_Manager::get_instance(), 'parse_content'), PHP_INT_MAX - 1);
    }
}

add_action('init', 'op_remove_ngg_parse_content_filter');