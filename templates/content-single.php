<?php the_post(); ?>

<div class="intro intro--article">
  <?php if ( has_post_thumbnail() ) : ?>
    <figure class="intro__image fullsize-image" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'crb_fullwidth_image' ) ?>);">
      <?php the_post_thumbnail( 'crb_fullwidth_image' ); ?>
    </figure><!-- /.intro__image -->
  <?php endif ?>

  <div class="intro__content intro__content--alt animated">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <div class="intro__content-inner">
            <h6 class="intro__meta"><?php the_time( 'F j, Y ' ); ?><span class="separator">|</span> <?php the_field('author_name'); ?></h6><!-- /.intro__meta -->

            <h1><?php the_title(); ?></h1>
          </div><!-- /.intro__content-inner -->
        </div><!-- /.col-sm-7 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.intro__content -->
</div><!-- /.intro -->

<div class="main">
  <section class="section section--article section-no-offset">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-11 centered">
          <article class="article-large">
            <div class="row">
              <div class="col-sm-11 col-md-9 centered">
                <div class="article__entry animated">
                  <?php the_content(); ?>
                </div><!-- /.article__entry -->
              </div><!-- /.col-sm-8 centered -->
            </div><!-- /.row -->

            <div class="row">
              <div class="col-sm-11 col-md-9 centered">
                <div class="article__actions animated">
                  <p><?php _e( 'Share', 'crb' ); ?></p>

                  <div class="socials socials--color">
                    <div class="sharethis-inline-share-buttons"></div>
                  </div>
                </div><!-- /.article__actions -->
              </div><!-- /.col-sm-12 -->
            </div><!-- /.row -->
          </article><!-- /.article-large -->
        </div><!-- /.col-sm-11 centered -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.section -->

  <?php if ( have_rows( 'sections' ) ) : ?>
    <?php while ( have_rows( 'sections' ) ) : the_row(); ?>
      <?php include( locate_template( 'fragments/sections/' . crb_change_underscores_with_hyphens( get_row_layout() ) . '.php' ) ); ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php crb_render_fragment( 'callout-form' ); ?>
</div><!-- /.main -->
