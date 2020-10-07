<?php
    /**
    * Template Name: About
    * Description: Template for a about page
    */

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Display our loop
add_action( 'genesis_loop', 'sj_content_loop' );

function sj_content_loop() {
    
    include('page-featuredImg.php'); 
    
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
                        <p><a href="/contact-us/" class="button">Connect With Our Planners</a></p>
                    <?php endif; ?>
                </div>
            </section>

        <?php 
        endwhile;
    endif;
    
    echo '<div class="main-content">';
        if( have_rows('about_page_content') ):
            while ( have_rows('about_page_content') ) : the_row();
                    
                if( get_row_layout() == 'about_page_content_standard' ): ?>

                <!-- <section class="section-welcome">
                </section> -->

                <?php elseif( get_row_layout() == 'team_bio' ): ?>

                <section class="section-team">
                    <div class="frow">

                    <?php if( have_rows('team_bio__details') ):
                        while( have_rows('team_bio__details') ): the_row();  ?>
                                <div class="section-team__member">
                                    <div class="section-team__details">
                                        <div class="section-team__headshot">
                                            <img src="<?php the_sub_field('team_bio__headshot'); ?>" alt="<?php the_sub_field('team_bio__name'); ?>">
                                        </div>
                                        <div class="section-team__points">
                                            <p class="section-team__name">
                                                <?php the_sub_field('team_bio__name'); ?>
                                            </p>
                                            <p class="section-team__title">
                                                <?php the_sub_field('team_bio__title'); ?>
                                            </p>
                                            <?php the_sub_field('team_bio__points'); ?>
                                            <p class="section-team__location">
                                                <svg class="section-team__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 297 297" xml:space="preserve"><path d="M148.5,0C87.43,0,37.747,49.703,37.747,110.797c0,91.026,99.729,179.905,103.976,183.645  c1.936,1.705,4.356,2.559,6.777,2.559c2.421,0,4.841-0.853,6.778-2.559c4.245-3.739,103.975-92.618,103.975-183.645  C259.253,49.703,209.57,0,148.5,0z M148.5,79.693c16.964,0,30.765,13.953,30.765,31.104c0,17.151-13.801,31.104-30.765,31.104  c-16.964,0-30.765-13.953-30.765-31.104C117.735,93.646,131.536,79.693,148.5,79.693z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                                <?php the_sub_field('team_bio__location'); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="section-team__writeup">
                                        <?php the_sub_field('team_bio__writeup'); ?>
                                    </div>
                                </div>

                            <?php 
                                
                        endwhile; 
                    endif; ?>
                    </div>
                </section>

                <?php endif; 
            endwhile;
        endif;
    echo '</div>';
 
}

// Force full-width-content layout.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove content-sidebar-wrap.
add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );

genesis();