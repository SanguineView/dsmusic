<?php
/**
 * This file adds the Single Post Template to any Genesis child theme.
 */

// Add custom body class to the head
add_filter( 'body_class', 'single_posts_body_class' );
function single_posts_body_class( $classes ) {

   $classes[] = 'single-post';
   return $classes;
   
}

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'atomic_blog_loop' );

function atomic_blog_loop() {

    echo '<section class="blog-single">';
        echo '<div class="wrap">';

        if ( have_posts() ) { 

            if ( has_post_thumbnail() ) {
                the_post_thumbnail('full', array('class' => 'blog-post__img aligncenter' ));
            } 


            do_action( 'genesis_before_while' );

            while ( have_posts() ) {

                ?> <div class="entry-content" itemprop="text"> <?php

                the_post();

                ?> <h3 class="blog-post__heading"> <?php
                    the_title();
                ?> </h3> <?php
                

                the_content();

                do_action( 'genesis_before_entry' );

                // Template part
                $partial = apply_filters( 'ea_loop_partial', 'archive' );
                $context = apply_filters( 'ea_loop_partial_context', is_search() ? 'search' : get_post_type() );
                get_template_part( 'partials/' . $partial, $context );

                do_action( 'genesis_after_entry' );
                

                ?> </div> <?php
            }

            do_action( 'genesis_after_endwhile' );

            } else {

            do_action( 'genesis_loop_else' );

        }
    
        echo '</div>';
    echo '</section>';
}

add_action('genesis_before_footer', 'sj_other_posts', 1);

function sj_other_posts() { ?>

    <section class="similar-posts">
        <div class="frow">
            <h3 class="similar-posts__heading">You May Also Like These Great Reads</h3>
            <div class="similar-posts__blocks">

                    <?php $orig_post = $post;
                    global $post;
                    $categories = get_the_category($post->ID);
                    if ($categories) {
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                    $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> 3, // Number of related posts that will be shown.
                    'ignore_sticky_posts'=>1
                    );

                    $my_query = new wp_query( $args );
                    if( $my_query->have_posts() ) {
                            while( $my_query->have_posts() ) {
                            $my_query->the_post();?>
                            <div class="similar-posts__block">
                            <figure class="it-hover">
                            <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail('blog-cropped', array('class' => 'blog-cropped' ));
                        } ?>
                                <figcaption>
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_excerpt(); ?>
                                    <p class="read">Read Full Post</p>
                                </figcaption>
                                <a href="<? the_permalink(); ?>"></a>
                            </figure>
                            </div>

                            <?
                            }
                    }
                }
                $post = $orig_post;
                wp_reset_query(); ?>
            </div>
        </div>
    </section>
        
<?php  }


//* Run the Genesis loop
genesis();