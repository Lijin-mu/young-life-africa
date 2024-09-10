<?php
$facebook_link = get_field( 'facebook', 'option' );
$instagram_link = get_field( 'instagram', 'option' );
$twitter_link = get_field( 'twitter', 'option' );

if ( ! $facebook_link && ! $instagram_link && ! $twitter_link) {
    return;
}
?>

<div class="socials">
    <ul>
        <?php if ( $facebook_link ) : ?>
            <li>
                <a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif ?>

        <?php if ( $instagram_link ) : ?>
            <li>
                <a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif ?>

        <?php if ( $twitter_link ) : ?>
            <li>
                <a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
        <?php endif ?>
    </ul>
</div><!-- /.socials -->
