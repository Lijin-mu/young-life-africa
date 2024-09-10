<?php
if ( ! $video_url = get_sub_field( 'video_url' ) ) {
  return;
}

$is_wide_video = get_sub_field( 'wide_video' );

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<div class="section-video section--ornament animated" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <?php if ( ! $is_wide_video && $section_background = get_sub_field( 'section_background' ) ) : ?>
    <span class="background" style="background-image: url(<?php echo wp_get_attachment_image_url( $section_background, 'crb_fullwidth_image' ); ?>);"></span>
  <?php endif ?>

  <div class="section__group">
    <?php if ( ! $is_wide_video ) : ?>
      <div class="container">
    <?php endif ?>

    <div class="row">
      <div class="col-sm-12">
        <?php
        if ( $content = get_sub_field( 'content' ) ) {
          echo crb_content( $content );
        }
        ?>

        <div class="section__video animated">
          <a href="#" class="js-video-inline video">
            <div class="video__inner">
              <?php echo wp_get_attachment_image( get_sub_field( 'video_image' ), 'crb_video_image' ); ?>

              <i class="ico-play"></i>
            </div>

            <?php
            $video = Carbon_Video::create( $video_url );
            $video->set_param('rel', '0')
            ?>

            <div class="video__content">
              <?php echo $video->get_embed_code( 640, 360 ); ?>
            </div>
          </a>
        </div><!-- /.section__video -->

        <?php
        $btn_label = get_sub_field( 'button_label' );
        $btn_url = get_sub_field( 'button_url' );
        ?>

        <?php if ( $btn_label && $btn_url ) : ?>
          <?php $btn_target = get_sub_field( 'target' ) ?>

          <div class="section__actions">
            <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn--border article__btn article__btn--large" target="<?php echo $btn_target; ?>">
              <?php echo esc_html( $btn_label ); ?>
            </a>
          </div><!-- /.section__actions -->
        <?php endif ?>
      </div><!-- /.col-sm-12 -->
    </div><!-- /.row -->

    <?php if ( ! $is_wide_video ) : ?>
      </div><!-- /.container -->
    <?php endif ?>
  </div><!-- /.section__group -->
</div><!-- /.section__video -->
