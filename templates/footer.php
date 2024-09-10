<footer class="footer">
    <div class="footer__body">
        <div class="container">
            <div class="footer__content">
                <div class="row">
                    <div class="col-sm-10 col-md-6 centered animated">
                        <?php
                        if ( $footer_image = get_field( 'footer_image', 'option' ) ) {
                            echo wp_get_attachment_image( $footer_image, 'crb_footer_image', false, array(
                                'class' => 'footer__logo animated',
                            ) );
                        }
                        ?>

                        <?php if ( $title = get_field( 'footer_title', 'option' ) ) : ?>
                            <p><?php echo esc_html( $title ); ?></p>
                        <?php endif ?>

                        <?php if ( $subtitle = get_field( 'footer_subtitle', 'option' ) ) : ?>
                            <p><span><?php echo esc_html( $subtitle ); ?></span></p>
                        <?php endif ?>
                    </div><!-- /.col-sm-6 -->
                </div><!-- /.row -->
            </div><!-- /.footer__content -->

            <div class="footer__actions">
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="footer__actions-content animated">
                            <?php if ( $left_box_title = get_field( 'footer_left_box_title', 'option' ) ) : ?>
                                <h5 class="footer__title">
                                    <?php echo nl2br( esc_html( $left_box_title ) ); ?>
                                </h5><!-- /.footer__title -->
                            <?php endif ?>

                            <?php if ( $left_box_entries = get_field( 'footer_box_entries', 'option' ) ) : ?>
                                <?php foreach ( $left_box_entries as $entry ) : ?>
                                   <?php echo apply_filters( 'the_content', $entry['entry_content'] ); ?>
                                <?php endforeach ?>
                            <?php endif ?>

                            <?php crb_render_fragment( 'footer-socials' ); ?>
                        </div><!-- /.footer__actions -->
                    </div><!-- /.col-sm-4 -->

                    <?php
                    if ( $footer_menus = get_field( 'footer_menus', 'option' ) ) {
                        crb_render_fragment( 'footer-menus', array(
                            'menus' => $footer_menus,
                        ) );
                    }
                    ?>
                </div><!-- /.row -->
            </div><!-- /.footer__actions -->

            <div class="footer__body-bar">
                <p class="copyright">
                  &copy;

                  2004-<?php echo date( 'Y' ); ?>

                  <?php bloginfo( 'name' ); ?>.

                  <?php _e( 'All rights reserved', 'crb' ); ?>.
                </p><!-- /.copyright -->

                <p><?php _e( 'Site by', 'crb' ); ?> <a href="http://blvr.com/" target="_blank">BLVR</a></p>
            </div><!-- /.footer__content-bar -->
        </div><!-- /.container -->
    </div><!-- /.footer__body -->

    <?php if ( is_front_page() && ! isset( $_COOKIE['footer-bar'] ) && $footer_bar_text = get_field( 'footer_bar_text', 'option' ) ) : ?>
        <div class="footer__bar">
            <p>
                <?php if ( $footer_bar_url = get_field( 'footer_bar_url', 'option' ) ) : ?>
                    <a href="<?php echo esc_url( $footer_bar_url ); ?>">
                <?php endif ?>
                    <?php echo apply_filters( 'the_content', $footer_bar_text ); ?>
                <?php if ( $footer_bar_url ) : ?>
                    </a>
                <?php endif ?>
            </p>

            <a href="#" class="btn-close">
                x
            </a>
        </div><!-- /.footer__bar -->
    <?php endif ?>
</footer><!-- /.footer -->
