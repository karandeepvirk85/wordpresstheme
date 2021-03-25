<?php 
class Content_Controller{
    public static function contentFilter($strcontent,$bolStripTags,$intLength=300){
        if($bolStripTags){
            $strcontent = strip_tags($strcontent); 
            $strcontent = substr($strcontent, 0, $intLength);
        }
        return $strcontent;
    }
}