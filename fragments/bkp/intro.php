<?php
global $post;
$page_id = $post->ID;

if ( is_home() || is_search() || is_archive() ) {
    $page_id = get_option( 'page_for_posts' );
}

if ( ! get_field( 'show_intro', $page_id ) ) {
  return;
}

$image = get_field( 'intro_image', $page_id );
$title = get_field( 'intro_title', $page_id );
$subtitle = get_field( 'intro_subtitle', $page_id );
$buttons = get_field( 'intro_buttons', $page_id );
$additional_content_classes = get_field( 'content_width', $page_id );
$additional_intro_classes = get_field( 'dynamic_intro_size', $page_id ) ? '' : 'intro--primary intro--tall';
$mp4_link = get_field('mp4_link', $page_id);
$video_intro = get_field('video_intro', $page_id);
?>

<?php if($video_intro) { ?>

    <div class="intro-video">
        <video loop autoplay muted>
            <source src="<?php echo $mp4_link; ?>" type="video/mp4">
        </video>

        <div class="intro__content">
            <div class="container">
                <div class="row">
                    <div class="<?php echo $additional_content_classes; ?>">
                        <div class="intro__content-inner animated">
                            <?php if ( $subtitle ) : ?>
                                <h6><?php echo esc_html( $subtitle ); ?></h6>
                            <?php endif ?>

                            <?php if ( $title ) : ?>
                                <h1><?php echo esc_html( $title ); ?></h1>
                            <?php endif ?>

                            <?php if ( $buttons ) : ?>
                                <div class="intro__actions">
                                    <?php foreach ( $buttons as $button ) : ?>
                                        <?php if ( $button['type'] === 'link' ) : ?>
                                            <a href="<?php echo esc_url( $button['url'] ); ?>" class="link" target="<?php echo $button['target']; ?>"><?php echo esc_html( $button['label'] ); ?></a>
                                        <?php elseif ( $button['type'] === 'button' ) : ?>
                                            <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn--alt" target="<?php echo $button['target']; ?>">
                                                <?php echo esc_html( $button['label'] ); ?>
                                            </a>
                                        <?php elseif ( $button['type'] === 'plus' ) : ?>
                                            <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo $button['target']; ?>" class="btn">
                                                <i class="ico-plus"></i><?php echo esc_html( $button['label'] ); ?>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url( $button['video_link'] ); ?>" class="btn btn--medium js-video-popup video" target="<?php echo $button['target']; ?>">
                                                <?php echo esc_html( $button['label'] ); ?>

                                                <i class="ico-play-small"></i>
                                            </a>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div><!-- /.intro__actions -->
                            <?php endif ?>
                        </div><!-- /.intro__content-inner -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.intro__content -->
    </div>

    <style>
        .intro-video {
            margin: 0 -40px;
            display: none;
            max-height: 600px;
        }

        .intro-video video {
            width: 100%;
            height: auto;
            display: block;
        }

        @media (min-width: 150px) {
            .intro-video {
                display: block;
            }

            .intro {
                display: none;
            }
        }
    </style>

<?php } ?>

<div class="intro <?php echo $additional_intro_classes; ?>">
  <figure class="intro__image fullsize-image" style="background-image: url(<?php echo wp_get_attachment_image_url( $image, 'banner_size' ); ?>)">
    <?php
    echo wp_get_attachment_image( $image, 'crb_fullwidth_image' );
    ?>
  </figure><!-- /.intro__image -->

  <div class="intro__content">
    <div class="container">
      <div class="row">
        <div class="<?php echo $additional_content_classes; ?>">
          <div class="intro__content-inner animated">
            <?php if ( $subtitle ) : ?>
              <h6><?php echo esc_html( $subtitle ); ?></h6>
            <?php endif ?>

            <?php if ( $title ) : ?>
              <h1><?php echo esc_html( $title ); ?></h1>
            <?php endif ?>

            <?php if ( $buttons ) : ?>
              <div class="intro__actions">
                <?php foreach ( $buttons as $button ) : ?>
                  <?php if ( $button['type'] === 'link' ) : ?>
                    <a href="<?php echo esc_url( $button['url'] ); ?>" class="link" target="<?php echo $button['target']; ?>"><?php echo esc_html( $button['label'] ); ?></a>
                  <?php elseif ( $button['type'] === 'button' ) : ?>
                    <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn--alt" target="<?php echo $button['target']; ?>">
                      <?php echo esc_html( $button['label'] ); ?>
                    </a>
                  <?php elseif ( $button['type'] === 'plus' ) : ?>
                    <a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo $button['target']; ?>" class="btn">
                      <i class="ico-plus"></i><?php echo esc_html( $button['label'] ); ?>
                    </a>
                  <?php else : ?>
                    <a href="<?php echo esc_url( $button['video_link'] ); ?>" class="btn btn--medium js-video-popup video" target="<?php echo $button['target']; ?>">
                      <?php echo esc_html( $button['label'] ); ?>

                      <i class="ico-play-small"></i>
                    </a>
                  <?php endif ?>
                <?php endforeach ?>
              </div><!-- /.intro__actions -->
            <?php endif ?>
          </div><!-- /.intro__content-inner -->
        </div><!-- /.col-sm-7 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.intro__content -->
</div><!-- /.intro -->