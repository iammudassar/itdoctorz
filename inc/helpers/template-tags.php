<?php
function get_the_custom_post_thumbnail( $post_id, $size= 'featured-thumbnail', $additional_attributes_array = [] )
{
    $custom_thumbnail='';
    if(null === $post_id){

        $post_id = get_the_ID();

    }
    if( has_post_thumbnail( $post_id) ){
        $default_attributes= [
            'loading' => 'lazy'
        ];
        $attributes = array_merge( $additional_attributes_array , $default_attributes  );

    }

    $custom_thumbnail = wp_get_attachment_image(
        get_post_thumbnail_id( $post_id ),
        $size,
        false, 
        $attributes
    );

    return $custom_thumbnail;


}

 function the_post_custom_thumbnail( $post_id, $size= 'featured-image', $additional_attributes = [] )
{
    echo get_the_custom_post_thumbnail( $post_id, $size , $additional_attributes);
   
}
 function itdoctorz_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>'; 
    if( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ){

    $time_string = '<time class="entry-date published " datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s" >%4$s</time>'; 
    

    }

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ) ,
        esc_attr( get_the_date() ) ,
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s' , 'post date ' , 'itdoctorz' ) ,
        '<a href="'. esc_url( get_permalink() )  .'" rel="bookmark" > '. $time_string .'</a>'
    );
    echo '<span class="posted-on text-secondary">'. $posted_on . '</span>';

}

 function itdoctorz_posted_by() 
{
    $byline= sprintf(
        esc_html_x('by %s' , 'post author' , 'itdoctorz' ),
        '<span class="author vcard" > <a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"> '. esc_html( get_the_author() ) .'</a></span>'

    );

    echo '<span class="byline text-secondary">'. $byline .'</span>';

   
}

function itdoctorz_the_excerpt( $trim_char_count = 0 ){
 if( ! has_excerpt() ||  0 === $trim_char_count ){
     the_excerpt();
     return; 
 }

 $excerpt = wp_strip_all_tags( get_the_excerpt() ) ; 
 $excerpt = substr( $excerpt , 0 , $trim_char_count  );


 echo '<p>'. $excerpt . '[...]</p>' ; 

}

function itdoctorz_excerpt_more()
{
    if(! is_single() ){
        $more= sprintf(  '<button class="mt-1 btn btn-info btn-info" > <a class="itdoctorz-read-more text-white" href="%1$s">%2$s </a></button>'  ,
        get_permalink( get_the_ID() ) ,
        __('Read More' , 'itdoctorz'  )
    );
  
    }
    return $more;

}

function itdoctorz_pagination(){
    $allowed_tags =[
        'span' => [
            'class' => []
        ],
        'a' => [
            'class' => [],
            'href'  => []
        ]      
    ];

    $args =[  
        'before_page_number' => '<span class="badge border border-secondary mr-1 mb-2 p-2">',
        'after_page_number' => '</span>'
    ];
   


    printf('<nav class="itdoctorz-pagination clearfix text-center ">%s</nav>', wp_kses( paginate_links( $args ) , $allowed_tags ));
}
