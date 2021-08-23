<?php
/**
 * Bootstraps the Theme.
 * 
 * @package itdoctorz
 */

 namespace ITDOCTORZ_THEME\Inc;

use ITDOCTORZ_THEME\Inc\Traits\Singleton;

 class ITDOCTORZ_THEME{
     
    use Singleton; 

     protected function __construct()
     {
         // load other classes 
         $this->set_hooks();
        
     }
     protected function set_hooks(){

           
     }
 }

