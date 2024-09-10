<?php the_post(); ?>

<div class="main main--offset">
  <section class="section-alt section-alt--primary">
    <div class="container">
      <div class="row">
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="col-sm-6">
            <div class="section__media animated">
              <?php the_post_thumbnail( 'crb_story_large_img' ); ?>
            </div><!-- /.section__media -->
          </div><!-- /.col-sm-6 -->
        <?php endif ?>

        <div class="col-sm-6">
          <div class="section__content animated">
            <h3><?php the_title(); ?></h3>

            <?php if ( $position = get_field( 'position' ) ) : ?>
              <h6><?php echo esc_html( $position ); ?></h6>
            <?php endif ?>


            <ul class="list-features">
              <?php if ( $email = get_field( 'email' ) ) : ?>
                <?php $email_escaped = antispambot( sanitize_email( $email ) ); ?>
                <li><strong><?php _e( 'Email', 'crb' ); ?>:</strong>  <a href="mailto:<?php echo $email_escaped; ?>"><?php echo $email_escaped; ?></a></li>
              <?php endif ?>

              <?php if ( $phone = get_field( 'phone' ) ) : ?>
                <li><strong><?php _e( 'Phone', 'crb' ); ?>:</strong>  <a href="tel:<?php echo crb_filter_phone_number( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></li>
              <?php endif ?>
            </ul><!-- /.list-features -->

            <?php the_content(); ?>

              <?php if(get_field('show_social_sharing')) { ?>
                <div class="article__actions animated">
                  <p><?php _e( 'Share', 'crb' ); ?></p>
                    <div class="socials">
                      <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div><!-- /.article__actions -->
              <?php } ?>
          </div><!-- /.section__content -->
        </div><!-- /.col-sm-6 -->
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
