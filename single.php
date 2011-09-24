<?php get_header(); ?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('<p class="serif">继续阅读 &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>页面:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p id="tags">标签: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						    发表于<?php the_time('o年n月j日') ?>
					        <?php post_comments_feed_link('订阅评论'); ?>,

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<a href="#respond">发表评论</a>, 或<a href="<?php trackback_url(); ?>" rel="trackback">引用本文</a> .

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							评论关闭，但您可以<a href="<?php trackback_url(); ?> " rel="trackback">引用本文</a>.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							可以评论，但不能ping这篇文章。

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							评论关闭，也不能ping这篇文章。

						<?php } edit_post_link('编辑此文章','','.'); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>



	<?php endwhile; else: ?>

		<p>抱歉，没找到符合条件的文章。</p>

<?php endif; ?>

	</div>
	
	<?php get_sidebar(); ?>


<?php get_footer(); ?>
