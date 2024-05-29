<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/storage-systems
 *
 */
/*
* Template Name: storage-systems
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
                    <h1>BOH Storage Systems</h1>
                    <h3>
                        BOH Containers. Modular Kits.
                    </h3>
                    <h3>
                        Tailored Solutions.
                    </h3>
                </div>
     
            </div>
        </div>
    <?php endif; ?>

    <!-- Section One -->
    <?php if( the_repeater_field('single-section') ): ?>
    <section class='section-one' >
  
        <div class="title">
            <h1><?php the_sub_field("title") ?></h1>
        </div>
            <div class="top">
                <p><?php the_sub_field("description") ?></p>
            </div>
            <div class="bottom">
            <?php

                // check if the repeater field has rows of data
                if( have_rows('tiles') ):
                    
                    // loop through the rows of data
                    while ( have_rows('tiles') ) : the_row();
            ?>
                <div class='tile'>
                    <div class="hex">
                    <img src="<?php echo the_sub_field("image"); ?>" height="260" />
                    </div>
                    <div class="btn">
                        <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        <?php endif; ?>

    
    </div>
    </section>


    <!-- Section Two -->
    <?php if( the_repeater_field('double-section') ): ?>
    <section class='section-two' >
  
        <div class="title">
            <h1><?php the_sub_field("main_title") ?></h1>
        </div>
        <div class="section-container-top">
            <div class="top">
                <p><?php the_sub_field("description") ?></p>
            </div>

            <div class="bottom">
                <?php

                    // check if the repeater field has rows of data
                    if( have_rows('top_tiles') ):
                        
                        // loop through the rows of data
                        while ( have_rows('top_tiles') ) : the_row();
                ?>
       


                <div class='tile'>
                    <div class="hex">
                        <img src="<?php echo the_sub_field("image"); ?>" height="260" />
                    </div>
                    <div class="btn">
                        <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                    </div>
                </div>



                <?php endwhile; ?>
            <?php endif; ?>





            
            </div>
        </div>
        <div class="section-container-bottom">
            <div class="top">
                <h2 style="text-transform: uppercase;"><?php the_sub_field("subtitle") ?></h2>
            </div>

            <div class="bottom">
                <?php

                    // check if the repeater field has rows of data
                    if( have_rows('bottom_tiles') ):
                        
                        // loop through the rows of data
                        while ( have_rows('bottom_tiles') ) : the_row();
                ?>
            



                <div class='tile'>
                    <div class="hex img-<?php echo get_row_index(); ?>">
                        <img src="<?php echo the_sub_field("image"); ?>" height="260" />
                    </div>
                    <div class="btn">
                        <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- <div>
            <a class='cta-button parallelogram red' href="#"><span class='skew-fix'>Request A Quote</span></a>
        </div> -->
    </div>
    </section>





<!-- Section 3 -->
<?php if( the_repeater_field('single-section-2') ): ?>
    <section class='section-one two' >
  
        <div class="title">
            <h1><?php the_sub_field("title") ?></h1>
        </div>
            <div class="top">
                <p><?php the_sub_field("description") ?></p>
            </div>
            <div class="bottom">
            <?php

                // check if the repeater field has rows of data
                if( have_rows('tiles') ):
                    
                    // loop through the rows of data
                    while ( have_rows('tiles') ) : the_row();
            ?>
           




                <div class='tile'>
                    <div class="hex">
                        <img src="<?php echo the_sub_field("image"); ?>" height="260" />
                    </div>
                    <div class="btn">
                        <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- <div>
            <a class='cta-button parallelogram red' href="#"><span class='skew-fix'>Request A Quote</span></a>
        </div> -->
    </div>
    </section>




<!-- Red Section -->
    <?php

        // check if the repeater field has rows of data
        if( have_rows("red_section") ):
            
            // loop through the rows of data
            while ( have_rows("red_section") ) : the_row();
    ?>
    <section class='red-section' >
        <div class="left">
            <div class="title">
                <h2><?php the_sub_field("title") ?></h2>
            </div>
            <?php the_sub_field("description") ?>
            <div class="btn">
                <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
            </div>
        </div>


        <div class="right">
            <img src=<?php the_sub_field("image") ?> />
        </div>

        </div>
    </section>

        <?php endwhile; ?>
    <?php endif; ?>

</div>
<?php
get_footer();