<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-relative-urls');

    $theme_dir = realpath(dirname(__FILE__) . '/..');
    $autoload_dir = $theme_dir . '/vendor/autoload.php';

    if ( ! is_readable( $autoload_dir ) ) {
    wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'crb' ) );
    }

    include_once( $autoload_dir );

    include_once('utils.php');

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain('sage', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
        'primary_navigation' => __( 'Primary Navigation', 'sage' ),
    ]);

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    if( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( array(
            'page_title'    => 'Theme Options',
            'menu_title'    => 'Theme Options',
            'menu_slug'     => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Google Map API Key',
            'menu_title'    => 'Google Map API Key',
            'menu_slug'     => 'theme-options-google-api-key',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Google Map API Key',
            'menu_title'    => 'Google Map API Key',
            'menu_slug'     => 'theme-options-google-api-key',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Socials',
            'menu_title'    => 'Socials',
            'menu_slug'     => 'theme-options-socials',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Footer',
            'menu_title'    => 'Footer',
            'menu_slug'     => 'theme-options-footer',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Theme Articles',
            'menu_title'    => 'Theme Articles',
            'menu_slug'     => 'theme-options-articles',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Callout Form',
            'menu_title'    => 'Callout Form',
            'menu_slug'     => 'theme-options-callout',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => '404 Page',
            'menu_title'    => '404 Page',
            'menu_slug'     => 'theme-options-404',
            'parent_slug'   => 'theme-options',
        ));

        acf_add_options_sub_page( array(
            'page_title'    => 'Footer Bar',
            'menu_title'    => 'Footer Bar',
            'menu_slug'     => 'theme-options-footer-bar',
            'parent_slug'   => 'theme-options',
        ));
    }

    // Image sizes
    add_image_size( 'crb_fullwidth_image', '1900', '' );
    add_image_size( 'crb_halfwidth_image', '950', '' );
    add_image_size( 'crb_img_box_image', '370', '250', true );
    add_image_size( 'crb_member_image', '370', '400', true );
    add_image_size( 'crb_resource_image', '270', '325', true );
    add_image_size( 'crb_feature_icon', '59', '59' );
    add_image_size( 'crb_footer_image', '570', '' );
    add_image_size( 'crb_gallery_img', '1030', '700' );
    add_image_size( 'crb_country_map_img', '1135', '0' );
    add_image_size( 'crb_article_img', '1360', '0' );
    add_image_size( 'crb_video_large_img', '1170', '700', true );
    add_image_size( 'banner_size', '1440', '700', true );
    add_image_size( 'crb_interactive_map_img', '670', '0' );
    add_image_size( 'crb_flag_img', '100', '0' );
    add_image_size( 'crb_flag_large_img', '145', '0' );
    add_image_size( 'crb_flag_small_img', '76', '0' );
    add_image_size( 'crb_story_large_img', '500', '540' );

    add_filter('acf/settings/google_api_key', function () {
        if ( $map_key = get_field( 'google_map_api_key', 'option' ) ) {
          return $map_key;
        }
    } );
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
    static $display;

    isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
    wp_enqueue_style( 'sage/fonts', 'https://fonts.googleapis.com/css?family=Rubik:400,500,700', true );
    wp_enqueue_style( 'sage/fonts-fa', 'https://fonts.googleapis.com/css?family=Rubik:400,500,700', true );

    wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if ( $map_key = get_field( 'google_map_api_key', 'option' ) ) {
      wp_enqueue_script('sage/google-maps-js', 'https://maps.googleapis.com/maps/api/js?key=' . $map_key, true);
    }

    wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);

    wp_localize_script( 'sage/js', 'options', array(
      'theme_dir' => get_bloginfo( 'stylesheet_directory' ),
    ) );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
