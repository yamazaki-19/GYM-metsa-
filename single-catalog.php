<?php get_header(); ?>


<?php
if (have_posts()) :
	while (have_posts()) : the_post();
		// 投稿日
		$single_time = get_the_date('Y.m.d');
		// カテゴリー
		$terms = get_the_terms($post->ID, 'calalog_taxonomy');
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

		//////// カスタムフィールドを取得 ///////
		// 価格
		$single_price = get_field('price');
		if ($single_price) {
			// 価格を3桁区切りにする
			$single_price = number_format($single_price);
		}
		// 購入リンク
		$single_url = get_field('url');
		// 商品データ
		$single_data = get_field('data');
		// 生産地
		$single_area = $single_data['area'];
		// サイズ
		$single_size = $single_data['size'];
		// 販売元
		$single_agency = $single_data['agency'];
		// 商品について
		$single_product = get_field('product');
		// 注意点
		$single_important = get_field('caution');

		// print_r はコメントアウトしておいて、デバッグ時にまた使用します
		// echo '<pre>';
		// print_r($single_data);
		// echo '</pre>';
?>

		<main class="main">
			<div class="catalog_inner">
				<div class="catalog_top">
					<!-- アイキャッチ画像 -->
					<div class="catalog_image">
						<?= $single_image; ?>
					</div>

					<div class="catalog_purchase">
						<!-- タイトルとカテゴリ -->
						<h1 class="catalog_title">
							<?= $single_taxonomy; ?>
							<?php the_title(); ?>
						</h1>

						<!-- 価格 -->
						<p class="catalog_price"><?= $single_price; ?><span>円（税込）</span></p>

						<!-- 購入リンク -->
						<a href="<?= $single_url; ?>" class="catalog_button" target="_blank" rel="noopener noreferrer">購入する</a>
					</div>
				</div>


				<section class="catalog_section">
					<!-- 商品について -->
					<h2 class="single_title">商品について</h2>
					<div class="catalog_product"><?= $single_product; ?></div>

					<!-- データ -->
					<table class="catalog_data">
						<tr>
							<th>生産地</th>
							<td><?= $single_area; ?></td>
						</tr>
						<tr>
							<th>サイズ</th>
							<td><?= $single_size; ?></td>
						</tr>
						<tr>
							<th>販売元</th>
							<td><?= $single_agency; ?></td>
						</tr>
					</table>
				</section>


				<!-- 注意点 -->
				<section class="catalog_section">
					<h2 class="single_title">注意点</h2>
					<p class="catalog_text"><?= $single_important; ?></p>
				</section>


		<?php
	endwhile;
endif;
		?>


			</div>
		</main>


		<?php get_footer(); ?>