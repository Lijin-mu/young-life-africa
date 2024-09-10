<?php
if ( ! $quote = get_sub_field( 'text' ) ) {
  return;
}

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<?php if ( ! $bg_image = get_sub_field( 'backgound_image') ) : ?>
  <section class="section section--large <?php echo get_sub_field( 'bottom_divider') ? 'section--border-bottom' : ''; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
    <div class="container">
      <div class="row">
        <div class="col-md-10 centered">
          <i class="ico-logo section__logo animated"></i>

          <div class="blockquote blockquote--dark animated">
            <blockquote class="animated">
              <?php echo nl2br( esc_html( $quote ) ); ?>
            </blockquote>

            <?php if ( $author = get_sub_field( 'author' ) ) : ?>
              <p class="blockquote__author animated"><?php echo esc_html( $author ); ?></p><!-- /.blockquote__author -->
            <?php endif ?>
          </div><!-- /.blockquote -->
        </div><!-- /.col-sm-8 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>
<?php else : ?>
  <div class="section-background section-background--alt section-stretch" <?php echo $has_section_id ? $id_attr : ''; ?>>
    <div class="section__image fullsize-image animated" style="background-image: url(<?php echo wp_get_attachment_image_url( $bg_image, 'crb_fullwidth_image' ); ?>)">
      <?php echo wp_get_attachment_image( $bg_image, 'crb_fullwidth_image' ); ?>
    </div><!-- /.section__image -->

    <div class="section__content">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 centered">
            <div class="section__content-inner">
              <i class="ico-logo animated"></i>

              <div class="blockquote animated">
                <blockquote>
                  <?php echo nl2br( esc_html( $quote ) ); ?>
                </blockquote>

                <?php if ( $author = get_sub_field( 'author' ) ) : ?>
                  <p class="blockquote__author animated"><?php echo esc_html( $author ); ?></p><!-- /.blockquote__author -->
                <?php endif ?>
              </div><!-- /.blockquote -->
            </div><!-- /.section__content-inner -->
          </div><!-- /.col-sm-10 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section__content -->
  </div><!-- /.section-background -->
<?php endif ?>
