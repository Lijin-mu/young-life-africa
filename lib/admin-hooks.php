<?php
add_filter( 'login_headertitle', 'crb_admin_change_login_headertitle' );
function crb_admin_change_login_headertitle() {
  return get_bloginfo( 'name' );
}

add_filter( 'login_headerurl', 'crb_admin_change_login_headerurl' );
function crb_admin_change_login_headerurl() {
  return home_url();
}

