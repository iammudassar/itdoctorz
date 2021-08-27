<?php
/**
 *  Main template file 
 * 
 * @package itdoctorz
 */
 get_header();
?>
  <div id="primary">
    <main id="main" class="class-main mt-5" role="main" >
      <?php
        if(have_posts()) : 
          ?>
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-sm-12 ">

                    <?php 
                      if( is_home() && ! is_front_page() ){
                        ?>
                        <header class="mb-5"> 
                          <h1 class="page-title " > 
                            <?php single_post_title(); ?>
                          </h1>
                          
                        </header>
                    <?php
                      }
                          while( have_posts() ) : the_post(); 
                              get_template_part('template-parts/content');
                          endwhile;
                    
                      else :
                        get_template_part('template-parts/content-none');
                        endif;
                        ?>
                        <div class="prev-link"> <?php previous_post_link(); ?></div>
                        <div class="next-link"> <?php next_post_link(); ?></div>
              </div> 
              <div class="col-md-3 col-sm-12 ">
                <?php
                    get_sidebar();
                ?>
              </div>
            </div>

          </div>


      
    </main>

  </div>

<?php 
 get_footer();
