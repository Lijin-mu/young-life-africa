<?php
if ( ! $related_posts = get_sub_field( 'posts' ) ) {
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

<section class="section section--articles section--articles-alt" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container animated">
    <?php
    if ( $content = get_sub_field( 'content' ) ) {
      echo crb_content( $content );
    }
    ?>

    <div class="articles">
      <div class="row">
        <?php foreach ( $related_posts as $related_post_id ) : ?>
          <div class="col-sm-6 col-md-4 animated">
            <div class="article">
              <?php if ( has_post_thumbnail( $related_post_id ) ) : ?>
                <div class="article__image">
                  <a href="<?php the_permalink( $related_post_id ); ?>">
                    <?php echo get_the_post_thumbnail( $related_post_id, 'crb_img_box_image' ); ?>
                  </a>
                </div><!-- /.article__image -->
              <?php endif ?>

              <div class="article__content">
                <h6 class="article__meta"><?php the_time( 'F j, Y ' ); ?></h6><!-- /.article__meta -->

                <h3 class="article__title"><?php echo get_the_title( $related_post_id ) ?></h3>
                        <p><?php echo wp_trim_words( get_post_field('post_content', $related_post_id), $num_words = 20, $more = '' ); ?></p>
                <a href="<?php the_permalink( $related_post_id ); ?>" class="btn btn--border btn--border-dark article__btn"><?php _e( 'Read More', 'crb' ); ?></a>
              </div><!-- /.article__content -->
            </div><!-- /.widget -->
          </div><!-- /.col-md-4 -->
        <?php endforeach ?>
      </div><!-- /.row -->
    </div><!-- /.articles -->
  </div><!-- /.container -->
</section><!-- /.section -->
