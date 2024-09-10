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

<section class="section-alt" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <div class="row">
      <?php if ( $map = get_sub_field( 'map' ) ) : ?>
        <div class="col-sm-6">
          <div class="section__media map animated" id="map" data-lat="<?php echo $map['lat'] ?>" data-lng="<?php echo $map['lng'] ?>">
          </div><!-- /.section__media -->
        </div><!-- /.col-sm-6 -->
      <?php endif ?>

      <div class="col-sm-6">
        <div class="section__content animated">
          <?php
          if ( $content = get_sub_field( 'content' ) ) {
            echo crb_content( $content );
          }
          ?>

          <div class="section__actions animated">
            <p><?php _e( 'Share', 'crb' ); ?></p>

            <div class="socials socials--color">
              <div class="sharethis-inline-share-buttons"></div>
            </div>
          </div><!-- /.section__actions -->
        </div><!-- /.section__content -->
      </div><!-- /.col-sm-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.section -->
