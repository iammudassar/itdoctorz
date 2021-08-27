<?php
/**
 * Footer file
 * 
 * @package itdoctorz
 */
?>


</div> <!-- close content -->
</div> <!-- close page -->


<footer> 
    <div class="container-fluid copyright text-center bg-dark text-white ">
        <?php
                if( is_active_sidebar('sidebar-2') ){
                    dynamic_sidebar('sidebar-2');
                }
        
        ?>
    </div>
  
    
</footer>
<?php wp_footer(); ?>
    </body>
</html>
