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

<section class="section section--boxes" <?php echo $has_section_id ? $id_attr : ''; ?>>

<?php if ( $content = get_sub_field( 'content' ) ) { ?>
    <div class="section__head">
        <div class="container">
            <div class="row">
                <div class="col-sm-11 col-md-9 centered animated">
                    <?php echo crb_content( $content ); ?>
                </div><!-- /.col-sm-9 centered -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section__head -->
  <?php } ?>

  <?php if ( $articles = get_sub_field( 'entries' ) ) : ?>
    <div class="section__body">
      <?php foreach ( $articles as $key => $article ) : ?>
        <div class="section__entry">
          <div class="box animated <?php echo $article['box_layout'] === 'left' ? '' : 'box--opposite'; ?>">
            <?php if ( ! empty( $article['image'] ) ) : ?>
              <div class="box__image fullsize-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $article['image'], 'crb_halfwidth_image' ); ?>)">
                <?php if ( ! empty( $article['video_url'] ) ) : ?>
                  <a href="#" class="js-video-inline video video--secondary">
                    <?php echo wp_get_attachment_image( $article['image'], 'crb_halfwidth_image' ); ?>
                      <i class="ico-play"></i>

                      <?php
                      $video = Carbon_Video::create( $article['video_url'] );
                      $video->set_param('rel', '0')
                      ?>

                      <div class="video__content">
                        <?php echo $video->get_embed_code( 640, 360 ); ?>
                      </div>
                  </a>
                <?php endif ?>
              </div><!-- /.box__image -->
            <?php endif ?>

            <?php if ( ! empty( $article['content'] ) ) : ?>
              <div class="box__content">
                <?php echo crb_content( $article['content'] ); ?>

                <?php if ( ! empty( $article['button_label'] ) && ! empty( $article['button_url'] ) ) : ?>
                  <a href="<?php echo esc_url( $article['button_url'] ); ?>" class="btn box__btn" target="<?php echo $article['target']; ?>"><?php echo esc_html( $article['button_label'] ); ?></a>
                <?php endif ?>
              </div><!-- /.box__content -->
            <?php endif ?>
          </div><!-- /.box -->
        </div><!-- /.section__entry -->
      <?php endforeach ?>
    </div><!-- /.section__body -->
  <?php endif ?>
</section>
