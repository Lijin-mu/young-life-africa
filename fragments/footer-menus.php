<div class="col-sm-7 col-md-8">
    <div class="footer__actions-aside animated">
        <div class="row">
            <?php foreach ( $menus as $menu ) : ?>
                <div class="col-sm-6 col-md-3">
                    <div class="footer__nav">
                        <?php if ( ! empty( $menu['title'] ) ) : ?>
                            <h5 class="footer__title"><?php echo esc_html( $menu['title'] ); ?></h5><!-- /.footer__title -->
                        <?php endif ?>

                        <?php wp_nav_menu( array( 'menu' => $menu['menu'] ) ); ?>
                    </div><!-- /.footer__nav -->
                </div><!-- /.col-md-2 -->
            <?php endforeach ?>
        </div><!-- /.row -->
    </div><!-- /.footer__actions-aside -->
</div><!-- /.col-sm-8 -->
