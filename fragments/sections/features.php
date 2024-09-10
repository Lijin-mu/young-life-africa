<?php
if ( ! $features = get_sub_field( 'features' ) ) {
  return;
}

$container_additional_class = get_sub_field( 'is_dark_background' ) ? 'section--dark' : '';

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
  $escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

  if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
    $has_section_id = true;
    $id_attr = 'id="' . $escaped_id . '"';
  }
}
?>

<div class="section section--features <?php echo $container_additional_class; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <?php if ( $title = get_sub_field( 'title' ) ) : ?>
      <h2 class="section__title animated"><?php echo esc_html( $title ); ?></h2><!-- /.section__title -->
    <?php endif ?>

    <ul class="list-statistics">
      <?php foreach ( $features as $feature ) : ?>
        <li class="animated">
          <?php
          if ( ! empty( $feature['icon'] ) ) {
            echo wp_get_attachment_image( $feature['icon'], 'crb_feature_icon' );
          }
          ?>

          <?php if ( ! empty( $feature['title'] ) ) : ?>
            <h4><?php echo esc_html( $feature['title'] ); ?></h4>
          <?php endif ?>

          <?php if ( ! empty( $feature['content'] ) ) : ?>
            <p><?php echo nl2br( esc_html( $feature['content'] ) ); ?></p>
          <?php endif ?>
        </li>
      <?php endforeach ?>
    </ul><!-- /.list-statistics -->
  </div><!-- /.container -->
</div><!-- /.section section-/-dark -->
