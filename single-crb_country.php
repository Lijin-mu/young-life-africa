<?php crb_render_fragment( 'intro' ); ?>

<?php if ( have_rows( 'sections' ) ) : ?>
  <?php while ( have_rows( 'sections' ) ) : the_row(); ?>
    <?php include( locate_template( 'fragments/sections/' . crb_change_underscores_with_hyphens( get_row_layout() ) . '.php' ) ); ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php crb_render_fragment( 'callout-form' ); ?>
