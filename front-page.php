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

		<div class="button_area">
			<a href="<?= home_url(); ?>/news" class="button">全てのお知らせを見る</a>
		</div>
	</section>

	<!-- Catalog -->
	<section class="top_catalog section">
		<h2 class="section_title">Catalog</h2>

		<div class="button_area">
			<a href="<?= home_url(); ?>/catalog" class="button">全ての商品を見る</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>