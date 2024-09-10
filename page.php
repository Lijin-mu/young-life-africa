<?php
the_post();
crb_render_fragment( 'intro' );
?>

<div class="main">
  <div class="container">
    <?php
    if ( has_post_thumbnail() ) {
      the_post_thumbnail( 'crb_video_large_img' );
    }

    the_content();
    ?>
  </div>

  <?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows( 'sections' ) ) : the_row(); ?>
      <?php include( locate_template( 'fragments/sections/' . crb_change_underscores_with_hyphens( get_row_layout() ) . '.php' ) ); ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php get_template_part( 'templates/sidebar' ); ?>
</div>

<?php crb_render_fragment( 'callout-form' ); ?>
