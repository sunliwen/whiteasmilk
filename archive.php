<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">关于&#8216;<?php single_cat_title(); ?>&#8217;的存档</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">关于&#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">发表于<?php the_time('o年n月j日'); ?>的文章</h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">发表于<?php the_time('o年n月'); ?>的文章</h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">发表于<?php the_time('o'); ?>的文章</h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">作者</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">文章存档</h2>
 	  <?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 较早的文章') ?></div>
			<div class="alignright"><?php previous_posts_link('较新的文章 &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>的永久链接"><?php the_title(); ?></a></h3>
				<small>发表于<?php the_time('o年n月j日') ?></small>

				<div class="entry">
					<?php the_content() ?>
				</div>

        <p class="postmetadata"><?php the_tags('标签: ', ', ', '&nbsp;| '); ?> <?php edit_post_link('编辑', '', ' | '); ?>  <?php comments_popup_link('没有评论 &#187;', '1个评论 &#187;', '%个评论 &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 较早的文章') ?></div>
			<div class="alignright"><?php previous_posts_link('较新的文章&raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">木有找到</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
