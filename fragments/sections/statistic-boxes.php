<?php
if ( ! $boxes = get_sub_field( 'boxes' ) ) {
	return;
}

$additional_class = get_sub_field( 'dark_background' ) ? 'section--dark' : '';

$has_section_id = false;
if ( $section_id = get_sub_field( 'section_id_number' ) ) {
	$escaped_id = intval( crb_filter_phone_number( get_sub_field( 'section_id_number' ) ) );

	if ( isset( $escaped_id ) && $escaped_id !== 0 ) {
		$has_section_id = true;
		$id_attr = 'id="' . $escaped_id . '"';
	}
}
?>

<section class="section section--large <?php echo $additional_class; ?>" <?php echo $has_section_id ? $id_attr : ''; ?>>
		<div class="container">
				<div class="section__group">
						<div class="col-sm-12 centered">
								<div class="section__content">
									<div class="row ">
										<div class="col-sm-10 centered animated">
											<?php
												if ( $top_content = get_sub_field( 'top_content' ) ) {
													echo crb_content( $top_content );
												}
											?>
										</div><!-- /.col-sm-10 centered -->
									</div><!-- /.row  -->
								</div><!-- /.section__content -->

								<ul class="list-statistics list-statistics--alt">
									<?php foreach ( $boxes as $box ) : ?>
										<li class="animated">
											<?php if ( ! empty( $box['title'] ) ) : ?>
												<h3>
													<span
														<?php if ( is_numeric( $box['title'] ) ) : ?>
															data-number="<?php echo esc_html( $box['title'] ); ?>"
														<?php endif; ?>
													>

													</span>

													<?php
													if ( ! empty( $box['units'] ) ) {
														echo $box['units'];
													}
													?>
												</h3>
											<?php endif ?>

											<?php
											if ( ! empty( $box['content'] ) ) {
												echo nl2br( esc_html( $box['content'] ) );
											}
											?>
										</li>
									<?php endforeach ?>
								</ul>

								<?php if ( $bottom_content = get_sub_field( 'bottom_content' ) ) : ?>
									<div class="section__content animated">
											<div class="row ">
													<div class="col-sm-10 centered">
															<?php echo crb_content( $bottom_content ); ?>
													</div><!-- /.col-sm-10 centered -->
											</div><!-- /.row  -->
									</div><!-- /.section__content -->
								<?php endif ?>

								<?php if ( $buttons = get_sub_field( 'buttons' ) ) : ?>
									<div class="section__actions animated">

										<?php foreach ( $buttons as $button ) : ?>
												<?php if ( ! empty( $button['button_label'] ) && ! empty( $button['button_url'] ) ) : ?>
													<?php
													if ( $button['type'] === 'link' ) {
														$href_classes = 'link';
													} else {
														$href_classes = 'btn ';
														if ( $button['size'] !== 'normal' ) {
															$href_classes .= $button['size'] === 'large' ? 'btn--large ' : 'btn--wider ';
															$href_classes .= $button['style'] === 'solid' ? 'section__btn ' : 'btn--border ';
														}
													}
													?>

														<a href="<?php echo esc_url( $button['button_url'] ); ?>" class="<?php echo $href_classes; ?>" target="<?php echo $button['target']; ?>">
															<?php if ( $button['type'] === 'plus' ) : ?>
																<?php
																$btn_classes = 'ico-plus';
																$btn_classes .= $button['style'] === 'outlined' ? '-orange' : '';
																$btn_classes .= $button['size'] === 'large' ? '-large' : '';
																?>
																<i class="<?php echo $btn_classes; ?>"></i>
															<?php endif ?>

															<?php echo esc_html( $button['button_label'] ); ?>
														</a>
												<?php endif ?>
										<?php endforeach ?>
									</div><!-- /.section__actions -->
								<?php endif ?>
						</div><!-- /.col-sm-10 -->
				</div><!-- /.section__group -->
		</div><!-- /.container -->
</section><!-- /.section section-/-large -->
