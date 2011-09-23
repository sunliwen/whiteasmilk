<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">搜索结果</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 较新的文章') ?></div>
			<div class="alignright"><?php previous_posts_link('较旧的文章 &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>的永久链接"><?php the_title(); ?></a></h3>
				<small>发表于<?php the_time('o年n月j日') ?></small>

				<p class="postmetadata"><?php the_tags('标签: ', ', ', ' | '); ?>  <?php edit_post_link('编辑', '', ' | '); ?>  <?php comments_popup_link('没有评论&#187;', '1个评论&#187;', '%个评论&#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 较早的文章') ?></div>
			<div class="alignright"><?php previous_posts_link('较新的文章 &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">没发现相关文章，试试其他的关键词？</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
