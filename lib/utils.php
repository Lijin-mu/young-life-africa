<?php
function crb_change_underscores_with_hyphens( $string ) {
  return str_replace( '_', '-', $string );
}

function crb_replace_asterisks_with_span_tag( $text ) {
  return preg_replace( '~\*(.+)\*~', '<span>$1</span>', $text );
}

add_action( 'admin_head', 'crb_hide_editor_from_flex_template' );
function crb_hide_editor_from_flex_template() {
  $template_file = basename( get_page_template() );

  if( $template_file == 'template-flex.php' ){
    remove_post_type_support( 'page', 'editor' );
  }
}

function crb_filter_phone_number( $number ) {
  return preg_replace( '~[^0-9]~', '', $number );
}
