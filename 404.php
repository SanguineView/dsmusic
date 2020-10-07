<?php

    add_filter( 'body_class', 'genesis_sample_landing_body_class' );
    /**
     * Adds landing page body class.
     *
     * @since 1.0.0
     *
     * @param array $classes Original body classes.
     * @return array Modified body classes.
     */
    function genesis_sample_landing_body_class( $classes ) {
    
        $classes[] = '404-page';
        return $classes;
    
    }

// Remove default and display our loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'atomic_blog_loop' );

function atomic_blog_loop() {

    ?>

    <div class="main-content">
        <header class="entry-header">
            <div class="wrap">
                <h3 class="heading__secondary-left">Page Not Found</h3>
            </div>
        </header>

        <section class="page-content">
        <p>We can't find the page you're looking for.  Please feel free to contact us if you have any questions or need any help.</p>
        </section>
    </div>

   <?php
}



genesis();