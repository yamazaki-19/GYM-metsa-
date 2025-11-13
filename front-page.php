<?php get_header(); ?>

<main class="main front_page">
	<!-- MV -->
	<div class="mv">
		<h1 class="mv_message">あなたの心を癒す<br>北欧の贈り物</h1>

		<div class="swiper mv_slide">
			<div class="swiper-wrapper">
				<div class="swiper-slide mv_item">
					<img src="<?= get_template_directory_uri(); ?>/image/mv_01.jpg" width="960" height="333" alt="ソファ">
				</div>
				<div class="swiper-slide mv_item">
					<img src="<?= get_template_directory_uri(); ?>/image/mv_02.jpg" width="960" height="333" alt="ベッド">
				</div>
				<div class="swiper-slide mv_item">
					<img src="<?= get_template_directory_uri(); ?>/image/mv_03.jpg" width="960" height="333" alt="棚">
				</div>
				<div class="swiper-slide mv_item">
					<img src="<?= get_template_directory_uri(); ?>/image/mv_04.jpg" width="960" height="333" alt="デスクチェア">
				</div>
			</div>
			<!-- ドットのページネーション -->
			<div class="swiper-pagination mv_dot"></div>
		</div>
	</div>

	<!-- News -->
	<section class="top_news section">
		<h2 class="section_title">News</h2>


		<div class="news_archive">
			<?php
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'news',
				'posts_per_page' => 3,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'paged' => $paged
			);
			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) {
				while ($the_query->have_posts()) {
					$the_query->the_post();
			?>
					<div class="news_item">
						<a href="<?php the_permalink(); ?>" class="news_link">
							<time class="news_date" datetime="<?php echo get_the_date('Y.m.d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
							<p class="news_text"><?php the_title(); ?></p>
						</a>
					</div>
			<?php
				}
			} else {
				echo '<p>現在お知らせはありません。</p>';
			}

			wp_reset_postdata();
			?>
		</div>


		<div class="button_area">
			<a href="<?= home_url(); ?>/news" class="button">全てのお知らせを見る</a>
		</div>
	</section>

	<!-- Catalog -->
	<section class="top_catalog section">
		<h2 class="section_title">Catalog</h2>

		<div class="catalog_inner">
			<div class="catalog_archive">
				<?php
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'catalog', // 投稿タイプを指定
					'posts_per_page' => 8, // 1ページあたりの表示記事数を8に設定
					'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // 現在のページ番号
					'orderby' => 'menu_order', // 管理画面の表示順（メニューオーダー）に従って並び替え
					'order' => 'ASC' // 昇順に並び替え
				);
				$the_query = new WP_Query($args);

				if ($the_query->have_posts()) {
					while ($the_query->have_posts()) {
						$the_query->the_post();

						// 画像取得
						$tax_image = get_the_post_thumbnail($post->ID, 'full', array('class' => 'catalog_thumb'));
						// タイトル
						$tax_title = get_the_title();
						// 説明文
						$tax_desc = get_field('product');
				?>
						<div class="catalog_item">
							<a href="<?php echo get_permalink(); ?>" class="catalog_link">
								<?php echo $tax_image; ?>
								<h3 class="catalog_name"><?php echo $tax_title; ?></h3>
								<div class="catalog_desc"><?php echo $tax_desc; ?></div>
							</a>
						</div>
					<?php
					}
					?>
			</div>

		<?php
				} else {
					echo '<p>現在お知らせはありません。</p>';
				}

				wp_reset_postdata();
		?>

		</div>

		<div class="button_area">
			<a href="<?= home_url(); ?>/news" class="button">全ての商品を見る</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>