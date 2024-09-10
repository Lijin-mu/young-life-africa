<?php
if ( ! $slides = get_sub_field( 'slides' ) ) {
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

<div class="section-gallery" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <?php if ( $title = get_sub_field( 'title' ) ) : ?>
    <h2 class="section__title animated"><?php echo esc_html( $title ); ?></h2>
  <?php endif ?>

  <div class="slider slider-gallery animated">
    <div class="slider__clip">
      <div class="slider__slides">
        <?php foreach ( $slides as $slide ) : ?>
          <div class="slider__slide">
            <div class="slider__slide-image fullsize-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $slide['image'], 'crb_gallery_img' ); ?>);">
              <?php echo wp_get_attachment_image( $slide['image'], 'crb_gallery_img' ); ?>

              <?php if ( ! empty( $slide['caption'] ) ) : ?>
                <div class="slider__slide-content">
                  <p><?php echo esc_html( $slide['caption'] ); ?></p>
                </div><!-- /.slider__slide-content -->
              <?php endif ?>
            </div><!-- /.slider__slide-image -->
          </div><!-- /.slider__slide -->
        <?php endforeach ?>
      </div><!-- /.slider__slides -->
    </div><!-- /.slider__clip -->
  </div><!-- /.slider -->
</div><!-- /.section-gallery -->
