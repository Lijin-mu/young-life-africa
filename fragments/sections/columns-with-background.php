<?php
$left_rows = get_sub_field( 'left_column' );
$right_rows = get_sub_field( 'right_column' );

if ( ! $left_rows && ! $right_rows ) {
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

<section class="section section--ornament <?php echo get_sub_field( 'enable_top_offset' ) ? 'section--offset' : ''; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <?php if ( $bg_image = get_sub_field( 'bg_image' ) ) : ?>
    <span class="background" style="background-image: url(<?php echo wp_get_attachment_image_url( $bg_image, 'crb_fullwidth_image' ); ?>);"></span>
  <?php endif ?>

  <div class="section__entry">
    <div class="container">
      <div class="row">
        <div class="col-sm-11 centered">
          <?php if ( $title = get_sub_field( 'title' ) ) : ?>
            <h2 class="section__title section__title--alt animated"><?php echo crb_replace_asterisks_with_span_tag( nl2br( esc_html( $title ) ) ); ?></h2>
          <?php endif ?>

          <div class="features">
            <div class="row">
              <?php if ( $left_rows ) : ?>
                <div class="col-sm-6">
                  <div class="row">
                    <?php foreach ( $left_rows as $row ) : ?>
                      <div class="col-sm-12">
                        <div class="feature animated">
                          <?php echo crb_content( $row['row'] ); ?>
                        </div><!-- /.feature -->
                      </div><!-- /.col-sm-6 -->
                    <?php endforeach ?>
                  </div><!-- /.row -->
                </div><!-- /.col-sm-6 -->
              <?php endif ?>

              <?php if ( $right_rows ) : ?>
                <div class="col-sm-6">
                  <div class="row">
                    <?php foreach ( $right_rows as $row ) : ?>
                      <div class="col-sm-12">
                        <div class="feature animated">
                          <?php echo crb_content( $row['row'] ); ?>
                        </div><!-- /.feature -->
                      </div><!-- /.col-sm-6 -->
                    <?php endforeach ?>
                  </div><!-- /.row -->
                </div><!-- /.col-sm-6 -->
              <?php endif ?>
            </div><!-- /.row -->

            <?php
            $btn_label = get_sub_field( 'button_label' );
            $btn_link = get_sub_field( 'button_url' );
            ?>

            <?php if ( $btn_label && $btn_link ) : ?>
              <?php $btn_target = get_sub_field( 'target' ); ?>

              <div class="features__actions animated">
                <a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn--border" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
              </div><!-- /.features__actions -->
            <?php endif ?>
          </div><!-- /.features -->
        </div><!-- /.col-sm-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.section__entry -->
</section><!-- /.section-/-ornament -->
