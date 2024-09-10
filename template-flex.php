<?php
/**
 * Template Name: Flex Template
 */

$rando = get_field('randomizer', 110);
?>

<?php
if(post_password_required()){
  echo '<div class="pw-page">';
  the_content();
  echo '</div>'; ?>
    <style>
        .footer__content {
            display: none;
        }
    </style>
  <?php
} else {
 if(is_front_page()) { ?>
  <?php crb_render_fragment( 'introrando.php' ); ?>
<?php } else { ?>
  <?php crb_render_fragment( 'intro' ); ?>
<?php } ?>

<?php if ( have_rows( 'sections' ) ) : ?>
  <?php while ( have_rows( 'sections' ) ) : the_row(); ?>
    <?php include( locate_template( 'fragments/sections/' . crb_change_underscores_with_hyphens( get_row_layout() ) . '.php' ) ); ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php crb_render_fragment( 'callout-form' );
}
?>
