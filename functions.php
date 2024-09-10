<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/shortcodes.php', // Shorcodes
  'lib/gravity-form.php', // Gravity Forms
  'lib/acf_gravity_forms.php', // ACF Gravity Forms
  'lib/post-types.php', // Post Types
  'lib/taxonomies.php', // Taxonomies
  'lib/admin-hooks.php', // Admin Hooks
  'lib/comments.php', // Comments
  'lib/title.php' // Title
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_filter( 'nav_menu_item_title', 'crb_modify_nav_title', 10, 1 );
function crb_modify_nav_title( $title ) {
    return do_shortcode( $title );
}

// Enqueue custom CSS
function my_custom_theme_styles() {
    // Register the stylesheet
    // wp_enqueue_style('custom-styles', get_stylesheet_uri()); // This enqueues the theme's default style.css
    // OR
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom-style.css'); // For a specific CSS file in a custom directory
}
add_action('wp_enqueue_scripts', 'my_custom_theme_styles');


add_action( 'admin_enqueue_scripts', 'crb_admin_enqueue_scripts' );
add_action( 'login_enqueue_scripts', 'crb_admin_enqueue_scripts' );
function crb_admin_enqueue_scripts() {
  $template_dir = get_template_directory_uri();
  crb_enqueue_style( 'theme-admin-styles', $template_dir . '/assets/admin-style.css' );
}
