<?php
if( ! defined( 'ABSPATH' ) ) exit; 
class Theme_Controller{
    public function __construct() {

    }
    public static function getPagedQuery(){
        if (get_query_var('paged')){
            $paged = get_query_var('paged');
        } 
        elseif (get_query_var('page')){
            $paged = get_query_var('page');
        } 
        else {
            $paged = 1;
        }
        return $paged;
    }

}
?>