<?php
if ( ! $memebers = get_sub_field( 'members' ) ) {
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

<section class="section section--employees" <?php echo $has_section_id ? $id_attr : ''; ?>>
    <div class="container animated">
      <?php
      if ( $content = get_sub_field( 'content' ) ) {
        echo crb_content( $content );
      }
      ?>

      <div class="widgets-primary">
        <div class="row">
          <?php foreach ( $memebers as $memeber_id ) : ?>
            <div class="col-md-4 col-sm-6 eq-me animated">
              <div class="widget-primary">
                <a href="<?php echo get_the_permalink( $memeber_id ); ?>">
                  <?php if ( has_post_thumbnail( $memeber_id ) ) : ?>
                    <div class="widget__image">
                      <?php echo get_the_post_thumbnail( $memeber_id, 'crb_member_image' ); ?>
                    </div><!-- /.widget__image -->
                  <?php endif ?>

                  <div class="widget__content">
                    <h4><?php echo get_the_title( $memeber_id ); ?></h4>

                    <?php if ( get_sub_field( 'show_member_position' ) && $position = get_field( 'position', $memeber_id ) ) : ?>
                      <p><?php echo esc_html( $position ); ?></p>
                    <?php endif ?>
                  </div><!-- /.widget__content -->
                </a>
              </div><!-- /.employee -->
            </div><!-- /.col-sm-4 -->
          <?php endforeach ?>
        </div><!-- /.row -->

        <?php
        $btn_label = get_sub_field( 'button_label' );
        $btn_url = get_sub_field( 'button_url' );
        ?>

        <?php if ( $btn_label && $btn_url ) : ?>
          <?php $btn_target = get_sub_field( 'target' ); ?>

          <div class="widgets__actions animated">
            <a href="<?php echo esc_url( $btn_url ); ?>" class="btn" target="<?php echo $btn_target; ?>"><?php echo esc_html( $btn_label ); ?></a>
          </div><!-- /.widgets__actions -->
        <?php endif ?>
      </div><!-- /.widgets-primary -->
    </div><!-- /.container -->
</section><!-- /.section-/-ornament -->
