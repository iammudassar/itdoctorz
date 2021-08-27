<?php
/**
 * entry content template component
 * 
 * @package itdoctorz
 */
?>

<div class="entry-content">
    <?php 
        if( is_single() ){
            the_content(
                sprintf(
                    wp_kses(
                        __('Continue Reading %s<span class="meta-nav">&rarr;</span>', 'itdoctorz' ),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    )
                         ,
                            the_title(
                                '<span class="screen-reader-text" >' , '</span>' , 
                            false , )   
                            )      
            );

            wp_link_pages([
                'before' => '<div class="page-links">' . esc_html__('Pages: ' , 'itdoctorz' ) ,
                'after' => '</div>'
            ]); 

        }
        else{
            itdoctorz_the_excerpt(70);
            echo itdoctorz_excerpt_more(); 
        }

       

        ?>

</div> 