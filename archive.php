<div class="main main--offset">
  <section class="section <?php echo $additional_classes; ?>">
    <div class="container">
      <div class="section__content">
        <div class="row">
          <div class="col-sm-10 col-md-8 centered animated">
            <?php get_template_part('templates/page', 'header'); ?>
          </div><!-- /.col-sm-8 -->
        </div><!-- /.row -->
      </div><!-- /.section__content -->

      <?php if ( ! have_posts() ) : ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php endif; ?>

      <div class="widgets">
        <div class="row">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('templates/content', 'search'); ?>
          <?php endwhile; ?>
        </div><!-- /.row -->
      </div><!-- /.widgets -->
    </div><!-- /.container -->

    <?php get_template_part('templates/pagination'); ?>
  </section>

  <?php crb_render_fragment( 'callout-form' ); ?>
</div>
