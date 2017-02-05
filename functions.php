<?php //子テーマで利用する関数を書く

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'home_product',
    array(
      'labels' => array(
        'name' => __( 'Home Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'supports' => [null],
      'has_archive' => true,
    )
  );
}