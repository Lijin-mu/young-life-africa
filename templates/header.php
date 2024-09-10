<?php
if ( is_home() || is_search() || is_archive() ) {
  $page_id = get_option( 'page_for_posts' );
} else {
  $page_id = get_the_ID();
}

$dark_header_class = '';
if ( is_404() || post_password_required() || is_search() || is_archive() || is_singular( 'crb_video' ) || is_singular( 'crb_staff' ) || get_field( 'show_intro', $page_id ) !== null && ! get_field( 'show_intro', $page_id ) || get_field( 'header_color_scheme', $page_id ) ) {
  $dark_header_class = 'header--dark';
}
?>

<header class="header <?php echo $dark_header_class; ?>">
    <div class="container-fluid">
        <a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>

        <a href="#" class="nav-btn js-burger-btn visible-xs-block"></a>

        <?php
        if ( has_nav_menu( 'primary_navigation' ) ) {
            wp_nav_menu( array(
                'theme_location'  => 'primary_navigation',
                'container'       => 'nav',
                'container_class' => 'nav',
            ) );
        }
        ?>

        <script>
            jQuery('<li><form id="menu-search" role="search" method="get" class="search-form" action="/"><label><input type="search" class="search-field" placeholder="Search" value="" name="s"></label><input type="submit" class="search-submit" value="Search"></form></li>').insertBefore('.btn-donate-menu');

            jQuery('#menu-search .search-submit').on('click', function (e) {
                if (!jQuery(this).is('.clicked')) {
                    e.preventDefault();
                    jQuery('body').addClass('body-search-open');
                    jQuery('.search-form').addClass('search-open');
                    jQuery(this).addClass('clicked');
                }
            });
        </script>

        <style>
            @media (max-width: 1250px) {
                .body-search-open .header .logo {
                    width: 0;
                }
            }
        </style>
    </div><!-- /.container-fluid -->
</header><!-- /.header -->
