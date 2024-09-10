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

<section class="section section--country" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="section__head">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-8 centered animated">
          <?php
          if ( $flag = get_sub_field( 'flag' ) ) {
            echo wp_get_attachment_image( $flag, 'crb_flag_large_img', false, array(
              'class' => 'section__flag animated',
            ) );
          }

          if ( $content = get_sub_field( 'top_content' ) ) {
            echo crb_content( $content );
          }
          ?>
        </div><!-- /.col-sm-8 centered -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.section__head -->

  <div class="section__body">
    <div class="section__entry section__entry--dark">
      <?php if ( $image_content = get_sub_field( 'content_over_image' ) ) : ?>
        <h2 class="section__title animated">
          <?php echo crb_replace_asterisks_with_span_tag( nl2br( esc_html( $image_content ) ) ); ?>
        </h2><!-- /.section__title -->
      <?php endif ?>

      <?php if ( $bg_image = get_sub_field( 'bg_image' ) ) : 
        $pin_top = get_sub_field( 'pin_top_location' );
        $pin_left = get_sub_field( 'pin_left_location' );
      ?>
        <div class="section__image section__map animated" style="background-image: url(<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/temp/map4.png);">
          <?php echo wp_get_attachment_image( $bg_image, 'crb_country_map_img' ); ?>

          <?php if ( $pin_top && $pin_left ) : ?>
            <span style="top: <?php echo $pin_top; ?>%; left: <?php echo $pin_left ?>%;"></span>
          <?php endif ?>
        </div><!-- /.section__image -->
      <?php endif ?>

    </div><!-- /.section__entry -->
    <div class="widget-country">
        <header class="widget__head animated">
          <?php
          if ( isset( $flag ) ) {
            echo wp_get_attachment_image( $flag, 'crb_flag_small_img' );
          }

          if ( $bottom_content = get_sub_field( 'bottom_content' ) ) {
            echo crb_content( $bottom_content );
          }
          ?>
        </header><!-- /.widget__head -->
    </div><!-- /.widget-country -->
  </div><!-- /.section__body -->
</section><!-- /.section -->
