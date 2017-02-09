<?php //子テーマで利用する関数を書く

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

// child-pages-shortcodeのカスタマイズ、padding-top付与
add_filter("child-pages-shortcode-template", "my_filter");
function my_filter($template) {
    // do something
    $template = <<< EOF
    <div id="child_page-%post_id%" class="child_page" style="width:%width%;">
    <div class="child_page-container">
        <div class="post_thumb"><a href="%post_url%">%post_thumb%</a></div>
        <div class="post_content" style="padding-top:15px;">
            <h4><a href="%post_url%">%post_title%</a></h4>
            <div class="post_excerpt">%post_excerpt%</div>
        </div>
    </div>
</div>
EOF;
    return $template;
}

