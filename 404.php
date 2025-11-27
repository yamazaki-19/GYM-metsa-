<?php get_header(); ?>

<main class="main_404 main">
	<div class="main_inner">
		<section class="section">
			<h2 class="section_title">
				404 Not Found
			</h2>

			<p class="page404_text section_text">お探しのページが見つかりません。</p>
			<p class="page404_text section_text">ページが「移動」もしくは「削除」されたか<br class="pc_none">「一時的にアクセスできない」可能性があります。</p>
			<p class="page404_text section_text">恐れ入りますが、再度トップページから<br class="pc_none">アクセスをお願いいたします。</p>

			<div class="button_area">
				<a href="<?= home_url(); ?>" class="button">トップページへ戻る</a>
			</div>


		</section>
	</div>
</main>


<?php get_footer(); ?>