<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('templates/head'); ?>

    <body <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHDTBF9" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!--[if IE]>
          <div class="alert alert-warning">
            <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
          </div>
        <![endif]-->

        <?php
        if ( is_home() || is_search() || is_archive() ) {
            $page_id = get_option( 'page_for_posts' );
        } else {
          $page_id = get_the_ID();
        }

        $additinal_wrapper_class = get_field( 'show_intro', $page_id ) || is_single() ? '' : 'wrapper--offset';
        ?>

        <div class="wrapper <?php echo $additinal_wrapper_class; ?>">
          <?php
            do_action('get_header');
            get_template_part('templates/header');

            include Wrapper\template_path();

            do_action('get_footer');
            get_template_part('templates/footer');
            wp_footer();
            ?>
        </div><!-- /.wrapper -->
    </body>
</html>
