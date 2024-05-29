<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/manufacturing
 *
 */
/*
* Template Name: manufacturing
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
                <?php
                    $uri = $_SERVER['REQUEST_URI'];
                    $path = parse_url($uri, PHP_URL_PATH); // gives "/pwsdedtech"
                    $pathWithoutSlash = substr($path, 1);
                    $path = " ";
                    $text;
                    // echo $pathWithoutSlash;

                    if($pathWithoutSlash == "boh/boh-solutions-wp/manufacturing/" || "manufacturing/") : $path = "manufacturing"; endif;
                    if($pathWithoutSlash == "boh/boh-solutions-wp/design-engineering/" || "design-engineering/") : $path = "design-engineering"; endif;

                    if($path == "manufacturing") : $text = "BOH Manufacturing"; endif;
                    if($path == "design-engineering") : $text = "Design and Engineering"; endif;
                    // echo $path
                ?>

              
                            <h1>BOH <?php the_title(); ?></h1>


               
                    <!-- <h3>
                        Containerized Shelter Solutions
                    </h3> -->
                    <!-- <h3>
                        for Any Mission
                    </h3> -->
                </div>
                <!-- <div class="btn">
                    <a class='cta-button parallelogram blue' href="#"><span class='skew-fix'>Learn More</span></a>
                </div>
             -->
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
            <div class="btn">
                <a class='cta-button parallelogram blue' href="<?php the_sub_field("cta_url"); ?>"><span class="skew-fix">Schedule a Free Consultation</span></a>
            </div>

        </div>
        </section>

        <?php endwhile; ?>
    <?php endif; ?>


    <section class='video-section' >
    <?php

    // check if the repeater field has rows of data
    if( get_field("video_image") ):
        
        
    ?>


        <img src=<?php the_field("video_image"); ?> />
    



    <?php endif; ?>
    </section>




 
<?php
get_footer();
?>