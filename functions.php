<?php

// JS・CSSファイルを読み込む
function add_files()
{
	// サイト共通（CSS、JS）
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', '', 1.0);
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', '', 1.0, true);
}
add_action('wp_enqueue_scripts', 'add_files');