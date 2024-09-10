<?php
global $post;
if ( $post ) {
  $page_id = $post->ID;
}

if ( is_home() || is_search() || is_archive() ) {
  $page_id = get_option( 'page_for_posts' );
}

if ( ! isset( $page_id ) && ! is_404() ) {
  return;
}

if ( ! is_404() && ! get_field( 'show_callout_form', $page_id )) {
  return;
}
?>

<div class="callout section-stretch">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php if ( $title = get_field( 'callout_title', 'option' ) ) : ?>
          <h2 class="animated"><?php echo esc_html( $title ); ?></h2>
        <?php endif ?>

        <?php if ( $subtitle = get_field( 'callout_subtitle', 'option' ) ): ?>
          <p class="animated"><?php echo esc_html( $subtitle ); ?></p>
        <?php endif ?>

        <?php if ( $form = get_field( 'callout_form', 'option' ) ) : ?>
          <div id="footer-sub" class="subscribe animated">
            <?php
            crb_render_gform( $form['id'], true, array(
              'display_title' => true,
              'tabindex' => 69,
            ) )
            ?>
          </div><!-- /.subscribe -->
        <?php endif ?>
      </div><!-- /.col-sm-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.callout -->
