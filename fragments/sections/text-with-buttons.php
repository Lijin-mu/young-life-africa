<?php
if ( ! $rows = get_sub_field( 'rows' ) ) {
    return;
}

$additional_wrapper_classes = get_sub_field( 'background_image' ) ? 'section--about' : 'section--primary';
$additional_wrapper_classes .= get_sub_field( 'bottom_divider' ) ? ' section--border-bottom' : '';

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<section class="section <?php echo $additional_wrapper_classes ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
    <?php if ( $bg_image = get_sub_field( 'background_image' ) ) : ?>
      <span class="background animated" style="background-image: url(<?php echo wp_get_attachment_image_url( $bg_image, 'crb_fullwidth_image' ); ?>);"></span>
    <?php endif; ?>

    <div class="container">
      <?php foreach ( $rows as $row ) : ?>
        <?php $additional_classes = ! empty( $row['content_width'] ) ? $row['content_width'] : 'col-sm-10 col-md-10'; ?>

        <div class="section__group">
          <div class="row">
              <div class="<?php echo esc_html( $additional_classes ); ?> centered animated">
                  <?php
                  if ( ! empty( $row['content'] ) ) {
                      echo crb_replace_asterisks_with_span_tag( crb_content( $row['content'] ) );
                  }
                  ?>

                  <?php if ( ! empty( $row['buttons'] ) ) : ?>
                      <div class="section__actions animated">
                          <?php foreach ( $row['buttons'] as $button ) : ?>
                              <?php if ( ! empty( $button['url'] ) && ! empty( $button['label'] ) ) : ?>
                                <?php $additional_class = $button['type'] === 'outlined' ? 'btn--border' : ''; ?>

                                <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn <?php echo $additional_class; ?>" target="<?php echo $button['target']; ?>"><?php echo esc_html( $button['label'] ); ?></a>
                              <?php endif ?>
                          <?php endforeach ?>
                      </div><!-- /.section__actions -->
                  <?php endif ?>
              </div><!-- /.col-sm-8 -->
          </div><!-- /.row -->
        </div><!-- /.section__group -->
      <?php endforeach ?>
    </div><!-- /.container -->
</section><!-- /.section -->
