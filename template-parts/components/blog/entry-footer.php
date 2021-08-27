<?php 
/**
 * Entry Footer component
 * 
 * use inside the loop of wp
 * 
 * @package itdoctorz
 */

 $the_post_id = get_the_ID();
 $article_terms = wp_get_post_terms( $the_post_id , ['category' ,'post_tag' ] );
 if(  empty( $article_terms ) || ! is_array( $article_terms ) ){
    return;

}

?>

<div class="entry-footer mt-2">
 <?php 
   foreach ( $article_terms as $key => $article_term ) {
      ?>
      <button class="badge badge-dark border border-secondary mb-2 "> 
          <a class="entry-footer-link text-white" href="<?php echo esc_url( get_term_link( $article_term ) )  ?>"> <?php echo $article_term->name; ?>  </a> 
      </button>
      <?php
   }
 ?>
</div> 
 