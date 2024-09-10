<?php
$is_all_checked = get_sub_field( 'all_stories' );
if ( ! $is_all_checked && ! $related_stories = get_sub_field( 'select_stories' ) ) {
  return;
}

if ( $is_all_checked ) {
  $stories_query = new WP_Query( array(
    'post_type' => 'crb_story',
    'posts_per_page' => -1,
  ));

  if ( ! $stories_query->have_posts() ) {
    return;
  }
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
          <?php if ( $is_all_checked ) : ?>
            <?php while ( $stories_query->have_posts() ) : $stories_query->the_post(); ?>
              <div class="col-md-4 col-sm-6 eq-me">
                <div class="widget-primary">
                  <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <div class="widget__image">
                        <?php the_post_thumbnail( 'crb_member_image' ); ?>
                      </div><!-- /.widget__image -->
                    <?php endif ?>

                    <div class="widget__content">
                      <h4><?php the_title(); ?></h4>

                      <?php if ( get_sub_field( 'show_country' ) && ! empty( get_the_terms( get_the_ID(), 'crb_countries' ) ) ) : ?>
                        <?php $country = get_the_terms( get_the_ID(), 'crb_countries' )[0]->name; ?>

                        <p><?php echo esc_html( $country ); ?></p>
                      <?php endif ?>
                    </div><!-- /.widget__content -->
                  </a>
                </div><!-- /.employee -->
              </div><!-- /.col-sm-4 -->
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <?php foreach ( $related_stories as $story_id ) : ?>
              <div class="col-md-4 col-sm-6 animated">
                <div class="widget-primary">
                  <a href="<?php echo get_the_permalink( $story_id ); ?>">
                    <?php if ( has_post_thumbnail( $story_id ) ) : ?>
                      <div class="widget__image">
                        <?php echo get_the_post_thumbnail( $story_id, 'crb_member_image' ); ?>
                      </div><!-- /.widget__image -->
                    <?php endif ?>

                    <div class="widget__content">
                      <h4><?php echo get_the_title( $story_id ); ?></h4>

                      <?php if ( get_sub_field( 'show_country' ) && ! empty( get_the_terms( get_the_ID(), 'crb_countries' ) ) ) : ?>
                        <?php $country = get_the_terms( get_the_ID(), 'crb_countries' )[0]->name; ?>

                        <p><?php echo esc_html( $country ); ?></p>
                      <?php endif ?>
                    </div><!-- /.widget__content -->
                  </a>
                </div><!-- /.employee -->
              </div><!-- /.col-sm-4 -->
            <?php endforeach ?>
          <?php endif ?>
        </div><!-- /.row -->
      </div><!-- /.widgets-primary -->
    </div><!-- /.container -->
</section><!-- /.section-/-ornament -->
