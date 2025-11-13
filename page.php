<?php get_header(); ?>

<?php
// ここで現在の投稿のスラッグを取得します。
// スラッグは投稿の「名前」のようなものです。
$post_slug = get_post_field('post_name', get_post());
?>

<main class="main <?php echo 'page-' . $post_slug; // ここでスラッグをmainタグのクラスに追加します。 ?>">
	<div class="inner">
		<div class="content">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					$title = get_the_title(); // 投稿のタイトルを取得します。
					echo '<h1 class="section_title">' . $title . '</h1>'; // タイトルを表示します。
					the_content(); // 投稿の内容を表示します。
				endwhile;
			endif;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>