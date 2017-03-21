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


add_action( 'init', 'vainglory_shopitem' ); //アクションをフック

//フックされたアクション
function vainglory_shopitem() {
    $labels = array(
        "name" => "Home Product", //投稿タイプの一般名
        "singular_name" => "Home", //投稿タイプのオブジェクト 1 個の名前（単数形）
        "all_items" => "Home Product list",
        );

    $args = array(
        "label" => "Home Product",
        "labels" => $labels,
        "description" => "Show product in the home page.",
        "public" => true, //一般公開しない
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false, //タクソノミーをセットするのでfalse
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false, //固定ページではない
        "rewrite" => false,
        "query_var" => true,

        "supports" => array(
            "title",

        ),
    );

    register_post_type( "home", $args ); //カスタム投稿タイプの登録
}

function make_grid(){

    
    $product_meta = get_post_meta(get_the_ID());

    $product_id = $product_meta['product-url'][0];

    $url = get_permalink($product_id);
    $product = get_post_meta($product_id);
    
    echo "<div class='grid'>";
    echo get_post($product_id)->post_title;
    echo "<a href=$url style='display:block;'>";
    echo get_the_post_thumbnail($product_id);

    echo "</a></div>";

    return 0;
}

add_editor_style('editor-style.css'); 