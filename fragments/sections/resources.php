<?php
if ( ! $resources = get_sub_field( 'entries' ) ) {
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

<section class="section section--resources" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <?php if ( $title = get_sub_field( 'title' ) ) : ?>
      <h2 class="section__title animated"><?php echo esc_html( $title ); ?></h2>
    <?php endif ?>

    <div class="widgets-primary">
      <div class="row">
        <?php foreach ( $resources as $resource ) : ?>
          <div class="col-md-3 col-xs-6 animated">
            <div class="widget-primary">
              <?php
              if ( $resource['link_type'] === 'external' ) {
                $attr = 'target="_blank"';
              } else {
                $attr = 'download';
              }
              ?>

              <?php if ( ! empty( $resource['url'] ) || ( $resource['link_type'] === 'download' && !empty( $resource['file'] ) ) ) : ?>
                <a href="<?php echo ($resource['link_type'] === 'download') ? esc_url( $resource['file']['url'] ) : esc_url( $resource['url'] ); ?>" <?php echo $attr; ?>>
              <?php endif ?>
                <div class="widget__image">
                  <?php echo wp_get_attachment_image( $resource['image'], 'crb_resource_image' ); ?>
                </div><!-- /.widget__image -->

                <?php if ( ! empty( $resource['name'] ) ) : ?>
                  <div class="widget__content">
                    <h4><?php echo esc_html( $resource['name'] ); ?></h4>
                  </div><!-- /.widget__content -->
                <?php endif ?>
              <?php if ( ! empty( $resource['url'] ) || $resource['link_type'] === 'download' ) : ?>
                </a>
              <?php endif ?>
            </div><!-- /.employee -->
          </div><!-- /.col-sm-4 -->
        <?php endforeach ?>
      </div><!-- /.row -->
    </div><!-- /.employees -->
  </div><!-- /.container -->
</section><!-- /.section-/-ornament -->
