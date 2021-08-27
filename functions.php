<?php 
/**
 * Theme functions.
 * 
 * @package itdoctorz
 */

 if( ! defined('ITDOCTORZ_DIR_PATH') ){
     define('ITDOCTORZ_DIR_PATH' , untrailingslashit( get_template_directory() ) );
     
}

if( ! defined('ITDOCTORZ_DIR_URI') ){
   define('ITDOCTORZ_DIR_URI' , untrailingslashit( get_template_directory_uri() ) );
   
}
if( ! defined('ITDOCTORZ_DIR_URI') ){
   define('ITDOCTORZ_DIR_URI' , untrailingslashit( get_template_directory_uri() ) );
   
}


require_once ITDOCTORZ_DIR_PATH . '/inc/helpers/autoloader.php' ;
require_once ITDOCTORZ_DIR_PATH . '/inc/helpers/template-tags.php' ;


function itdoctorz_get_theme_instance(){
   \ITDOCTORZ_THEME\Inc\ITDOCTORZ_THEME::get_instance();
}

itdoctorz_get_theme_instance();

 function itdoctorz_enqueue_scripts() { //  enqueue all the scrips 
    // registering all the styles
    
}

 add_action('wp_enqueue_scripts' , 'itdoctorz_enqueue_scripts');


?>

