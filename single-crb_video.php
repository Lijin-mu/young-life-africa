<?php the_post(); ?>

<div class="main">
  <section class="section section--article section--article-primary section-no-offset">
    <div class="container">
      <article class="article-large article-large--alt">
        <?php if ( $video_url = get_field( 'video_url' ) ) : ?>
          <div class="row">
            <div class="col-sm-12">
              <?php if ( has_post_thumbnail() ) : ?>
                <figure class="article__media animated">
                  <a href="#" class="video js-video-inline-single">
                    <span class="video__inner">
                      <?php the_post_thumbnail( 'crb_video_large_img' ); ?>

                      <i class="ico-play"></i>
                    </span>

                   <div class="video__content no-padding">
                    <?php
                    $video = Carbon_Video::create( $video_url );
                    $video->set_param('rel', '0');
                    ?>
                  </div>

                    <div class="video__content rel-after">
                      <?php echo $video->get_embed_code( 640, 360 ); ?>
                    </div>
                  </a>
                </figure><!-- /.article__image -->
              <?php endif ?>
            </div><!-- /.col-sm-12 -->
          </div><!-- /.row -->
        <?php endif ?>

        <div class="row">
          <div class="col-sm-10 centered">
            <div class="article__entry animated">
              <h6 class="article__meta"><?php the_time( 'F j, Y ' ); ?></h6><!-- /.article__meta -->

              <h3 class="article__title"><?php the_title(); ?></h3><!-- /.article__title -->

              <?php the_content(); ?>
            </div><!-- /.article__entry -->
          </div><!-- /.col-sm-8 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-sm-10 centered">
            <div class="article__actions animated">
              <p><?php _e( 'Share', 'crb' ); ?></p>

              <div class="socials socials--color">
                <div class="sharethis-inline-share-buttons"></div>
              </div>
            </div><!-- /.article__actions -->
          </div><!-- /.col-sm-12 -->
        </div><!-- /.row -->
      </article><!-- /.article-large -->
    </div><!-- /.container -->
  </section><!-- /.section -->

<?php if ( have_rows( 'sections' ) ) : ?>
  <?php while ( have_rows( 'sections' ) ) : the_row(); ?>
    <?php include( locate_template( 'fragments/sections/' . crb_change_underscores_with_hyphens( get_row_layout() ) . '.php' ) ); ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php crb_render_fragment( 'callout-form' ); ?>
