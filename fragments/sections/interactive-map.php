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

<section class="section section--interactive" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="section__group">
    <div class="container">
      <?php if ( $content = get_sub_field( 'content' ) ) : ?>
        <div class="section__content">
          <div class="row">
            <div class="col-sm-10 col-md-8 centered animated">
              <?php echo crb_content( $content ); ?>
            </div><!-- /.col-sm-8 centered -->
          </div><!-- /.row -->
        </div><!-- /.section__content -->
      <?php endif ?>

      <div class="section__body">
        <div class="widget-detailed">
          <div class="row">
            <?php if ($map = get_sub_field('map')) : ?>
              <?php echo $map; ?>
            <?php endif ?>
          </div><!-- /.row -->
        </div><!-- /.widget-detailed -->
      </div><!-- /.section__body -->
    </div><!-- /.container -->
  </div><!-- /.section__group -->
</section>
