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

<section class="section section--contact" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <div class="row">
      <?php $additional_classes = ! empty( get_sub_field( 'content_width' ) ) ? get_sub_field( 'content_width' ) : 'col-sm-11 col-md-6'; ?>

      <div class="<?php echo $additional_classes; ?> centered">
        <div class="section__content animated">
          <?php
          if ( $content = get_sub_field( 'content' ) ) {
            echo crb_content( $content );
          }
          ?>

          <div class="form animated">
            <?php crb_render_gform( get_sub_field( 'form' )['id'], true, array( 'tabindex' => 10 ) ); ?>
          </div><!-- /.form -->
        </div><!-- /.section__content -->
      </div><!-- /.col-sm-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.section -->
