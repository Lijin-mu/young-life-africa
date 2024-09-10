<div class="row">
   <?php
  carbon_pagination( 'posts', array(
    'wrapper_before'         => '<div class="articles__actions animated">',
    'wrapper_after'          => '</div>',
    'prev_html'              => '<a href="{URL}">' . esc_html__( '<', 'crb' ) . '</a>',
    'next_html'              => '<a href="{URL}">' . esc_html__( '>', 'crb' ) . '</a>',
    'numbers_wrapper_before' => '<ul class="list-pages">',
    'numbers_wrapper_after'  => '</ul>',
    'enable_prev'            => false,
    'enable_next'            => false,
    'enable_numbers'         => true,
    'enable_prev'            => true,
    'enable_next'            => true,
    'number_limit'           => 5,
  ) );
  ?>
</div><!-- /.row -->
