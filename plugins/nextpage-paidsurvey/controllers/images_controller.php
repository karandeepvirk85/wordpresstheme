<?php 
    class Images_Controller{
        public static function getPostImage($intPostId, $strSIze){
            $intAttachmentId = get_post_thumbnail_id($intPostId);
            $strImageUrl = wp_get_attachment_image_src($intAttachmentId, $strSIze);
            $strImageUrl = $strImageUrl[0];
            return $strImageUrl;
        }
    }
?>