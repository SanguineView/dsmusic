<?php
    /**
    */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Display our loop
add_action( 'genesis_loop', 'sj_content_loop' );

function sj_content_loop() {
    
    include('page-templates/page-featuredImg.php'); 
    
    if( have_rows('page-welcome') ):

        while ( have_rows('page-welcome') ) : the_row();
        
        $button_choice = get_sub_field('page-welcome_button');
        
        ?>

            <section class="section-welcome">
                <div class="wrap">
                    <div class="welcome-titles">
                        <h2 class="heading-bg"><?php the_sub_field('page-welcome__title_background'); ?></h2>
                        <h2 class="heading-primary"><?php the_sub_field('page-welcome__title'); ?></h2>
                    </div>
                    <?php the_sub_field('page-welcome__copy'); ?>
                    <?php if($button_choice == "yes"): ?>
                        <p><a href="/contact-us/" class="button">Yes, All The Help!</a></p>
                    <?php endif; ?>
                </div>
            </section>

        <?php 
        endwhile;
    endif;
    echo '<div class="main-content">';
    if( have_rows('default_content') ):

        while ( have_rows('default_content') ) : the_row(); ?>

            <div class="section-services">
                <div class="wrap">
                    <?php if( get_row_layout() == 'default_content__standard' ): ?>

                    <!-- <section class="section-welcome">
                    </section> -->

                    <?php elseif( get_row_layout() == 'default_image_link' ): ?>

                        <div class="section-services__blocks">
                            <?php if( have_rows('default_image_link__item') ):
                                while( have_rows('default_image_link__item') ): the_row();  ?>
                                
                                    <figure class="it-hover">
                                        <img src="<?php the_sub_field('default_image_link__item'); ?>" alt="<?php the_sub_field('default_image_link__page'); ?>" />
                                        <figcaption>
                                            <h3><?php the_sub_field('default_image_link__text'); ?></h3>
                                        </figcaption>
                                        <a href="<?php the_sub_field('default_image_link__page'); ?>"></a>
                                    </figure>
                                    <?php 
                                        
                                endwhile; 
                            endif; ?>
                        </div>


                        <div class="frow img-bg">
                            <div class="section-services__copy">
                                <h3 class="heading-primary">Live A Life Designed</h3>
                                <p class="paragraph">Here at Sincerely Jane you will often hear “Live a life designed;” a phrase our founders believe in and live daily. We believe that when you focus on intentionally crafting the special moments of your life, you experience a deeper connection to the moment and create memories that last a lifetime.</p>
                                <a href="/contact-us/" class="button">LET’S TALK DESIGN</a>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
                
            
        <?php endwhile;
    endif; 
    echo '</div>';

}

    genesis();