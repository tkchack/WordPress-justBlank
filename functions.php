<?php
/**
 * Just blank
 * @license: WTFPL
 */

/*#########################################################

基本設定

#########################################################*/

// WordPressのバージョンを非表示
remove_action('wp_head','wp_generator');
// 記事の自動整形を無効化
remove_filter('the_content', 'wpautop');
// 抜粋の自動整形を無効化
remove_filter('the_excerpt', 'wpautop');

// 絵文字削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');

// フィードのlink要素を自動出力する
add_theme_support( 'automatic-feed-links' );

// 投稿ページにてアイキャッチ画像の欄を表示
add_theme_support( 'post-thumbnails' );

//管理画面以外でJSやCSSを読み込む
if (!is_admin()) {
    function my_scripts() {
    //テンプレートディレクトリのパス
    $dir = get_template_directory_uri();
    //CSS
    wp_enqueue_style( 'style', get_stylesheet_uri());
    //JS
    wp_enqueue_script( 'plugins', $dir . '/assets/js/sample.js', array('jquery'), '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts', 'my_scripts' );
}