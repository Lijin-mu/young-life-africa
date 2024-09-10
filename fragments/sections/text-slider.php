<?php
if ( ! $slides = get_sub_field( 'slides' ) ) {
  return;
}

$additional_class = get_sub_field( 'dark_background' ) ? 'section--dark' : '';

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<div class="section <?php echo $additional_class; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <div class="row ">
      <div class="col-sm-10 centered">
        <div class="section__content">
          <div class="row">
            <div class="col-sm-10 col-md-8 centered animated">
              <?php
              if ( $content = get_sub_field( 'content' ) ) {
                echo crb_content( $content );
              }
              ?>
            </div><!-- /.col-sm-10 centered -->
          </div><!-- /.row -->
        </div><!-- /.section__content -->

        <div class="slider-alt slider-gallery animated">
          <div class="slider__clip">
            <div class="slider__slides">
              <?php foreach ( $slides as $slide ) : ?>
                <div class="slider__slide">
                  <div class="slider__slide-head">
                    <?php if ( ! empty( $slide['title'] ) ) : ?>
                      <h2><?php echo esc_html( $slide['title'] ); ?></h2>
                    <?php endif ?>
                  </div><!-- /.slider__slide-head -->

                  <div class="slider__slide-content">
                    <?php
                    echo esc_html( $slide['content'] );
                    ?>

                    <?php if ( ! empty( $slide['button_label'] ) && ! empty( $slide['button_url'] ) ) : ?>
                      <a href="<?php echo esc_url( $slide['button_url'] ); ?>" class="btn btn--small btn--border btn--border-dark slider__btn" target="<?php echo $slide['target']; ?>">
                        <?php echo esc_html( $slide['button_label'] ); ?>
                      </a>
                    <?php endif ?>
                  </div><!-- /.slider__slide-content -->
                </div><!-- /.slider__slide -->
              <?php endforeach ?>
            </div><!-- /.slider__slides -->
          </div><!-- /.slider__clip -->
        </div><!-- /.slider -->
      </div><!-- /.col-sm-10 centered -->
    </div><!-- /.row  -->
  </div><!-- /.container -->
</div><!-- /.section section-/-dark -->
