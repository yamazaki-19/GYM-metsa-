<?php get_header(); ?>

<main class="main front_page">
	<!-- MV -->
	<div class="mv">
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
</main>

<?php get_footer(); ?>