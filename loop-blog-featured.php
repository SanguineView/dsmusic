<?php

$sticky = get_option('sticky_posts');
$args = array(
    'post__in'          => $sticky,
    'posts_per_page'    => 1,
    'post_type'         => 'post'
);
$sjFeatPost = new WP_Query($args);

if ( $sjFeatPost->have_posts() ) :

    do_action( 'genesis_before_while' );

        echo '<section class="featuredPost">';

        while ( $sjFeatPost->have_posts() ) : $sjFeatPost->the_post();

            do_action( 'genesis_before_entry' );

            printf( '<article %s>', genesis_attr( 'entry' ) ); ?>            
                
                <div class="blog-post">
                    <div class="blog-post__content">
                        <?php if (has_post_thumbnail() ) {
                            the_post_thumbnail('full', array('class' => 'blog-post__img' ));
                        } ?>
                        <h3 class="blog-post__featured">Featured</h3>
                        <h3 class="blog-post__heading"><?php echo the_title(); ?></h3>
                        <p class="blog-post__paragraph"><?php echo get_the_excerpt(); ?></p>
                        <div class="blog-post__meta">
                            <p class="blog-post__meta-paragraph"><?php the_date(); ?></p>
                            <p class="blog-post__meta-paragraph"><a class="blog-post__meta-paragraph-link" href="<?php the_permalink(); ?>">Read Full Post</a></p>
                        </div>
                    </div>
                </div>

            <?php echo '</article>';

            do_action( 'genesis_after_entry' );

        endwhile; //* end of one post
        echo '</section>';
    
        do_action( 'genesis_after_endwhile' );

        else : //* if no posts exist

        do_action( 'genesis_loop_else' );

endif; //* end loop

wp_reset_postdata();