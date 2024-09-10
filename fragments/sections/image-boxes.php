<?php
if ( ! $boxes = get_sub_field( 'entries' ) ) {
  return;
}

$is_wide_section = get_sub_field( 'wide_section' );

$additional_classes = get_sub_field( 'dark_background' ) ? 'section--dark' : '';
$additional_classes .= $is_wide_section ? ' section--sign-up' : ' section--movement';

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<section class="section <?php echo $additional_classes; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <?php if ( ! $is_wide_section ) : ?>
    <div class="container">
  <?php endif ?>
    <div class="section__content">
      <div class="row">
        <div class="col-sm-10 col-md-8 centered animated">
          <?php
          if ( $content = $title = get_sub_field( 'content' ) ) {
            echo crb_content( $content );
          }
          ?>
        </div><!-- /.col-sm-8 -->
      </div><!-- /.row -->
    </div><!-- /.section__content -->

    <div class="widgets">
      <div class="row">
        <?php
        $donate_links = 1;
        foreach ( $boxes as $box ) : ?>
          <div class="col-sm-6 col-md-4 eq-me animated">
            <div class="widget widget--alt">
              <?php if ( ! empty( $box['button_url'] ) ) : ?>
                <a id="donate_link_<?php echo $donate_links; ?>" href="<?php echo esc_url( $box['button_url'] ); ?>" target="<?php echo $box['target']; ?>">
              <?php
              $donate_links++;
              endif ?>

              <?php if ( ! empty( $box['image'] ) ) : ?>
                <div class="widget__image">
                  <?php echo wp_get_attachment_image( $box['image'], 'crb_img_box_image' ); ?>
                </div><!-- /.widget__image -->
              <?php endif; ?>

               <div class="widget__content">
                <?php
                if ( ! empty( $box['content'] ) ) {
                  echo crb_content( $box['content'] );
                }
                ?>

                <?php if ( ! empty( $box['button_label'] ) && ! empty( $box['button_url'] ) ) : ?>
                  <span class="btn btn--border widget__btn" ><?php echo esc_html( $box['button_label'] ); ?></span>
                <?php endif ?>
               </div><!-- /.widget__content -->

              <?php if ( ! empty( $box['button_url'] ) ) : ?>
                </a>
              <?php endif ?>
            </div>
          </div><!-- /.col-md-4 -->
        <?php endforeach ?>
      </div><!-- /.row -->
    </div><!-- /.widgets -->
  <?php if ( ! $is_wide_section ) : ?>
    </div><!-- /.container -->
  <?php endif ?>
</section>
