<?php
$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<section class="section section--story section--columns" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <?php if ( $content = get_sub_field( 'content' ) ) : ?>
    <header class="section__head">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-md-8 centered animated">
            <?php echo crb_content( $content ); ?>
          </div><!-- /.col-sm-9 centered -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </header><!-- /.section__head -->
  <?php endif ?>

  <div class="section__body">
    <div class="section__content">
      <div class="container">
        <div class="row animated">
          <div class="col-sm-5">
            <?php echo wpautop( esc_html( get_sub_field( 'left_column' ) ) ); ?>
          </div><!-- /.col-sm-5 -->

          <div class="col-sm-6 col-sm-offset-1">
            <?php echo wpautop( esc_html( get_sub_field( 'right_column' ) ) ); ?>
          </div><!-- /.col-sm-6 col sm-offset-1 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section__content -->
  </div><!-- /.section__body -->

  <?php if ( $image = get_sub_field( 'image' ) ) : ?>
    <div class="section__entry">
      <div class="section__image animated">
        <?php echo wp_get_attachment_image( $image, 'crb_article_img' ); ?>
      </div><!-- /.section__image -->
    </div><!-- /.section__entry -->
  <?php endif ?>
</section>
