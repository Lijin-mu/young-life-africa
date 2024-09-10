<?php
$bg_img = get_sub_field( 'background_img' );

if ( get_sub_field( 'image_side_offset' ) ) {
  $container_classes = 'section-background--alt';
} else {
  $container_classes = 'section-no-offset section-stretch';
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

<div class="section-background <?php echo $container_classes; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="section__image fullsize-image animated" style="background-image: url(<?php echo wp_get_attachment_image_url( $bg_img, 'crb_fullwidth_image' ); ?>);">
    <?php echo wp_get_attachment_image( $bg_img, 'crb_fullwidth_image' ); ?>
  </div><!-- /.section__image -->

  <?php if ( $content = get_sub_field( 'content' ) ) : ?>
    <?php $additional_clases = ! empty( get_sub_field( 'content_width' ) ) ? get_sub_field( 'content_width' ) : 'col-sm-10 col-md-8'; ?>

    <div class="section__content">
      <div class="container">
        <div class="row">
          <div class="<?php echo esc_html( $additional_clases ); ?> centered">
            <div class="section__content-inner animated">
              <?php
              echo crb_content( $content );

              $btn_label = get_sub_field( 'button_label' );
              $btn_url = get_sub_field( 'button_url' );
              ?>

              <?php if ( $btn_label && $btn_url ) : ?>
                <?php
                $btn_type = get_sub_field( 'button_type' );
                $btn_target = get_sub_field( 'target' );

                if ( $btn_type === 'button' || $btn_type === 'plus' ) {
                  $is_large_btn = get_sub_field( 'large_button' );
                  $link_classes = 'btn section__btn ';
                  $link_classes .= $is_large_btn ? 'btn--large' : 'btn--wide';
                } else {
                  $link_classes = 'link';
                }
                ?>

                <a href="<?php echo esc_url( $btn_url ); ?>" class="<?php echo $link_classes; ?>" target="<?php echo $btn_target; ?>">
                  <?php if ( $btn_type === 'plus' ) : ?>
                    <i class="ico-plus"></i>
                  <?php endif ?>
                  <?php echo esc_html( $btn_label ); ?>
                </a>
              <?php endif ?>
            </div><!-- /.section__content-inner -->
          </div><!-- /.col-sm-10 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section__content -->
  <?php endif ?>
</div><!-- /.section-background -->
