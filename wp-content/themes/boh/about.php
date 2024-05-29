<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/about
 *
 */
/*
* Template Name: about
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
                    <h1>The Ongoing Legacy of BOH Containers  </h1>
                    <h3>
                        Expeditionary Mobility Systems
                    </h3>
                    <!-- <h3>
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

    <!-- Section One -->
    <?php while( the_repeater_field('full_section') ): ?>
<!-- Map -->
        <?php
            if(get_row_index() % 2 != 0):
        ?>

        <section class='section' style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/blue-pattern-bg-repeatable.jpg');" >

                <div class="left left-img">
                <div>
                    <img src=<?php the_sub_field("image") ?> />
                </div>
                </div>
    
            
                <div class="right text right-text">
                    <div class="title">
                        <h1><?php the_sub_field("title") ?></h1>
                    </div>
                    <p><?php the_sub_field("description") ?></p>
                    <div class="btn">
                        <a class='cta-button parallelogram red' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                    </div>
                </div>
        </section>
<!-- Map -->
        <?php
            else:
        ?>
        <section class='section' >

            <div class="left left-text">
            <div class="title">
                    <h1><?php the_sub_field("title") ?></h1>
                </div>
                <p><?php the_sub_field("description") ?></p>
                <div class="btn">
                    <a class='cta-button parallelogram red' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                </div>
            </div>


            <div class="right right-img">
            <div>
                <img src=<?php the_sub_field("image") ?> />
            </div>
            </div>

            </div>
        </section>


        <?php endif; ?>
    <?php endwhile; ?>

    </div>
 
<?php
get_footer();
?>