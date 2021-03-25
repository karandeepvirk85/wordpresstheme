<?php 
/**
 * Posts Columns
 */
?>
<div class="col-md-6 posts-column">
    <div class="post-container">
        <div class="post-top-container">
            <div class="post-image" style="background-image:url('<?php if(class_exists('Images_Controller')){echo Images_Controller::getPostImage($post->ID,'medium');}?>')"> </div>
        </div>
        <div class="post-bottom-container">
            <div class="post-meta-container">
                <div class="post-author">
                    <?php the_author_meta('user_nicename',$post->post_author); ?>
                </div>
                <div class="divider">
                    |
                </div>
                <div class="post-date">
                    <?php echo getPostDate($post->post_date);?>
                </div>
            </div>
            <div class="post-title-container">
                <?php the_title(); ?>
            </div>
            <div class="post-content-container">
                <?php if(class_exists('Content_Controller')){
                    echo Content_Controller::contentFilter($post->post_content,true,300);
                }?>
            </div>
            <div class="read-more-container">
                <a class="read-more-link" href="<?php the_permalink()?>">Read More..</a>
            </div>
        </div>
    </div>
</div>