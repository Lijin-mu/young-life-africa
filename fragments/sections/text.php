<?php
if ( ! $entries = get_sub_field( 'entries' ) ) {
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

$width = get_sub_field('full_width');

if($width) {
    echo 'true';
}
?>

<section class="section section--disclaimer" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <div class="row">
      <div class="col-sm-10 centered">
        <div class="section__content">
          <?php if ( $title = get_sub_field( 'title' ) ) : ?>
            <h2 class="section__title animated"><?php echo esc_html( $title ); ?></h2><!-- /.section__title -->
          <?php endif ?>

          <div class="section__content animated">
            <?php foreach ( $entries as $entry ) : ?>
              <div class="section__entry">
                <?php
                if ( ! empty( $entry['content'] ) ) {
                  echo crb_content( $entry['content'] );
                }
                ?>
              </div><!-- /.section__entry -->
            <?php endforeach ?>
          </div><!-- /.section__content -->
        </div><!-- /.section__content -->
      </div><!-- /.col-sm-6 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.section -->
