<?php 
/**
 * Blog Side Bar
 * Side bar called on home page and single 
 */

// Get Parent Categories
$arrCategories = get_categories(
    array(
        'orderby' => 'name',
        'parent'  => 0
    )   
);

// Get Recent Posts
$arrRecentPosts = wp_get_recent_posts(
    array(
        'numberposts' => 6,
        'post_status' => 'publish'
    )
);
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input class="search-box" type="text" value="" name="s" id="s" placeholder="Search" />
    </div>
</form>

<div class="categories-container">
    <h2>Categories</h2>
    <?php            
        foreach ($arrCategories as $objCategories) {?>
            <p>
                <a href="<?php echo get_category_link( $objCategories->term_id )?>">
                    <?php echo $objCategories->name;?>
                </a>
            </p>
    <?php  } ?>
</div>
<div class="recent-post-container">
    <h2>Recent Posts</h2>
    <ul>
        <?php
            foreach($arrRecentPosts as $arrRecentPost) {?>
            <li>
                <a href="<?php echo get_permalink($arrRecentPost['ID']) ?>">
                    <p><?php echo $arrRecentPost['post_title'] ?></p>
                    <p class="recent-post-date">
                        <?php echo getPostDate($arrRecentPost ['post_date'])?>
                    </p>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>