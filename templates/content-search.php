<div class="col-sm-6 col-md-4 eq-me">
  <div class="widget widget--alt">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="widget__image">
        <a href="<?php echo get_the_permalink(); ?>">
          <?php the_post_thumbnail( 'crb_member_image' ); ?>
        </a>
      </div><!-- /.widget__image -->
    <?php endif ?>

    <div class="widget__content">
      <h4><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <p><?php echo wp_trim_words( get_the_content(), $num_words = 20, $more = '… ' ); ?></p>
    </div><!-- /.widget__content -->
  </div><!-- /.widget -->
</div><!-- /.col-md-4 -->
