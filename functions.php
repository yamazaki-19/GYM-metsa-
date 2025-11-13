<?php

// JS・CSSファイルを読み込む
function add_files()
{
	//キャッシュ無効（開発時はこちらをコメント解除）
	// $cache = date('YmdHis');
	//キャッシュ有効（公開後はこちらをコメント解除）
	$cache = 1.0;

	// WordPress提供のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	// jQueryの読み込み
	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', "", $cache, false);

  // Swiper読み込み（CSS、JS）
	// Swiper CSS
	wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
	// Swiper JavaScript
	wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), false, true);

	// サイト共通（CSS、JS）
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', "", $cache);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array('swiper-js'), $cache, true);
}
add_action('wp_enqueue_scripts', 'add_files');

/**
 * カスタム投稿タイプ 'news' のパーマリンクを /news/投稿ID/ に変更する
 */
function custom_news_permalink($post_link, $post)
{
	if ($post->post_type === 'news') {
		return home_url('/news/' . $post->ID . '/');
	}
	return $post_link;
}
add_filter('post_type_link', 'custom_news_permalink', 10, 2);

/**
 * /news/投稿ID/ のリライトルールを追加する
 */
function custom_news_rewrite_rule()
{
	add_rewrite_rule('news/([0-9]+)/?$', 'index.php?post_type=news&p=$matches[1]', 'top');
}
add_action('init', 'custom_news_rewrite_rule');
// カスタム投稿タイプのURLをIDに変更する関数
function customize_post_permalink($post_link, $post) {
    // もし投稿が 'news' または 'catalog' のカスタム投稿タイプならば
	if ($post->post_type == 'news' || $post->post_type == 'catalog') {
        // 新しいURL構造を返します。例：yourwebsite.com/news/123
		return home_url($post->post_type . '/' . $post->ID . '/');
	} else {
        // それ以外の場合は、元のURL構造をそのまま返します。
		return $post_link;
	}
}
// 'post_type_link' フィルターに関数を追加します。これにより、指定した投稿タイプのURLが生成されるときにこの関数が呼び出されます。
add_filter('post_type_link', 'customize_post_permalink', 1, 2);

// 新しいリライトルールを追加する関数
function custom_post_rewrite_rules() {
    // 'news' と 'catalog' の各カスタム投稿タイプに対してリライトルールを追加します。
    // これにより、yourwebsite.com/news/123 のようなURLにアクセスしたときに、適切な投稿を表示できるようになります。
    add_rewrite_rule(
        'news/([0-9]+)/?$',
        'index.php?post_type=news&p=$matches[1]',
        'top'
    );
    add_rewrite_rule(
        'catalog/([0-9]+)/?$',
        'index.php?post_type=catalog&p=$matches[1]',
        'top'
    );
}
// 'init' アクションに関数を追加します。WordPressが初期化されるときに、これらのリライトルールを設定します。
add_action('init', 'custom_post_rewrite_rules');