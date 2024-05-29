<?php
/**
 * The blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy/faq
 *
 */
/*
* Template Name: FAQ
*/
get_header();
?>
<div id="main-content">
        <?php
        $uri = $_SERVER['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH); // gives "/pwsdedtech"
        $pathWithoutSlash = substr($path, 1);
        // echo $pathWithoutSlash;

        // boh/boh-solutions/ personal path
        if($pathWithoutSlash == "boh/boh-solutions-wp/faq/" || $pathWithoutSlash == "faq/") : $pathWithoutSlash = "faq"; endif;
        ?>
<!-- Hero -->
    <?php if( get_field('hero') ): ?>
        <div class="hero">
            <img src=<?php the_field('hero'); ?> />
            <div class="cs-subtitle">
            <?php if($pathWithoutSlash == "faq") : ?>
                <div>
                    <h1><span>F</span>requently</h1>
                    <h1><span>A</span>sked</h1>
                    <h1><span>Q</span>uestions</h1>
                    <h3>
                        Regarding BOH Containers
                    </h3>
                </div>
            <?php else: ?>
                <div>
                    <h1><span>P</span>rivacy</h1>
                    <h1><span>P</span>olicy</h1>
                    <h3>
                        
                    </h3>
                </div>

            <?php endif; ?>
            
            </div>
        </div>
    <?php endif; ?>
    <div class="faq">
        <?php while( the_repeater_field('faq') ): ?>
            <div class="Accordion_item">
                <div id="<?php get_row_index() ?>" class="title_tab tile-collapse">
                    <h2 class="title">
                        <?php the_sub_field("question") ?><span class="icon"></span>
                    </h2>
                </div>
                <div class="inner_content slide">
                    <?php the_sub_field("answer") ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php if( the_field('privacy') ): ?>
            <div class="tile-collapse policy" >
                <?php the_field("pivacy"); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();
?>
<script>
     $(document).ready(function() {
        var $titleTab = $('.title_tab');
        $('.Accordion_item:eq(0)').find('.title_tab').addClass('active').next().stop().slideDown(300);
        $('.Accordion_item:eq(0)').find('.inner_content').find('p').addClass('show');
        $titleTab.on('click', function(e) {
        e.preventDefault();
            if ( $(this).hasClass('active') ) {
                $(this).removeClass('active');
                $(this).next().stop().slideUp(500);
                $(this).next().find('p').removeClass('show');
            } else {
                $(this).addClass('active');
                $(this).next().stop().slideDown(500);
                $(this).parent().siblings().children('.title_tab').removeClass('active');
                $(this).parent().siblings().children('.inner_content').slideUp(500);
                $(this).parent().siblings().children('.inner_content').find('p').removeClass('show');
                $(this).next().find('p').addClass('show');
            }
        });
    });
</script>