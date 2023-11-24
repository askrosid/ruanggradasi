<?php
/*----------------------------------------------------------*/
/* Enqueue Styles
/*----------------------------------------------------------*/
function rgs_enqueue_styles(){
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'icofont', get_stylesheet_directory_uri() . '/assets/css/icofont.min.css', array(), false, 'all' );
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), false, 'all' );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css', array(), false, 'all' );
    wp_enqueue_style( 'tailwind-style', get_stylesheet_directory_uri() . '/assets/css/output.css', array(), false, 'all' );
    wp_enqueue_style( 'rgs-style', get_stylesheet_uri(), array('tailwind-style'), "1.0.0", 'all' );
}
add_action('wp_enqueue_scripts', 'rgs_enqueue_styles');
/*----------------------------------------------------------*/
/* Enqueue Scripts
/*----------------------------------------------------------*/
function rgs_enqueue_scripts(){
   wp_deregister_script('jquery');
   wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.6.3.min.js', array(), null, true );
   wp_enqueue_script( 'fullpage-script', get_stylesheet_directory_uri() . '/assets/js/fullpage.min.js', array('jquery'), false, true );
   wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), false, true );
   wp_enqueue_script( 'rgs-script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'rgs_enqueue_scripts');
/*----------------------------------------------------------*/
/* Adds new body classes
/*----------------------------------------------------------*/
function add_browser_classes( $classes ){
    // WordPress global variables with browser information
    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;

    if( $is_chrome ) {
        $classes[] = 'chrome';
    }
    elseif( $is_gecko ){
        $classes[] = 'gecko';
    } 
    elseif( $is_opera ) {
        $classes[] = 'opera';
    }
    elseif( $is_safari ) {
        $classes[] = 'safari';
    }
    elseif( $is_IE ) {
        $classes[] = 'internet-explorer';
    }
    return $classes;
}
add_filter('body_class', 'add_browser_classes');
/*----------------------------------------------------------*/
/* Theme Supports
/*----------------------------------------------------------*/
function rgs_setup() {
    // Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );

    // Enable support for post thumbnails and featured images.
    add_theme_support( 'post-thumbnails' );

    // Adds <title> tag support
    add_theme_support( 'title-tag' );

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

    // Add widgets support
    add_theme_support( 'widgets' );

    // Add custom navigation menus.
    register_nav_menus( array(
        'header-menu'   => __( 'Menu Header', 'rgs' ),
        'tentang-kami'   => __( 'Tentang Kami', 'rgs' )
    ) );
}
add_action( 'after_setup_theme', 'rgs_setup' );
/*----------------------------------------------------------*/
/* Custom class in wp_nav_menu link
/*----------------------------------------------------------*/
function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
        return $atts;
    }
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
/*----------------------------------------------------------*/
/* Register Custom Post Types
/*----------------------------------------------------------*/
function rgs_reg_cpts() {

     /**
     * Post Type: Jasa.
     */
 
     $labels = [
         "name"                     => esc_html__( "Jasa", "rgs" ),
         "singular_name"            => esc_html__( "Jasa", "rgs" ),
         "menu_name"                => esc_html__( "Jasa", "rgs" ),
         "all_items"                => esc_html__( "All Jasa", "rgs" ),
         "add_new"                  => esc_html__( "Add new", "rgs" ),
         "add_new_item"             => esc_html__( "Add new Jasa", "rgs" ),
         "edit_item"                => esc_html__( "Edit Jasa", "rgs" ),
         "new_item"                 => esc_html__( "New Jasa", "rgs" ),
         "view_item"                => esc_html__( "View Jasa", "rgs" ),
         "view_items"               => esc_html__( "View Jasa", "rgs" ),
         "search_items"             => esc_html__( "Search Jasa", "rgs" ),
         "not_found"                => esc_html__( "No Jasa found", "rgs" ),
         "not_found_in_trash"       => esc_html__( "No Jasa found in trash", "rgs" ),
         "parent"                   => esc_html__( "Parent Jasa:", "rgs" ),
         "featured_image"           => esc_html__( "Featured image for this Jasa", "rgs" ),
         "set_featured_image"       => esc_html__( "Set featured image for this Jasa", "rgs" ),
         "remove_featured_image"    => esc_html__( "Remove featured image for this Jasa", "rgs" ),
         "use_featured_image"       => esc_html__( "Use as featured image for this Jasa", "rgs" ),
         "archives"                 => esc_html__( "Jasa archives", "rgs" ),
         "insert_into_item"         => esc_html__( "Insert into Jasa", "rgs" ),
         "uploaded_to_this_item"    => esc_html__( "Upload to this Jasa", "rgs" ),
         "filter_items_list"        => esc_html__( "Filter Jasa list", "rgs" ),
         "items_list_navigation"    => esc_html__( "Jasa list navigation", "rgs" ),
         "items_list"               => esc_html__( "Jasa list", "rgs" ),
         "attributes"               => esc_html__( "Jasa attributes", "rgs" ),
         "name_admin_bar"           => esc_html__( "Jasa", "rgs" ),
         "item_published"           => esc_html__( "Jasa published", "rgs" ),
         "item_published_privately" => esc_html__( "Jasa published privately.", "rgs" ),
         "item_reverted_to_draft"   => esc_html__( "Jasa reverted to draft.", "rgs" ),
         "item_scheduled"           => esc_html__( "Jasa scheduled", "rgs" ),
         "item_updated"             => esc_html__( "Jasa updated.", "rgs" ),
         "parent_item_colon"        => esc_html__( "Parent Jasa:", "rgs" ),
     ];
 
     $args = [
         "label"                    => esc_html__( "Jasa", "rgs" ),
         "labels"                   => $labels,
         "description"              => "",
         "public"                   => true,
         "publicly_queryable"       => true,
         "show_ui"                  => true,
         "show_in_rest"             => true,
         "rest_base"                => "",
         "rest_controller_class"    => "WP_REST_Posts_Controller",
         "rest_namespace"           => "wp/v2",
         "has_archive"              => true,
         "show_in_menu"             => true,
         "show_in_nav_menus"        => true,
         "delete_with_user"         => false,
         "exclude_from_search"      => false,
         "capability_type"          => "post",
         "map_meta_cap"             => true,
         "hierarchical"             => false,
         "can_export"               => true,
         "rewrite"                  => [ "slug" => "jasa", "with_front" => true ],
         "query_var"                => true,
         "menu_position"            => 5,
         "menu_icon"                => "dashicons-index-card",
         "supports"                 => [ "title", "thumbnail", "custom-fields" ],
         "taxonomies"               => [ "jasa_categories" ],
         "show_in_graphql"          => false,
     ];
 
     register_post_type( "jasa", $args );
 }
 
 add_action( 'init', 'rgs_reg_cpts' );
 /*----------------------------------------------------------*/
 /* Register Custom Taxonomies
 /*----------------------------------------------------------*/
 function rgs_reg_custom_taxonomies() {
 
     /**
     * Taxonomy: Jasa Categories.
     */
 
     $labels = [
         "name"                     => esc_html__( "Jasa Categories", "rgs" ),
         "singular_name"            => esc_html__( "Jasa Category", "rgs" ),
         "menu_name"                => esc_html__( "Jasa Categories", "rgs" ),
         "all_items"                => esc_html__( "All Jasa Categories", "rgs" ),
         "edit_item"                => esc_html__( "Edit Jasa Category", "rgs" ),
         "view_item"                => esc_html__( "View Jasa Category", "rgs" ),
         "update_item"              => esc_html__( "Update Jasa Category name", "rgs" ),
         "add_new_item"             => esc_html__( "Add new Jasa Category", "rgs" ),
         "new_item_name"            => esc_html__( "New Jasa Category name", "rgs" ),
         "parent_item"              => esc_html__( "Parent Jasa Category", "rgs" ),
         "parent_item_colon"        => esc_html__( "Parent Jasa Category:", "rgs" ),
         "search_items"             => esc_html__( "Search Jasa Categories", "rgs" ),
         "popular_items"            => esc_html__( "Popular Jasa Categories", "rgs" ),
         "separate_items_with_commas" => esc_html__( "Separate Jasa Categories with commas", "rgs" ),
         "add_or_remove_items"      => esc_html__( "Add or remove Jasa Categories", "rgs" ),
         "choose_from_most_used"    => esc_html__( "Choose from the most used Jasa Categories", "rgs" ),
         "not_found"                => esc_html__( "No Jasa Categories found", "rgs" ),
         "no_terms"                 => esc_html__( "No Jasa Categories", "rgs" ),
         "items_list_navigation"    => esc_html__( "Jasa Categories list navigation", "rgs" ),
         "items_list"               => esc_html__( "Jasa Categories list", "rgs" ),
         "back_to_items"            => esc_html__( "Back to Jasa Categories", "rgs" ),
         "name_field_description"   => esc_html__( "The name is how it appears on your site.", "rgs" ),
         "parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "rgs" ),
         "slug_field_description"   => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "rgs" ),
         "desc_field_description"   => esc_html__( "The description is not prominent by default; however, some themes may show it.", "rgs" ),
     ];
 
     
     $args = [
         "label"                    => esc_html__( "Jasa Categories", "rgs" ),
         "labels"                   => $labels,
         "public"                   => true,
         "publicly_queryable"       => true,
         "hierarchical"             => true,
         "show_ui"                  => true,
         "show_in_menu"             => true,
         "show_in_nav_menus"        => true,
         "query_var"                => true,
         "rewrite"                  => [ 'slug' => 'jasa-categories', 'with_front' => true, ],
         "show_admin_column"        => true,
         "show_in_rest"             => true,
         "show_tagcloud"            => false,
         "rest_base"                => "jasa_categories",
         "rest_controller_class"    => "WP_REST_Terms_Controller",
         "rest_namespace"           => "wp/v2",
         "show_in_quick_edit"       => true,
         "sort"                     => true,
         "show_in_graphql"          => false,
     ];
     register_taxonomy( "jasa_categories", [ "jasa" ], $args );
 }
 add_action( 'init', 'rgs_reg_custom_taxonomies' );
/*----------------------------------------------------------*/
/* Filter Latest Posts - Blog Page
/*----------------------------------------------------------*/
function filter_latest_posts() {
    $catSlug = $_POST['category'];

    $ajaxposts = new WP_Query(
        array(
               'post_type'          => 'post',
               'post_status'        => 'publish',
               'posts_per_page'     => 9,
               'category_name'      => $catSlug,
               'orderby'            => 'date',
               'order'              => 'DESC'
            )
    );
    $response = '';

    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part( 'parts/posts', 'filter' );
        endwhile;
    } else {
        $response = 'empty';
    }
    echo $response;
    exit;
    }
add_action('wp_ajax_filter_latest_posts', 'filter_latest_posts');
add_action('wp_ajax_nopriv_filter_latest_posts', 'filter_latest_posts');
/*----------------------------------------------------------*/
/* Filter Posts Lainnya - Single Page
/*----------------------------------------------------------*/
function filter_posts_lainnya() {
    $catSlug = $_POST['category'];

    $ajaxposts = new WP_Query(
        array(
               'post_type'          => 'post',
               'post_status'        => 'publish',
               'posts_per_page'     => 4,
               'category_name'      => $catSlug,
               'orderby'            => 'rand',
               'order'              => 'DESC'
            )
    );
    $response = '';

    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part( 'parts/posts', 'filter' );
        endwhile;
    } else {
        $response = 'empty';
    }
    echo $response;
    exit;
    }
add_action('wp_ajax_filter_posts_lainnya', 'filter_posts_lainnya');
add_action('wp_ajax_nopriv_filter_posts_lainnya', 'filter_posts_lainnya');
?>