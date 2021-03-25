<?php 
/**
 * Template Name: Home 
 */
get_header();
?>

<div class="page-container container">
<?php get_template_part( 'template-parts/header/entry-header' ); ?>
<?php get_template_part( 'template-parts/content/content-page' ); ?>
    <?php 
        if (get_query_var('paged')){
            $paged = get_query_var('paged');
        } 
        elseif (get_query_var('page')){
            $paged = get_query_var('page');
        } 
        else {
            $paged = 1;
        }
        
        $allPostsWPQuery = new WP_Query(
            array(
                'post_type'=>'post', 
                'post_status'=>'publish', 
                'posts_per_page'=>6,
                'paged' => $paged,
                'orderby'   => 'date',
                'order' => 'DESC',
            )
        ); 
    ?>
<?php 

?>
    <div class="row">
        <div class="col-md-9">
            <div class="row posts-row">
                <?php if ($allPostsWPQuery->have_posts()){
                    $intCount = 0;
                    while ($allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post();
                    $intCount++;
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
                        <?php echo ($intCount % 2 == 0) ? '</div><div class="row posts-row">' : "";?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php } else { ?>
                    <div class="col-md-12">
                        <p><?php _e( 'There no posts to display.' ); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3 sidbar-container">
            <?php get_template_part( 'nextpage-templates/nextpagesidebar' ); ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-12 pagination-container">
            <div class="pagination">
                <div class="pagination-inner">
                    <?php 
                    $intBig = 999999999; // need an unlikely integer

                    echo paginate_links(
                        array(
                            'base' => str_replace( $intBig, '%#%', esc_url( get_pagenum_link( $intBig ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $allPostsWPQuery->max_num_pages
                        ) 
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>