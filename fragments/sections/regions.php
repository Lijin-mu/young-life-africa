<?php
$args = array(
  'post_type' => 'crb_region',
  'posts_per_page' => -1,
);

$values = crb_request_param('regions');

if ( ! empty( $values ) ) {
  $args['post_name__in'] = $values;
}

$regions_posts = new WP_Query( $args );

if ( ! $regions_posts->have_posts() ) {
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

<section class="section section--boxes section--boxes-alt" <?php echo $has_section_id ? $id_attr : ''; ?>>
    <?php if ( get_sub_field( 'show' ) === 'regions_and_camps' ) : ?>

    <div class="section__entry">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 centered">
            <?php
            if ( $content = get_sub_field( 'content' ) ) {
              echo crb_content( $content );
            }
            ?>

            <div class="section__content">
              <div class="section__content-group animated">
                <h5><?php _e( 'Choose your region', 'crb' ); ?></h5>

                <ul class="list-checkboxes list-regions">
                  <?php $regions_index = 1; ?>

                  <?php while ( $regions_posts->have_posts() ) : $regions_posts->the_post(); ?>
                    <li>
                      <div class="checkbox">
                        <input type="checkbox" name="field-<?php echo $regions_index; ?>" id="field-<?php echo $regions_index; ?>" data-region="<?php echo $post->post_name; ?>">

                        <label class="form__label" for="field-<?php echo $regions_index; ?>"><?php the_title(); ?></label>
                      </div><!-- /.checkbox -->
                    </li>

                    <?php $regions_index++; ?>
                  <?php endwhile; ?>
                </ul><!-- /.list-checkboxes -->
              </div><!-- /.section__content-group -->

              <div class="section__content-group list-camps-results animated hidden">
                <h5><?php _e( 'Choose your camp', 'crb' ); ?></h5>

                <ul class="list-block list-camps">
                  <?php while ( $regions_posts->have_posts() ) : $regions_posts->the_post(); ?>
                    <?php $camps = get_field( 'camps' ); ?>

                    <?php $i = 1; foreach ( $camps as $camp ) : ?>
                      <li data-region="<?php echo $post->post_name; ?>">
                        <?php if ( ! empty( $camp['url_link'] ) ) : ?>
                          <a id="<?php echo sanitize_title($post->post_name) . "-" . $i; ?>" href="<?php echo esc_url( $camp['url_link'] ); ?>" target="_blank">
                        <?php endif ?>
                          <?php echo esc_html( $camp['name'] ); ?>
                        <?php if ( ! empty( $camp['url_link'] ) ) : ?>
                          </a>
                        <?php endif ?>
                      </li>
                    <?php $i++; endforeach ?>
                  <?php endwhile; ?>

                  <?php wp_reset_postdata(); ?>
                </ul><!-- /.list-block -->
              </div><!-- /.section__content-group -->
            </div><!-- /.section__content -->
          </div><!-- /.col-sm-7 centered -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section__entry -->
  <?php else : ?>
    <div class="section__entry">
      <header class="section__head">
        <?php
        if ( $content = get_sub_field( 'content' ) ) {
          echo crb_content( $content );
        }
        ?>
      </header><!-- /.section__head -->

      <div class="container">
        <ul class="list-boxes">
          <?php while ( $regions_posts->have_posts() ) : $regions_posts->the_post(); ?>
            <li class="animated">
              <h5>
                <?php if ( $link = get_field( 'url_link' ) ) : ?>
                  <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                <?php endif ?>
                  <?php the_title(); ?>
                <?php if ( $link ) : ?>
                  </a>
                <?php endif ?>
              </h5>
            </li>
          <?php endwhile; ?>

          <?php wp_reset_postdata(); ?>
        </ul><!-- /.list-boxes -->
      </div><!-- /.container -->
    </div><!-- /.section__entry -->
  <?php endif ?>
</section>
