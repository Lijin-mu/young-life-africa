<div class="main main--offset">
  <section class="section section--error animated">
    <div class="container">
      <div class="row">
        <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/temp/404@2x.png" alt="" width="476" height="198">

        <p><?php _e( 'Opps! Looks Like This Page Doesn’t Exist.', 'crb' ); ?></p>

        <a href="<?php echo home_url(); ?>" class="btn btn--border btn--medium section__btn"><?php _e( 'Return Home', 'crb' ); ?></a>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.section -->

  <?php
  if ( get_field( 'callout_settings', 'option' )['show_callout'] ) {
    crb_render_fragment( 'callout' );
  }

  if ( get_field( 'show_form', 'option' ) ) {
    crb_render_fragment( 'callout-form' );
  }
  ?>
</div><!-- /.main -->
