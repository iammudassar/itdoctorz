<?php
/**
 * no content template part 
 * 
 * @package itdoctorz
 */
?>

 <section class="no-result not-found">
     <header class="page-header">
         <h1 class="page-title"> <?php esc_html_e('No Content Found','itdoctorz'); ?> </h1>
     </header>
 
 </section>

 <div class="page-content">
     <?php 
     if( is_home() && current_user_can( 'publish_posts' ) ){
            ?>
            <p>
                <?php 
                printf(
                    wp_kses(
                        __('Ready to publish your first post? <a href="%s"> Get started here </a> ', 'itdoctorz' ),
                        [ 'a'=>[
                            'href' => []
                        ]
                    ]
                        ),
                        esc_url( admin_url('post-new.php') )
                )
                ?>
            </p>
            <?php
     }
     elseif ( is_search() ) {
       ?>
       <p> <?php esc_html_e('Sorry! Nothing found matching your search' , 'itdoctorz' ) ?> </p>
       <?php
        get_search_form();
     } else {
        ?>
        <p> <?php esc_html_e('Sorry! Nothing found... You can search' , 'itdoctorz' ) ?> </p>
        <?php
         get_search_form();


     }
     ?>

 </div>