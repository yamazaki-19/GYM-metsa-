<?php get_header(); ?>


<?php
if (have_posts()) {
	while (have_posts()) : the_post();
		// 投稿日
		$single_time = get_the_date('Y.m.d');
		// カテゴリー
		$terms = get_the_terms($post->ID, 'news_taxonomy');
		if (!empty($terms) && !is_wp_error($terms)) {
			$single_taxonomy = '<p class="single_taxonomy">カテゴリ: <span>' . esc_html($terms[0]->name) . '</span></p>';
		} else {
			// タクソノミーの項目が見つからない場合の処理
			$single_taxonomy = '';
		}
		// アイキャッチ画像情報を取得
		$single_image = get_the_post_thumbnail($post->ID, 'full', array('class' => 'single_image'));
		if (!$single_image) {
			$single_image = '';
		}
?>

		<main class="main">

			<div class="single_inner">

				<!-- タイトル -->
				<h1 class="single_title"><?php the_title(); ?></h1>

				<!-- 投稿日・カテゴリー -->
				<div class="single_data">
					<time class="single_time" data-time="<?= $single_time; ?>"><?= $single_time; ?></time>

					<?= $single_taxonomy; ?>
				</div>

				<?php
				// アイキャッチ画像
				echo $single_image;
				?>

				<!-- 投稿内容 -->
				<div class="single_content">
					<?php
					the_content();
					?>
				</div>

			</div>

			<!-- ナビボタン -->
			<div class="single_nav">
				<?php if (get_previous_post_link()) : ?>
					<div class="single_prev single_navItem">
						<?php previous_post_link('%link', '<span>前の記事</span> %title'); ?>
					</div>
				<?php endif; ?>
				<?php if (get_next_post_link()) : ?>
					<div class="single_next single_navItem">
						<?php next_post_link('%link', '<span>次の記事</span> %title'); ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- 一覧ボタン -->
			<div class="button_area">
				<a href="../" class="button">全てのお知らせを見る</a>
			</div>

		</main>


<?php
	endwhile;
}
?>


<?php get_footer(); ?>