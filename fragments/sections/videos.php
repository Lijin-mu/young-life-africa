<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = get_sub_field( 'number_of_videos_per_page' );

if ( ! intval( $posts_per_page ) ) {
  $posts_per_page = 9;
}

$video_posts = new WP_Query( array(
  'post_type'      => 'crb_video',
  'posts_per_page' => $posts_per_page,
  'paged' => $paged,
) );

if ( ! $video_posts->have_posts() ) {
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

<section class="section section--articles" <?php echo $has_section_id ? $id_attr : ''; ?>>
  <div class="container">
    <?php
    if ( $content = get_sub_field( 'content' ) ) {
      echo crb_content( $content );
    }
    ?>

    <div class="articles">
      <div class="row">
        <?php while ( $video_posts->have_posts() ) : $video_posts->the_post(); ?>
          <div class="col-sm-6 col-md-4 animated">
            <div class="article">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="article__image">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'crb_img_box_image' ); ?>
                  </a>
                </div><!-- /.article__image -->
              <?php endif ?>

              <div class="article__content">
                <a href="<?php the_permalink(); ?>">
                <h3 class="article__title"><?php the_title(); ?></h3>
				</a>

                <?php if(has_excerpt()) {
                  the_excerpt();
                } else { ?>
                  <p><?php echo wp_trim_words( get_the_content(), 13, '' ) ?></p>
                <?php } ?>

                <a href="<?php the_permalink(); ?>" class="btn btn--border article__btn article__btn--large">
                  <?php _e( 'Watch Video', 'crb' ); ?>

                  <i class="ico-play-small-orange"></i>
                </a>
              </div><!-- /.article__content -->
            </div><!-- /.widget -->
          </div><!-- /.col-md-4 -->
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
      </div><!-- /.row -->

      <div class="row">
        <?php
        carbon_pagination( 'posts', array(
          'wrapper_before'         => '<div class="articles__actions animated">',
          'wrapper_after'          => '</div>',
          'prev_html'              => '<a href="{URL}">' . esc_html__( '<', 'crb' ) . '</a>',
          'next_html'              => '<a href="{URL}">' . esc_html__( '>', 'crb' ) . '</a>',
          'numbers_wrapper_before' => '<ul class="list-pages">',
          'numbers_wrapper_after'  => '</ul>',
          'enable_prev'            => false,
          'enable_next'            => false,
          'enable_numbers'         => true,
          'enable_prev'            => true,
          'enable_next'            => true,
          'number_limit'           => 5,
          'current_page'           => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
          'total_pages'            => $video_posts->max_num_pages,
        ) );
        ?>
      </div><!-- /.row -->
    </div><!-- /.articles -->
  </div><!-- /.container -->
</section><!-- /.section -->
