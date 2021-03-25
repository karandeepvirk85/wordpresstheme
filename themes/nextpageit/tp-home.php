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
    <div class="row">
        <div class="col-md-9">
            <div class="row posts-row">
                <?php if ($allPostsWPQuery->have_posts()){
                    $intCount = 0;
                    while ($allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post();
                        $intCount++;
                        get_template_part( 'nextpage-templates/allposts' );
                        echo ($intCount % 2 == 0) ? '</div><div class="row posts-row">' : "";
                     endwhile;
                     wp_reset_postdata(); 
                 } else { ?>
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
                            'current' => max( 1, $paged),
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