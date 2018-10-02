<?php
/*
Plugin Name: Medical Orthodontics Dental Directory
Plugin URI:  http://medicalorthodontics.org
Description: Medical Orthodontics Dental Directory plugin ~ Add shortcode - [dental-dir]
Version:     1.2
Author:      danielortiz
Author URI:  http://brandingverticals.com/
*/

function dental_dir_setup(){

	register_post_type( 'doctors',
            array(
                'labels' => array(
                    'name' => 'Doctors',
                    'singular_name' => 'Doctor',
                    'add_new' => 'Add New Doctor',
                    'add_new_item' => 'Add New Doctor',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Doctor',
                    'new_item' => 'New Doctor',
                    'view' => 'View Doctor',
                    'view_item' => 'View Doctor',
                    'search_items' => 'Search Doctors',
                    'not_found' => 'No Doctors found',
                    'not_found_in_trash' => 'No Doctors found in Trash',    
                ),
                'public' => true,
                'menu_position' => 15,
                'supports' => array('title', 'editor', 'thumbnail'),
                'taxonomies' => array( 'member' ),
                'menu_icon' => 'dashicons-businessman',
                'has_archive' => true
            )
        );

}
add_action('init', 'dental_dir_setup');

function dental_dir_active(){

    dental_dir_setup();
    flush_rewrite_rules();

}
register_activation_hook(__FILE__, 'dental_dir_active');

function dental_dir_shortcode(){
    // Load the widget template
    require_once(plugin_dir_path(__FILE__) . 'templates/dental-dir-template.php');
}
add_shortcode('dental-dir', 'dental_dir_shortcode');

/* Filter the single_template with our custom function*/
add_filter('single_template', 'dental_dir_single_template');

function dental_dir_single_template($single) {
    global $wp_query, $post;
    /* Checks for single template by post type */
    if ( $post->post_type == 'doctors' ) {
        if ( file_exists( plugin_dir_path(__FILE__) . 'templates/dental-dir-single.php' ) ) {
            return plugin_dir_path(__FILE__) . 'templates/dental-dir-single.php';
        }
    }
    return $single;
}

function doctor_scripts(){
    wp_register_style( 'doctor-style', plugin_dir_url( __FILE__ ) . 'css/doctor.css' );
    wp_enqueue_style( 'doctor-style' );
}
// end of doctor_scripts
add_action('wp_enqueue_scripts', 'doctor_scripts');

add_action('admin_enqueue_scripts', 'admin_doctor_style');
function admin_doctor_style() {
  wp_enqueue_style('admin-doctor-styles', plugin_dir_url( __FILE__ ) . 'css/admin.css');
}
// end of admin_doctor_style

require_once(plugin_dir_path(__FILE__) . 'inc/custom_taxonomies.php');
require_once(plugin_dir_path(__FILE__) . 'inc/meta_boxes.php');



