<?php

$sticky = get_option('sticky_posts');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array(
    'post__not_in'          => $sticky,
    'posts_per_page'    => 3,
    'paged' => $paged
);

$sjPost = new WP_Query($args);

if ( $sjPost->have_posts() ) :

    echo '<section class="remainingPost">';

        while ( $sjPost->have_posts() ) : $sjPost->the_post();

            printf( '<article %s>', genesis_attr( 'entry' ) );

            ?>

                <figure class="it-hover-blog">
                    <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail('blog-cropped', array('class' => 'blog-cropped' ));
                        } ?>
                    <figcaption>
                        <h3><?php echo the_title(); ?></h3>
                        <p class="dummy-link">Read Full Post</p>
                    </figcaption>
                    <a href="<?php the_permalink(); ?>"></a>
                </figure>

                <?php

            echo '</article>';

        endwhile; //* end of one post

        echo '</section>'; ?>

        <div class="pagination">
            <?php 
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $sjPost->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 1,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'next_text'    => sprintf( '%1$s <i></i>', __( 'View More Posts', 'text-domain' ) ),
                    'add_args'     => true,
                ) );
            ?>
        </div>
    
        <?php 
endif; //* end loop

wp_reset_postdata();
?>