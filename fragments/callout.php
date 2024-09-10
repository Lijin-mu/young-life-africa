<?php $callout_options = get_field( 'callout_settings', 'option' ); ?>

<div class="section-background section-no-offset section-stretch">
  <?php if ( ! empty( $callout_options['bg_image'] ) ) : ?>
    <div class="section__image fullsize-image animated" style="background-image: url(<?php echo wp_get_attachment_image_url( $callout_options['bg_image'], 'crb_fullwidth_image' ); ?>);">
      <?php echo wp_get_attachment_image( $callout_options['bg_image'], 'crb_fullwidth_image' ); ?>
    </div><!-- /.section__image -->
  <?php endif ?>

  <div class="section__content">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-md-6 centered">
          <div class="section__content-inner animated">
            <?php
            if ( ! empty( $callout_options['content'] ) ) {
              echo crb_content( $callout_options['content'] );
            }
            ?>

            <?php if ( $callout_options['button_label'] && $callout_options['button_url'] ) : ?>
              <?php
              $btn_type = $callout_options['button_type'];
              $btn_target = $callout_options['large_button'];

              if ( $btn_type === 'button' || $btn_type === 'plus' ) {
                $is_large_btn = $callout_options['large_button'];
                $link_classes = 'btn section__btn ';
                $link_classes .= $is_large_btn ? 'btn--large' : 'btn--wide';
              } else {
                $link_classes = 'link';
              }
              ?>

              <a href="<?php echo esc_url( $callout_options['button_url'] ); ?>" class="<?php echo $link_classes; ?>" target="<?php echo $btn_target; ?>">
                <?php if ( $btn_type === 'plus' ) : ?>
                  <i class="ico-plus"></i>
                <?php endif ?>
                <?php echo esc_html( $callout_options['button_label'] ); ?>
              </a>
            <?php endif ?>
          </div><!-- /.section__content-inner -->
        </div><!-- /.col-sm-10 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.section__content -->
</div><!-- /.section-background -->
