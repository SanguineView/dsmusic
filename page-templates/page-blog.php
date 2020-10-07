<?php
    /*** 
     * Template Name: Blog
    * Description: Template for blog page
    */


// Custom Blog Feed Post Template

remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'wpb_custom_loop' );

/** Custom  loop **/
function wpb_custom_loop() {
    echo '<section class="blog-feed">';
        echo '<div class="wrap">';
            include(locate_template('loop-blog-featured.php'));

            include(locate_template('loop-blog.php'));
        echo '</div>';
    echo '</section>';

}

remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

genesis();