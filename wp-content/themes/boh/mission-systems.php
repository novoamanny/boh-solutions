<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/mission-systems
 *
 */
/*
* Template Name: mission systems
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
                    <h1>BOH Mission Systems</h1>
                    <h3>
                        Containerized Shelter Solutions
                    </h3>
                    <h3>
                        for Any Mission
                    </h3>
                </div>
            </div>
        </div>
    <?php endif; ?>



    <?php

        // check if the repeater field has rows of data
        if( have_rows("red_section") ):
            
            // loop through the rows of data
            while ( have_rows("red_section") ) : the_row();
        ?>
        <section class='red-section' >
       
            <div class="title">
                <h2><?php the_sub_field("title") ?></h2>
            </div>
            <?php the_sub_field("description") ?>
           

        </div>
        </section>

        <?php endwhile; ?>
    <?php endif; ?>



    <section class="section-two">
    <div class="float">
        <?php
            if( have_rows('tiles') ):
                
                // loop through the rows of data
                while ( have_rows('tiles') ) : the_row();
        ?>
       
            <div class='tile'>
                <div class="hex hex-one hex-<?php echo get_row_index(); ?>">
                <img src="<?php echo the_sub_field("image"); ?>" />
                </div>
                <div class="btn">
                    <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                </div>
            </div>
        
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </section>



     <!-- Section One -->
     <?php while( the_repeater_field('blue_section') ): ?>
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
    <?php endif ?>
    <?php endwhile ?>
    

    </div>
 
<?php
get_footer();
?>