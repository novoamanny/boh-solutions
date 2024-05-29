<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-products
 *
 */
get_header();
?>
<div id="main-content">

    <!-- Hero -->
    <div class="hero">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/product-single-header.jpg" />
        <div class="cs-subtitle">
            <div>
                <h1><?php the_title(); // product title (uses default WP post title) ?></h1>
            </div>
        </div>
    </div>

    
    <?php if (have_posts()) : while (have_posts()) : the_post(); // Loop through default post data in case a user inputs content via WordPress ?>
    
        <?php 
            // Set ACF group data into variables
            $blue_section = get_field('blue_section');
            $product_attributes = get_field('info');
            $section_two = get_field('section_two');
            $product_includes = get_field('product_includes');
            $dimensions = get_field('dimensions');
            $weight = get_field('weight');
            $related_product = get_field('related_product');
        ?>

        <?php if( $blue_section ): ?>
            <div class="blue-section" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/blue-pattern-bg-repeatable.jpg');">
                <div class="image">
                    <?php if( $product_attributes ): ?>
                        <div class="product-attributes-set">
                            <?php if( $product_attributes['color'] ): ?>

                                <?php if( have_rows('info') ): ?>
                                    <?php while( have_rows('info') ): the_row(); ?>
                                        <div id="tanPhotos" class="support-set">
                                            <ul class="owl-carousel owl-theme product">
                                                <?php if( have_rows('product_images_tan') ): ?>
                                                    <?php while( have_rows('product_images_tan') ): the_row(); ?>
                                                        <li class="file-item">
                                                            <img src="<?php echo get_sub_field('photo');?>" alt="<?php the_title(); ?> product image">
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            
                                <?php if( have_rows('info') ): ?>
                                    <?php while( have_rows('info') ): the_row(); ?>
                                        <div id="greenPhotos" class="support-set">
                                            <ul class="owl-carousel owl-theme product-alt">
                                                <?php if( have_rows('product_images_green') ): ?>
                                                    <?php while( have_rows('product_images_green') ): the_row(); ?>
                                                        <li class="file-item">
                                                            <img src="<?php echo get_sub_field('photo');?>" alt="<?php the_title(); ?> product image">
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            
                                <?php if( have_rows('info') ): ?>
                                    <?php while( have_rows('info') ): the_row(); ?>
                                        <div id="grayPhotos" class="support-set">
                                            <ul class="owl-carousel owl-theme product-alt-v2">
                                                <?php if( have_rows('product_images_gray') ): ?>
                                                    <?php while( have_rows('product_images_gray') ): the_row(); ?>
                                                        <li class="file-item">
                                                            <img src="<?php echo get_sub_field('photo');?>" alt="<?php the_title(); ?> product image">
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="info">
                        <?php if( get_field('hero_heading') ): ?>
                            <h2><?php the_field('hero_heading') ?></h2>
                        <?php else : // show nothing, per client request ?>
                            
                        <?php endif ; ?>
                    <?php if( $blue_section['description'] ): ?>
                        <?php echo $blue_section['description']; ?>
                    <?php endif; ?>
                </div>
                <?php if( $product_attributes ): ?>

                    <div class="product-attributes-set-wrap">
                        <div class="product-attributes-set bottom">
                            <div class="col">
                                <h3>Color</h3>
                                <?php // var_dump($product_attributes['product_images_tan']); ?>
                                <?php if( $product_attributes['product_images_tan'] ): ?>
                                    <button id="toggleTan"></button>
                                <?php endif; ?>
                                <?php if( $product_attributes['product_images_green'] ): ?>
                                    <button id="toggleGreen"></button>
                                <?php endif; ?>
                                <?php if( $product_attributes['product_images_gray'] ): ?>
                                    <button id="toggleGray"></button>
                                <?php endif; ?>
                            </div>
                            <div class="col">
                                <h3>NSN</h3>
                                <?php if( $product_attributes['nsn'] ): ?>
                                    <div class="nsn-value"><?php echo $product_attributes['nsn']; ?> (Tan/Green)</div>
                                <?php endif; ?>
                                <?php if( $product_attributes['nsn_green'] ): ?>
                                    <div class="nsn-value"><?php echo $product_attributes['nsn_green']; ?> (Green)</div>
                                <?php endif; ?>
                                <?php if( $product_attributes['nsn_gray'] ): ?>
                                    <div class="nsn-value"><?php echo $product_attributes['nsn_gray']; ?> (Gray)</div>
                                <?php endif; ?>
                            </div>
                            <div class="col">
                                <h3>Part Number</h3>
                                <?php if( $product_attributes['part_number'] ): ?>
                                    <div><?php echo $product_attributes['part_number']; ?> (Tan)</div>
                                <?php endif; ?>
                                <?php if( $product_attributes['part_number_green'] ): ?>
                                    <div><?php echo $product_attributes['part_number_green']; ?> (Green)</div>
                                <?php endif; ?>
                                <?php if( $product_attributes['part_number_gray'] ): ?>
                                    <div><?php echo $product_attributes['part_number_gray']; ?> (Gray)</div>
                                <?php endif; ?>
                            </div>
                            <a href="/quote" class="request-quote">
                                <span class="offset">Request a Quote</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if( $section_two ): ?>
            <div class="section-two-set dynamic-set">
                <?php if( $section_two['desc']['description'] ): ?>
                    <div class="description item">
                        <?php if( $section_two['desc']['title'] ): ?>
                            <h3><?php echo $section_two['desc']['title']; ?></h3>
                        <?php endif; ?>
                        <?php if( $section_two['desc']['description'] ): ?>
                            <?php echo $section_two['desc']['description']; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $section_two['features'] ): ?>
                    <div class="features item">
                        <h3>Features</h3>
                        <?php echo $section_two['features']; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="white-section">
            <div class="col">
                <?php if( $product_includes ): ?>
                    <div class="product-includes-set">
                        <h3>Product Includes</h3>
                        <?php echo $product_includes; ?>
                    </div>
                <?php endif; ?>

                <?php if( have_rows('support') ): ?>
                    <h3>Support</h3>
                    <h4><?php the_title(); ?> User Manual</h4>
                    <div class="support-set">
                        <ul>
                            <?php while( have_rows('support') ): the_row(); ?>
                                <li class="file-item">
                                    <a href="<?php echo the_sub_field( 'file' );?>" target="_blank"><?php echo the_sub_field( 'file_label' );?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col">
                <?php if( $dimensions ): ?>
                    <h3>Dimensions</h3>
                    <div class="dimensions-set">
                        <?php if( $dimensions['height'] ): ?>
                            <div class="row-set">
                                <span>Height</span>
                                <span><?php echo $dimensions['height']; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $dimensions['length'] ): ?>
                            <div class="row-set">
                                <span>Length</span>
                                <span><?php echo $dimensions['length']; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $dimensions['width'] ): ?>
                            <div class="row-set">
                                <span>Width</span>
                                <span><?php echo $dimensions['width']; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if( $weight ): ?>
                    <h3>Weight</h3>
                    <div class="weight-set">
                        <?php if( $weight['tare'] ): ?>
                            <div class="row-set">
                                <span>Tare</span>
                                <span><?php echo $weight['tare']; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $weight['maximum_gross'] ): ?>
                            <div class="row-set">
                                <span>Maximum Gross</span>
                                <span><?php echo $weight['maximum_gross']; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if( $weight['net'] ): ?>
                            <div class="row-set">
                                <span>Net</span>
                                <span><?php echo $weight['net']; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php 
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); 
                ?>
            </div>
        </div>

        <?php if( $related_product ): ?>
            <div class="related-product-section">
                <h3>Compatible Products</h3>
                <ul class="related-product-set">
                    <?php foreach( $related_product as $post ): 
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); 
                    ?>
                        <?php $info_related = get_field('blue_section',$post); ?>
                        <?php $product_attributes_related = get_field('info',$post); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php if( $product_attributes_related['product_images_tan'] ): ?>
                                    <img src="<?php echo esc_url( $product_attributes_related['product_images_tan'][0]['photo'] ); ?>" alt="<?php echo the_title(); ?>" class="product-image" />
                                <?php elseif ($product_attributes_related['product_images_green'] ): ?>
                                    <img src="<?php echo esc_url( $product_attributes_related['product_images_green'][0]['photo'] ); ?>" alt="<?php echo the_title(); ?>" class="product-image" />
                                <?php elseif ($product_attributes_related['product_images_gray'] ): ?>
                                    <img src="<?php echo esc_url( $product_attributes_related['product_images_gray'][0]['photo'] ); ?>" alt="<?php echo the_title(); ?>" class="product-image" />
                                <?php endif; ?>
                                <h4><?php the_title(); ?></h4>
                            </a>
                            <?php if( $product_attributes_related['part_number'] ): ?>
                                <div class="part_number">
                                    P/N: <?php echo ( $product_attributes_related['part_number'] ); ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php 
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>


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
    <!-- <?php
        if (function_exists("pagination")) {
            pagination($additional_loop->max_num_pages);
        }
    ?> -->
</div>
<?php
get_footer();