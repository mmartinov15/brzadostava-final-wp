<?php /**
 * The template for displaying Home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page
 *
 * @package Brza_Dostava
 */
 
// Fetch theme header template
get_header(); ?>


<div id="primary">
    <div class="custom-homepage-container">
        
        
        <?php
		// Start the loop.
	 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php $post_id = get_the_ID(); ?>
                            
                            
                       <!--<?php  the_content(); ?>-->
                       <?php echo do_shortcode('[woocatslider id="1833"]'); ?>
                            
                            
                        <?php endwhile; ?>
                        <?php endif; ?>
		
		
   


        <!-- carousel -->

    </div>

</div><!-- #primary -->

<?php get_footer(); ?>

<!---->
