# BOH Solutions - https://www.bohfpusystems.com/
===

## References

### General

**Github:** <a href="hhttps://github.com/digitalthrive/boh-solutions-wp" target="_blank">https://github.com/digitalthrive/boh-solutions-wp</a><br />
**Deploybot:** This project uses `Deploybot` for deployment to production and development environments.<br />
**Google Tag Manager:** <a href="https://tagmanager.google.com/" target="_blank">https://tagmanager.google.com/</a> via `googleads@warrendouglas.com`<br />

### Production

**Website:** <a href="https://www.bohfpusystems.com/" target="_blank">https://www.bohfpusystems.com/</a><br />
**Database:** TBD<br />

### Development

**Website:** <a href="https://dev.boh.wdgital.com/" target="_blank">https://dev.boh.wdgital.com/</a><br />
**Database:** `boh_solutions` located on `dev.bohsolutions.wdgital.com`<br />

## Project Setup

This project requires Node version `11.10.0` in order to install the appropriate dependencies.

Use `NVM` to install or switch to version node version 11.10.0

### Initial

- Navigate to `wp-content/themes/boh` and run `npm install`
- You may have to install `gulp` manually by running `npm install -g gulp`

### Ongoing

- Run `gulp` from the `wp-content/themes/boh` directory to consolidate SCSS into `dist/css/bundle.css`.
- All CSS files need to be converted or renamed to .scss, and stored in the `src/scss` directory. The CSS Gulp task will not work with basic .css files.
- For development purposes, `gulp-sourcemaps` was added so that you can actually see what .SCSS file is referencing a class, instead of saying `bundle.css`. Running `gulp` with no flags will cause this to occur, and unminify bundle.css. Running the production commands below will minify everything and turn off the source map feature.

### Production

- Run `gulp styles --prod` to consolidate and minify all of the SCSS files into `dist/css/bundle.css` for production.
- Run `gulp scripts --prod` to minify all of the js files into `dist/js/bundle.js` for production.

## Technologies

### Languages / Libraries

- PHP
- jQuery
- Sass

### WordPress

**Plugins**

The plugins listed below are essential to how BOH Solutions is currently built. There are other plugins installed on the website, but the ones listed below have significant influence on the website.

- Advanced Custom Fields Pro
- Contact Form 7 (Various forms through the website)
- Post SMTP (email so forms send properly)

## Features

TBD

## Tasks & Processes

TBD

## Miscellaneous

The legacy (pre WD) website inserted custom posts types for Products, CSM, and related products via functions.php. Code is pasted below for historical context:

```
// Create Custom Post type for Products and Manuals
function create_post_type_products()
{
    register_taxonomy_for_object_type('category', 'products'); // Register Taxonomies for Category
    register_post_type('products', // Register Custom Post Type
        array(
			'labels' => array(
				'name' => __('Products', 'products'), // Dashboard Menu Name
				'singular_name' => __('Product', 'products'),
				'add_new' => __('Add New', 'product'),
				'add_new_item' => __('Add New Product', 'products'),
            	'edit' => __('Edit', 'products'),
            	'edit_item' => __('Edit Product', 'products'),
            	'new_item' => __('New Product', 'products'),
            	'view' => __('View Product', 'products'),
				'view_item' => __('View Product', 'products'),
				'search_items' => __('Search Products', 'products'),
				'not_found' => __('No Product found', 'products'),
				'not_found_in_trash' => __('No Product found in Trash', 'products'),
			),
			'menu_position' =>2,
        	'public' => true,
        	'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        	'has_archive' => true,
			'supports' => array(
				'title',
            	'editor', // Supports Gutenberg
            	'excerpt',
            	'thumbnail',
				'page-attributes',
				'custom-fields',
			),
			'show_in_rest' => true, // Enables Gutenberg
        	'can_export' => true, // Allows export in Tools > Export
        	'taxonomies' => array(
            'post_tag',
            'category',
        ) // Add Category and Post Tags support
    ));
}

// Add Product Post Type
add_action('init', 'create_post_type_products');





// Create Custom Post type for CSM and Manuals
function create_post_type_CSM()
{
    register_taxonomy_for_object_type('category', 'CSM'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'CSM');
    register_post_type('CSM', // Register Custom Post Type
        array(
			'labels' => array(
				'name' => __('CSM', 'CSM'), // Dashboard Menu Name
				'singular_name' => __('CSM', 'CSM'),
				'add_new' => __('Add New', 'CSM'),
				'add_new_item' => __('Add New CSM', 'CSM'),
            	'edit' => __('Edit', 'CSM'),
            	'edit_item' => __('Edit CSM', 'CSM'),
            	'new_item' => __('New CSM', 'CSM'),
            	'view' => __('View CSM', 'CSM'),
				'view_item' => __('View CSM', 'CSM'),
				'search_items' => __('Search CSM', 'CSM'),
				'not_found' => __('No CSM found', 'CSM'),
				'not_found_in_trash' => __('No CSM found in Trash', 'CSM'),
			),
			'menu_position' =>2,
        	'public' => true,
        	'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        	'has_archive' => true,
			'supports' => array(
				'title',
            	'editor', // Supports Gutenberg
            	'excerpt',
            	'thumbnail',
				'page-attributes',
				'custom-fields',
			),
			'show_in_rest' => true, // Enables Gutenberg
        	'can_export' => true, // Allows export in Tools > Export
        	'taxonomies' => array(
            'post_tag',
            'category',
        ) // Add Category and Post Tags support
    ));
}

// Add CSM Post Type
add_action('init', 'create_post_type_CSM');



// Create Related Products Function
function wcr_related_products($args = array()) {
    global $post;

    // default args
    $args = wp_parse_args($args, array(
        'post_id' => !empty($post) ? $post->ID : '',
        'taxonomy' => 'category',
        'limit' => 100,
        'post_type' => !empty($post) ? $post->post_type : 'post',
        'orderby' => 'date',
        'order' => 'ASC'
    ));

    // check taxonomy
    if (!taxonomy_exists($args['taxonomy'])) {
        return;
    }

    // post taxonomies
    $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));

    if (empty($taxonomies)) {
        return;
    }

    // query
    $related_posts = get_posts(array(
        'post__not_in' => (array) $args['post_id'],
        'post_type' => $args['post_type'],
        'tax_query' => array(
            array(
                'taxonomy' => $args['taxonomy'],
                'field' => 'term_id',
                'terms' => $taxonomies
            ),
        ),
        'posts_per_page' => $args['limit'],
        'orderby' => $args['orderby'],
        'order' => $args['order']
    ));

    include( locate_template('related-products-template.php', false, false) );

    wp_reset_postdata();
}
```
