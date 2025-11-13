<?php get_header(); ?>

<main class="main">
	<div class="inner">
		<div class="content">
			<?php
			$post_type = get_post_type_object(get_post_type());
			$section_title = $post_type->rewrite['slug'];
			if (ctype_lower($section_title)) {
				$section_title = ucfirst($section_title);
			}
			?>
			<h1 class="section_title"><?php echo $section_title; ?></h1>

			<div class="catalog_inner">
				<div class="catalog_archive">
					<?php
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
					$args = array(
						'post_type' => 'catalog', // 投稿タイプを指定
						'posts_per_page' => 16, // 1ページあたりの表示記事数を16に設定
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
						// ページネーションの表示
						$pagination_args = array(
							'total' => $the_query->max_num_pages,
							'current' => $paged,
							'type' => 'plain',
							'prev_text' => __('« Prev'),
							'next_text' => __('Next »'),
						);
						echo '<div class="pagination">' . paginate_links($pagination_args) . '</div>';
					} else {
						echo '<p>現在お知らせはありません。</p>';
					}

					wp_reset_postdata();
			?>

			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>