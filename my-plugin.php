<?php
/*
Plugin Name: My Plugin
Plugin URI: http://pickplugins.com/item/my-plugin
Description: Plugin description text, this is dummy plugin to show how the plugin works.
Version: 1.0.1
Author: PickPlugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

define('my_plugin_url', plugins_url('/', __FILE__)  );
define('my_plugin_dir', plugin_dir_path( __FILE__ ) );
define('my_plugin_name', 'My Plugin' );
define('my_plugin_version', '1.0.0' );

// Hooks
add_action( 'wp_enqueue_scripts', 'my_plugin_front_scripts' );
add_action( 'admin_enqueue_scripts', 'my_plugin_admin_scripts' );
add_action( 'plugins_loaded', 'my_plugin_textdomain');

register_activation_hook( __FILE__, 'my_plugin_activation' );

function my_plugin_activation(){

    // Run code here on plugin activate.
    update_option('my_plugin_version', '1.0.0');

}




function my_plugin_front_scripts(){

    //wp_register_style('font-awesome-5', related_post_plugin_url.'assets/front/css/fontawesome.css');

}


function my_plugin_admin_scripts(){

    // settings-tabs framework
    //wp_register_script('settings-tabs', related_post_plugin_url.'assets/admin/js/settings-tabs.js' , array( 'jquery' ));
    //wp_register_style('settings-tabs', related_post_plugin_url.'assets/admin/css/settings-tabs.css');

}




add_filter('the_title', 'my_plugin_custom_title');

function my_plugin_custom_title($title){

        $title = 'Hello World: '.$title;

    return $title;

}