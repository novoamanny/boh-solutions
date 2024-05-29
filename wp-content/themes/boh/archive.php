<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
                <h1><?php the_archive_title('<h1 class="page-title">', '</h1>'); ?></h1>
            </div>
        </div>
    </div>
    <div class="related-product-section">
        <ul class="related-product-set">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php setup_postdata($post); ?>
                <?php $product_attributes_related = get_field('info'); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php if( $product_attributes_related['product_images_tan'] ): ?>
                            <img src="<?php echo esc_url( $product_attributes_related['product_images_tan'][0]['photo'] ); ?>" alt="<?php echo the_title(); ?>" class="product-image" />
                        <?php elseif ($product_attributes_related['product_images_green'] ): ?>
                            <img src="<?php echo esc_url( $product_attributes_related['product_images_green'][0]['photo'] ); ?>" alt="<?php echo the_title(); ?>" class="product-image" />
                        <?php elseif ($product_attributes_related['product_images_gray'] ): ?>
                            <img src="<?php echo esc_url( $product_attributes_related['product_images_gray'][0]['photo'] ); ?>" alt="<?php echo the_title(); ?>" class="product-image" />
                        <?php else : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <?php if( $product_attributes_related['part_number'] ): ?>
                        <div class="part_number">
                            P/N: <?php echo ( $product_attributes_related['part_number'] ); ?>
                        </div>
                    <?php endif; ?>
                </li>
                
                <?php endwhile; ?>
        </ul>
        <?php else : ?>
            <div class="content">
                <h2>No Results Found</h2>
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
