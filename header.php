	<!DOCTYPE html>
	<html lang="ja" prefix="og: http://ogp.me/ns#">

	<head>
		<meta charset="UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Galdeano&family=Noto+Sans+JP:wght@400;700&Lora:wght@700&family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<header class="header">
			<div class="header_inner">
				<div class="header_logo">
					<a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/image/logo.svg" alt="ロゴ" class="header_logo_image" width="" height="">
					</a>
				</div>

				<nav class="header_nav">
					<ul class="header_nav_list">
						<li class="header_nav_item">
							<a class="header_nav_link " href="<?= home_url(); ?>/catalog">商品一覧</a>
						</li>
						<li class="header_nav_item">
							<a class="header_nav_link " href="<?= home_url(); ?>/news">お知らせ</a>
						</li>
						<li class="header_nav_item">
							<a class="header_nav_link " href="<?= home_url(); ?>/contact">お問い合わせ</a>
						</li>
					</ul>
				</nav>


				<button class="nav_button pc_none">
					<img src="<?= get_template_directory_uri(); ?>/image/nav_button.svg" alt="メニューを開く" width="" height="" class="nav_open">
					<img src="<?= get_template_directory_uri(); ?>/image/nav_button-close.svg" alt="メニューを閉じる" width="" height="" class="nav_close">
				</button>

			</div>
		</header>