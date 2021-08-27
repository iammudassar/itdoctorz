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
            <?php 
            if( is_home() && ! is_front_page() ){
              ?>
              <header class="mb-5"> 
                <h1 class="page-title " > 
                  <?php   single_post_title(); ?>
                </h1>
                
              </header>
              <?php
            }
            
            ?>


            <div class="row">
             

                <?php 
                $index= 0;
                $no_of_cols = 3;
                
                while( have_posts() ) : the_post(); 
                    if( 0 === $index % $no_of_cols ){
                      ?>
                      <div class="col-lg-4 col-sm-6 col-xs-12 " > 
                      <?php
                    }

                    get_template_part('template-parts/content');

                    $index++;

                    if( 0 !== $index && 0 === $index % $no_of_cols ){
                      ?> 
                        </div>
                      <?php
                    }

                endwhile;
                ?>

            </div>
          </div>

          <?php
            else :
               get_template_part('template-parts/content-none');
              endif;
      
          ?>

      <div class="container">
        <?php  itdoctorz_pagination(); ?>
      </div>
    </main>
  </div>

<?php 
 get_footer();
