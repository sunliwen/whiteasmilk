<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>的永久链接"><?php the_title(); ?></a></h2>
				<small>发表于<?php the_time('Y年n月j日') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('阅读全文 &raquo;'); ?>
				</div>

				<p class="postmetadata"><!--发表于<?php the_category(', ') ?> | --><?php the_tags('标签: ', ', ', '&nbsp;| '); ?> <?php edit_post_link('编辑', '', ' | '); ?>  <?php comments_popup_link('没有评论&#187;', '1个评论 &#187;', '%个评论 &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 较早的文章') ?></div>
			<div class="alignright"><?php previous_posts_link('较新的文章 &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">啥都没找到</h2>
		<p class="center">抱歉，这没有你要找的东东。</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
