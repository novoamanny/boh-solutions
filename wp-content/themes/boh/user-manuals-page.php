<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/user-manuals
 *
 */
/*
* Template Name: User-manuals
*/
get_header();
?>
<div id="main-content">
    <!-- Hero -->
    <?php if( get_field('hero') ): ?>
        <div class="hero">
            <img src=<?php the_field('hero'); ?> />
            <div class="cs-subtitle">
                <div>
                    <h1>BOH Systems User Manuals</h1>
                    <!-- <h3>
                        BOH Containers. Modular Kits.
                    </h3>
                    <h3>
                        Tailored Solutions.
                    </h3> -->
                </div>
                <!-- <div class="btn">
                    <a class='cta-button parallelogram blue' href="#"><span class='skew-fix'>Learn More</span></a>
                </div>
             -->
            </div>
        </div>
    <?php endif; ?>
    <div class="support-section-user">
        <h2 class="title">Downloadable Manuals</h2>
        <div class="support-details">
        <p>BOH user manuals will answer most of your questions. Download as much or a little as you need to find a solution. If all else fails, don’t hesitate to reach out to our support team.</p>
        </div>
    </div>
    <div class="user-manuals-container">
  
        <!-- <div class="um-row"> -->
                <?php $counter = 0; ?>
                <?php while(the_repeater_field('section_tile')) : ?>
                    <?php if($counter == 6) : $counter = 0; endif;?>
                    <div class="<?php if($counter < 3) : echo "square"; else : echo "square square-white"; endif; ?>">
                        
                            <h3><?php the_sub_field("section_title"); ?></h3>
                       
                        <?php while(the_repeater_field('manuals')) :     
                            $file = get_sub_field("manual");
                        ?>
                            <a target="_blank" href="<?php the_sub_field("manual"); ?>"><?php the_sub_field("title"); ?></a>
                        
                        <?php endwhile; ?>
                    </div>
                            <?php $counter++; ?>
                <?php endwhile; ?>

        <!-- </div> -->
   
        
    </div>
 
<?php
get_footer();
?>