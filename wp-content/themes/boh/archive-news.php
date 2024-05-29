<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/news
 *
 */
/*
* Template Name: News
*/
get_header();
?>
<div id="main-content">
<!-- Hero -->

        <div class="hero">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Container-News-Hero-img.png"/>
            <div class="cs-subtitle">
                <div>
                    <h1>News & Events</h1>
                   
                </div>
           
            </div>
        </div>


    <div class="title-section">
        <h2>Press Releases And BOH Updates</h2>
    </div>
    <!-- <?php echo get_template_directory_uri(); ?> -->

    <div class="support-section">
        <?php
        $wp_query = new WP_Query(); 
        $wp_query->query('showposts=20&post_type=news'.'&paged='.$paged);
        $totalposts = $wp_query->found_posts;

            while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>
       
            <div class='tile'>
                <div class="hex">
                    <a href="<?php the_permalink(); ?>" style="text-decoration: none;">
                        <div>
                            <img src=<?php the_field("image") ?> />
                        </div>
                        <span class="date"><?php echo get_the_date( 'Y-m-d' ); ?> | BOH Solutions</span>
                        <h2><?php the_field("title"); ?> </h2>
                        <?php echo the_field("text"); ?>
                        <div class="btn-container">
                            <span>Read More</span>
                        </div>
                    </a>
                </div>
            </div>
        
            <?php endwhile; wp_reset_query(); ?>
    </div>



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
                    <a class='cta-button parallelogram red' href="#"><span class="skew-fix"><?php the_sub_field("cta_label") ?></span></a>
                </div>
            </div>
    </section>
    <?php endif ?>
    <?php endwhile ?>




   

    </div>
 
<?php
get_footer();
?>