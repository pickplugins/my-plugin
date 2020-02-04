<?php
if ( ! defined('ABSPATH')) exit;  // if direct access




if(!class_exists('myPlugin')){
    class myPlugin{

        public function __construct(){

            define('my_plugin_url', plugins_url('/', __FILE__)  );
            define('my_plugin_dir', plugin_dir_path( __FILE__ ) );
            define('my_plugin_name', 'Related Post' );
            define('my_version', '1.0.0' );


            // Hooks
            add_action( 'wp_enqueue_scripts', array( $this, '_front_scripts' ) );
            add_action( 'admin_enqueue_scripts', array( $this, '_admin_scripts' ) );
            add_action( 'plugins_loaded', array( $this, '_textdomain' ));

            register_activation_hook( __FILE__, array( $this, '_activation' ) );

        }

        public function _activation(){

        }



        public function _textdomain(){

            // Global files
            $locale = apply_filters( 'plugin_locale', get_locale(), 'my-plugin' );
            load_textdomain('my-plugin', WP_LANG_DIR .'/my-plugin/my-plugin-'. $locale .'.mo' );

            // Plugin files
            load_plugin_textdomain( 'my-plugin' , false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
        }



        function _front_scripts(){

            //wp_register_style('font-awesome-5', related_post_plugin_url.'assets/front/css/fontawesome.css');

        }


        function _admin_scripts(){

            // settings-tabs framework
            //wp_register_script('settings-tabs', related_post_plugin_url.'assets/admin/js/settings-tabs.js' , array( 'jquery' ));
            //wp_register_style('settings-tabs', related_post_plugin_url.'assets/admin/css/settings-tabs.css');

        }
    }

}

new myPlugin();



