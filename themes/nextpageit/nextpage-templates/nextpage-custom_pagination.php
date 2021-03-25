<?php
/**
 * Template to display Pagination
 * 
 */
    if (get_query_var('paged')){
        $paged = get_query_var('paged');
    } 
    elseif (get_query_var('page')){
        $paged = get_query_var('page');
    } 
    else {
        $paged = 1;
    }
?>

<div class="pagination">
    <div class="pagination-inner">
        <?php 
        $intBig = 99999999999; 
        echo paginate_links(
            array(
                'base' => str_replace( $intBig, '%#%', esc_url( get_pagenum_link( $intBig ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, $paged),
                'total' => $args['max_num_pages']
            ) 
        );
        ?>
    </div>
</div>