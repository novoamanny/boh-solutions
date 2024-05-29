<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
?>
<div id="main-content">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <div class="content">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class='cs-hero'>
                        <?php the_post_thumbnail(); ?>
                        <div class='cs-subtitle'>
                        <h1>
                        <?php the_title(); ?>
                        </h1>
                        <h3>
                        <?php the_field('subtitle'); ?>
                        </h3>
                        </div>

                    </div>
                        <?php

                        // check if the repeater field has rows of data
                        if( have_rows('section_set') ):
                            
                            // loop through the rows of data
                            while ( have_rows('section_set') ) : the_row();
                        ?>

                            <?php
                                if(get_row_index() % 2 == 0):
                            ?>
                                <div class='cs-container'>
                                    <div class='cs-text left'>
                                        <h1><?php the_sub_field('text')?></h1>
                                    </div>
                                    <div class='cs-image'>
                                        <img src=<?php the_sub_field('image'); ?> />
                                    </div>
                                </div>

                            <?php
                                else:
                            ?>
                                <div class='cs-container'>
                                    <div class='cs-image'>
                                        <img src=<?php the_sub_field('image'); ?> />
                                    </div>
                                    <div class='cs-text right'>
                                        <h1><?php the_sub_field('text')?></h1>
                                    </div>
                                </div>
                            <?php endif; ?>

                    
                        <?php   endwhile; ?>

                        <?php else :?>

                            // no rows found

                        <?php endif; ?>
                        
                    
                    <?php else: ?>
                        <div class='cs-container'>
                            <div class='cs-image'>

                            </div>
                            <div class='cs-text right'>
                                <h1>hello</h1>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php the_content(); ?>
                </div>
            </article>
            <script type="application/ld+json"> // SCHEMA.ORG Data
                {
                "@context": "http://schema.org",
                "@type": "BlogPosting",
                "mainEntityOfPage":{
                "@type":"WebPage",
                "@id":"<?php the_permalink(); ?>"
                },
                "headline": "<?php the_title(); ?>",
                "image": {
                "@type": "ImageObject",
                "url": "<?php the_post_thumbnail_url($schema); ?>",
                "height": 450,
                "width": 696
                },
                "datePublished": "<?php the_time('c') ?>",
                "dateModified": "<?php the_modified_date('c'); ?>",
                "author": {
                "@type": "Organization",
                "name": "<?php if (get_field('schema_name', 'option')) { ?><?php echo the_field('schema_name', 'option'); ?><?php } ?>"
                },
                "publisher": {
                "@type": "Organization",
                "name": "<?php if (get_field('schema_name', 'option')) { ?><?php echo the_field('schema_name', 'option'); ?><?php } ?>",
                "logo": {
                "@type": "ImageObject",
                "url": "<?php if (get_field('logo', 'option')) : ?><?php echo the_field('logo', 'option'); ?><?php else : ?><?php echo get_stylesheet_directory_uri(); ?>/dist/images/cboh-logo.jpg<?php endif; ?>"
                }
                },
                "description": "<?php echo strip_tags(get_the_excerpt()); ?>"
                }
            </script>
        <?php endwhile; ?>
        <?php else : ?>
            <div class="content">
                <h2>Not Found</h2>
            </div>
        <?php endif; ?>
        <?php
            if (function_exists("pagination")) {
                pagination($additional_loop->max_num_pages);
            }
        ?>
    </div>
</div>
<?php
get_footer();