<?php
add_shortcode( 'year', 'crb_shortcode_year' );
function crb_shortcode_year() {
    return date( 'Y' );
}

/**
 * Button Shortcode
 */
add_shortcode( 'button', 'crb_shortcode_button' );
function crb_shortcode_button( $atts, $content ) {
  $atts = shortcode_atts(
    array(
      'link' => '',
      'text' => __( 'Click here', 'crb' ),
  ),
    $atts, 'button'
);

  if ( empty( $atts['link'] ) || empty( $atts['text'] ) ) {
      return;
  }

  ob_start();
  ?><a href="<?php echo esc_url( $atts['link'] ); ?>"><?php echo esc_html( $atts['text'] ); ?></a><?php
$html = ob_get_clean();

return $html;
}

/**
 * Plus Icon Shortcode
 */
add_shortcode( 'plus-icon', 'crb_shortcode_plus_icon' );
function crb_shortcode_plus_icon( $atts, $content ) {
    ob_start();
    ?><i class="ico-plus"></i><?php
    $html = ob_get_clean();

    return $html;
}

/**
 * Logo Shortcode
 */
add_shortcode( 'logo', 'crb_shortcode_logo' );
function crb_shortcode_logo( $atts, $content ) {
  $atts = shortcode_atts(
      array(
        'color' => '',
    ),
      $atts, 'logo'
  );

  $class = $atts['color'] === 'white' ? 'ico-logo-white' : 'ico-logo';

  ob_start();
  ?><i class="<?php echo $class; ?>"></i><?php
  $html = ob_get_clean();

  return $html;
}


/**
 * Phone Shortcode
 */
add_shortcode( 'phone', 'crb_shortcode_phone' );
function crb_shortcode_phone( $atts, $content ) {
  $atts = shortcode_atts(
      array(
        'number' => '',
    ),
      $atts, 'logo'
  );

  if ( empty( $atts['number'] ) ) {
    return;
  }

  ob_start();
  ?><a href="tel:<?php echo crb_filter_phone_number( $atts['number'] ); ?>"><?php echo esc_html( $atts['number'] ); ?></a></i><?php
  $html = ob_get_clean();

  return $html;
}