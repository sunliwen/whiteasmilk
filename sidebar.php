	<div id="sidebar">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			
			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2><?php _e("Author") ?></h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>关于<?php single_cat_title(''); ?>的文章。</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>发表于<?php the_time('o年n月j日'); ?>的文章。</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>发表于<?php the_time('o年n月'); ?>的文章。</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>发表于<?php the_time('o年'); ?>的文章。</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>搜索<strong>'<?php the_search_query(); ?>'</strong>相关的文章。</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>您现在浏览的是 <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> 的文章存档.</p>

			<?php } ?>

			</li> <?php }?>

			<?php wp_list_pages("title_li=<h2>页面</h2>"); ?>

			<li><h2><?php _e("Archives") ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>分类</h2>'); ?>

			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2><?php _e("Meta") ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
					
					
				</ul>
				</li>
			<?php } ?>
            <li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

			<?php endif; ?>
		</ul>
	</div>

