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

<section class="section section--employees" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="section__content">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-8 centered animated">
          <?php
          if ( $content = get_sub_field( 'content' ) ) {
            echo crb_content( $content );
          }
          ?>
        </div><!-- /.col-sm-8 centered -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.section__content -->

  <?php if ( $image = get_sub_field( 'image' ) ) : ?>
    <div class="section__image animated">
      <?php echo wp_get_attachment_image( $image, 'crb_article_img' ); ?>
    </div><!-- /.section__image -->
  <?php endif ?>
</section><!-- /.section-/-ornament -->
