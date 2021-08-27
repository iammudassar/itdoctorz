<?php
/**
 * Register Meta Boxes
 * 
 * @package itdoctorz
 */

 namespace ITDOCTORZ_THEME\Inc;
 use ITDOCTORZ_THEME\Inc\Traits\Singleton;


 class Meta_Boxes{
     use Singleton;

     protected function __construct()
     {
        
         $this->setup_hooks();

     }
     protected function setup_hooks(){
         /**
          * Actions
          */
         add_action('add_meta_boxes' , [ $this , 'add_custom_meta_box' ]);
         add_action('save_post' , [ $this , 'save_post_meta_data' ]);

        
           
     }

     public function add_custom_meta_box( $post ){
         $screens = ['post'];
         
         foreach( $screens as $screen ){
            add_meta_box( 
                'hide-page-title',
                __( 'Hide Page Title' , 'itdoctorz' ),
                [ $this , 'custom_meta_box_html' ] , 
                $screens,
                'side'
            );

         }

     }
  


     public function custom_meta_box_html( $post ){

        $value= get_post_meta( $post->ID , '_hide_page_title' , true );

        /**
         * Create a nonce
         */

        wp_nonce_field( plugin_basename( __FILE__ ) ,'_hide_page_title_nonce');


        ?>
        <label for="itdoctorz-field"> <?php esc_html_e('Hide the Title '); ?> </label>

        <select name="itdoctorz_hide_title_field" id="itdoctorz-field" class="post-box"  >

            <option value=""> <?php esc_html_e('Select' , 'itdoctorz' ); ?> </option> 

            <option value="yes" <?php selected( $value , 'yes' ); ?> > 
                <?php esc_html_e('Yes' , 'itdoctorz' ); ?> 
            </option>

            <option value="no" <?php selected( $value , 'no' ); ?> >
                <?php esc_html_e('No' , 'itdoctorz' ); ?>
            </option>

        </select>
        <?php

     }


     public function save_post_meta_data( $post_id ){

        if( ! current_user_can('edit_post' , $post_id ) ){
            return ;
        }
        /**
         * Verify the nonce we recieved
         */
        
         if( ! isset( $_POST['_hide_page_title_nonce'] ) || 
         ! wp_verify_nonce (  $_POST['_hide_page_title_nonce'] , plugin_basename(__FILE__) , ) )
         {
             return;
         }

        if ( array_key_exists( 'itdoctorz_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['itdoctorz_hide_title_field']
            );

        }

     }
    

  
 }


