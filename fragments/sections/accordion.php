<?php
if ( ! $elements = get_sub_field( 'elements' ) ) {
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

<div class="section section--accordion" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container animated">
    <?php
    if ( $top_content = get_sub_field( 'top_content' ) ) {
      echo crb_content( $top_content );
    }
    ?>

    <div class="section__body">
      <div class="panel-group section__pannel-group animated" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ( $elements as $key => $element ) : ?>
          <div class="panel panel-default <?php echo $key == 0 ? 'expanded' : ''; ?>">
            <div class="panel-heading" role="tab" id="heading<?php echo $key; ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" aria-expanded="true" aria-controls="collapse<?php echo $key; ?>"><?php echo esc_html( $element['title'] ); ?></a>
              </h4>
            </div>

            <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse <?php echo $key == 0 ? 'in' : ''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $key; ?>">
              <div class="panel-body">
                <p><?php echo ( $element['content'] ); ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div><!-- /.section__body -->
  </div><!-- /.container -->
</div>
