<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

if ( ! $post_num = get_sub_field( 'posts_num' ) ) {
  $post_num = get_option( 'posts_per_page' );
}

$posts_query = new WP_Query( array(
  'post_type' => 'post',
  'posts_per_page' => $post_num,
  'paged' => $paged,
) );

if ( ! $posts_query->have_posts() ) {
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
    <div class="articles">
      <div class="row">
        <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
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
                <h6 class="article__meta"><?php the_time( 'F j, Y ' ); ?></h6><!-- /.article__meta -->

                <h3 class="article__title"><?php the_title(); ?></h3>
                  <p><?php echo wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ) ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn--border btn--border-dark article__btn">Read More</a>
              </div><!-- /.article__content -->
            </div><!-- /.widget -->
          </div><!-- /.col-md-4 -->
        <?php endwhile; ?>
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
          'total_pages'            => $posts_query->max_num_pages,
        ) );
        ?>
      </div><!-- /.row -->
    </div><!-- /.articles -->
  </div><!-- /.container -->
</section><!-- /.section -->
