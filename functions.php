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