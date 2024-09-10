<?php
if ( ! $table = get_sub_field( 'content' ) ) {
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

<section class="section section--table" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <?php if ( $title = get_sub_field( 'title' ) ) : ?>
      <h2 class="section__title animated"><?php echo esc_html( $title ); ?></h2><!-- /.section__title -->
    <?php endif ?>

    <div class="section__body">
      <div class="table animated">
        <?php echo crb_content( $table ); ?>
      </div><!-- /.table -->
    </div><!-- /.section__body -->
  </div><!-- /.container -->
</section><!-- /.section -->
