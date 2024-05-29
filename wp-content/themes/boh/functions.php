<?php

/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */
//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );

if (!function_exists('_boh_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function _boh_setup() {
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('schema', 696, 450, true); //696px width and 450px height with crop mode on
        add_image_size('static_heading', 1200, 500, true);
        add_image_size('home-square', 480, 480, true);
        add_image_size('blog-preview', 340, 228, true);

        // Add new image sizes to post or page editor
        function new_image_sizes($sizes) {
            return array_merge($sizes, array(
                'work' => __('Our Work'),
            ));
        }

        add_filter('image_size_names_choose', 'new_image_sizes');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', '_s'),
            'header_row_1' => esc_html__('Header Row 1', '_s'),
            'header_row_2' => esc_html__('Header Row 2', '_s'),
            'footer_column_1' => esc_html__('Footer Column 1', '_s'),
            'footer_column_2' => esc_html__('Footer Column 2', '_s'),
            'footer_column_3' => esc_html__('Footer Column 3', '_s'),
            'mobile' => esc_html__('Mobile', '_s'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('_s_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif;
add_action('after_setup_theme', '_boh_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _boh_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Default'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here for the default sidebar.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Contact'),
        'id' => 'sidebar-contact',
        'description' => esc_html__('Add widgets here for the contact sidebar.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Subscribe'),
        'id' => 'sidebar-subscribe',
        'description' => esc_html__('Add widgets here for the subscribe sidebar.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', '_boh_widgets_init');

// Enqueue scripts and styles
function _boh_assets() {
    wp_enqueue_style('_boh-stylesheet-theme', get_stylesheet_uri());
    wp_enqueue_style( '_boh-stylesheet', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', null, null, true);
    wp_enqueue_script( '_boh-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array(), '1.0.0', true );
    wp_enqueue_script( '_boh-scripts', get_template_directory_uri() . '/dist/js/custom.js', array(), '1.0.0', true );
    wp_localize_script( '_boh-scripts', 'acf_vars', array(
        'list_parent' => get_field( 'quote_date_management', 'option' ),
        )
    );
  }
  add_action('wp_enqueue_scripts', '_boh_assets');

// Pagination
function pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged))
        $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"pagination\"><span>Page " . $paged . " of " . $pages . "</span>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>&laquo; First</a>";
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo; Previous</a>";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages)
            echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">Next &rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($pages) . "'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

// Read more (commented out because we're manually rendering "Read More" outside the article)
// function ld_new_excerpt_more($more) {
//     global $post;
//     return '...<br /><a class="continue-reading" href="' . get_permalink($post->ID) . '">Read More</a>';
// }

// add_filter('excerpt_more', 'ld_new_excerpt_more');

// Excerpt manual truncation
function custom_excerpt_length($length){
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// RSS - add the namespace to the RSS opening element
function add_media_namespace() {
    echo 'xmlns:media="http://search.yahoo.com/mrss/"';
}

// RSS - add the requisite tag where a thumbnail exists
function add_media_thumbnail() {
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $thumb_ID = get_post_thumbnail_id($post->ID);
        $details = wp_get_attachment_image_src($thumb_ID, 'feedimg');
        //var_dump($details);
        if (is_array($details)) {
            echo '<media:content url="' . $details[0] . '" medium="image" />';
        }
    }
}

// RSS - add the two functions above into the relevant WP hooks
add_action('rss2_ns', 'add_media_namespace');
add_action('rss2_item', 'add_media_thumbnail');

/**
 * function wpmark_change_theme_options_menu_name()
 * changes the name of the menu item of theme options framework
 */
function wpmark_change_theme_options_menu_name($menu) {
    /* alter the options menu paramters */
    $menu['menu_title'] = 'Theme Options'; // set the menu title
    $menu['page_title'] = 'Theme Options'; // set the menus page title
    $menu['mode'] = 'menu'; // make the menu a top level menu item
    $menu['position'] = '81'; // make the menu item appear after settings

    /* return our modified menu */
    return $menu;
}

add_filter('optionsframework_menu', 'wpmark_change_theme_options_menu_name');

// Custom Style Integration for TinyMCE
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Add the style list to tinymce
function my_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('tiny_mce_before_init', 'my_mce_before_init');

function my_mce_before_init($settings) {
    $style_formats = array(
        array(
            'title' => 'Add button class to anchor', // title that apear in the list
            'selector' => 'a', // limited to specific html tag
            'classes' => 'button' // the class to add
        )
    );
    $settings['style_formats'] = json_encode($style_formats);
    return $settings;
}

add_theme_support( 'title-tag' );

// Adds option functionality to theme via ACF
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
    // acf_add_options_page(array(
	// 	'page_title' 	=> 'Theme Case Studies',
	// 	'menu_title'	=> 'Case Studies',
	// 	'menu_slug' 	=> 'theme-case-studies',
	// 	'capability'	=> 'edit_posts',
	// 	'redirect'		=> false
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
    // ));

}

function create_post_type_case_studies()
{
    register_taxonomy_for_object_type('category', 'case_studies'); // Register Taxonomies for Category
    register_post_type('case_studies', // Register Custom Post Type
        array(
			'labels' => array(
				'name' => __('Case Studies', 'case_studies'), // Dashboard Menu Name
				'singular_name' => __('Case Study', 'case_studies'),
				'add_new' => __('Add New', 'case_studies'),
				'add_new_item' => __('Add New Case Study', 'case_studies'),
            	'edit' => __('Edit', 'case_studies'),
            	'edit_item' => __('Edit Case Study', 'case_studies'),
            	'new_item' => __('New Case Study', 'case_studies'),
            	'view' => __('View Case Study', 'case_studies'),
				'view_item' => __('View Case Study', 'case_studies'),
				'search_items' => __('Search Products', 'case_studies'),
				'not_found' => __('No Case Study found', 'case_studies'),
				'not_found_in_trash' => __('No Case Study found in Trash', 'case_studies'),
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

// Add Products Post Type
add_action('init', 'create_post_type_case_studies');


function create_post_type_products()
{
    // register_taxonomy_for_object_type('category', 'products'); // Register Taxonomies for Category
    register_post_type('products', // Register Custom Post Type
        array(
			'labels' => array(
				'name' => __('Products', 'products'), // Dashboard Menu Name
				'singular_name' => __('Products', 'products'),
				'add_new' => __('Add New', 'products'),
				'add_new_item' => __('Add New Products', 'products'),
            	'edit' => __('Edit', 'products'),
            	'edit_item' => __('Edit Products', 'products'),
            	'new_item' => __('New Products', 'products'),
            	'view' => __('View Products', 'products'),
				'view_item' => __('View Products', 'products'),
				'search_items' => __('Search Products', 'products'),
				'not_found' => __('No Products found', 'products'),
				'not_found_in_trash' => __('No Products found in Trash', 'products'),
			),
			'menu_position' =>2,
        	'public' => true,
        	'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
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

// Add Case Studies Post Type
add_action('init', 'create_post_type_products');


function my_cptui_add_post_types_to_archives( $query ) {
	// We do not want unintended consequences.
	if ( is_admin() || ! $query->is_main_query() ) {
		return;    
	}

	if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

		// Replace these slugs with the post types you want to include.
		$cptui_post_types = array( 'products' );

		$query->set(
	  		'post_type',
			array_merge(
				array( 'post' ),
				$cptui_post_types
			)
		);
	}
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_types_to_archives' );


// Add News Post Type
add_action('init', 'create_post_type_case_studies');


function create_post_type_news()
{
    register_taxonomy_for_object_type('category', 'news'); // Register Taxonomies for Category
    register_post_type('news', // Register Custom Post Type
        array(
			'labels' => array(
				'name' => __('News', 'news'), // Dashboard Menu Name
				'singular_name' => __('news', 'news'),
				'add_new' => __('Add New', 'news'),
				'add_new_item' => __('Add New News', 'news'),
            	'edit' => __('Edit', 'news'),
            	'edit_item' => __('Edit News', 'news'),
            	'new_item' => __('New News', 'news'),
            	'view' => __('View News', 'news'),
				'view_item' => __('View News', 'news'),
				'search_items' => __('Search News', 'news'),
				'not_found' => __('No News found', 'news'),
				'not_found_in_trash' => __('No News found in Trash', 'news'),
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

// Add Case Studies Post Type
add_action('init', 'create_post_type_news');

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

/* Reverse default date descending order for categories */
function change_category_order( $query ) {
    //Sort all posts for categories by date asc order
    if($query->is_category() && $query->is_main_query()){
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'change_category_order' );