<?php
/**
 * Register Sidebars
 * 
 * @package itdoctorz
 */

 namespace ITDOCTORZ_THEME\Inc;
 use ITDOCTORZ_THEME\Inc\Traits\Singleton;


 class Sidebars{ 
     use Singleton;

     protected function __construct()
     {
        
         $this->setup_hooks();

     }
     protected function setup_hooks(){
         /**
          * Actions
          */
         add_action('widgets_init' , [ $this , 'register_sidebars' ]);
         add_action('widgets_init' , [ $this , 'register_clock_widget' ]);


     }

     public function register_sidebars(){

        register_sidebar( 
            [
            'name'          => __( 'Sidebar', 'itdoctorz' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Main Sidebar' , 'itdoctorz' ),
            'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ]
    ); 

        register_sidebar( 
            [
            'name'          => __( 'Footer Sidebar', 'itdoctorz' ),
            'id'            => 'sidebar-2',
            'description'   => __( 'Footer Sidebar' , 'itdoctorz' ),
            'before_widget' => '<div id="%1$s" class="widget widget-sidebar-footer cell column %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
         ]

         ); 

     }
     public function register_clock_widget(){
         register_widget('ITDOCTORZ_THEME\Inc\Clock_Widget');

     }

  
 }


