<?php get_header(); ?>

<main class="main">
	<div class="inner">
		<div class="content">
			<h1 class="section_title">News</h1>

			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'news',
				'posts_per_page' => 10,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'paged' => $paged,
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) :
			?>
				<div class="news_archive">
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<div class="news_item">
							<a href="<?php the_permalink(); ?>" class="news_link">
								<time class="news_date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
								<p class="news_text"><?php the_title(); ?></p>
							</a>
						</div>
					<?php endwhile; ?>
				</div>

				<?php
				if ($the_query->max_num_pages > 1) {
					echo '<div class="pagination">';
					echo paginate_links(array(
						'base' => get_pagenum_link(1) . '%_%',
						'format' => 'page/%#%/',
						'current' => $paged,
						'total' => $the_query->max_num_pages,
						'prev_text' => '« Prev',
						'next_text' => 'Next »',
					));
					echo '</div>';
				} ?>
			<?php wp_reset_postdata();
			endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>