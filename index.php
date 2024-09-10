<?php
global $post;
$page_id = $post->ID;

if ( is_home() || is_search() || is_archive() ) {
    $page_id = get_option( 'page_for_posts' );
}

crb_render_fragment( 'intro' );

if ( have_rows( 'sections', $page_id ) ) : ?>
  <?php while ( have_rows( 'sections', $page_id ) ) : the_row(); ?>
    <?php crb_render_fragment( 'fragments/sections/' . crb_change_underscores_with_hyphens( get_row_layout() ) ); ?>
  <?php endwhile; ?>
<?php endif;

crb_render_fragment( 'callout-form' );
