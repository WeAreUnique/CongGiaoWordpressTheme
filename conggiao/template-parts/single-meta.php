<div class="columns is-gapless single-meta" style="<?php echo $style; ?>">
	<div class="column is-9 single-content-meta">
		<span class="postauthor">
			<i class="fas fa-user-circle"></i> <?php the_author_posts_link(); ?>
		</span>
		<span class="postdate">
			<i class="far fa-clock"></i> <?php echo get_the_date(); ?>
		</span>
		<span class="postviews">
			<i class="fas fa-eye"></i> <?php the_views(); ?>
		</span>
		<span class="postcomment">
			<a href="#comments" title="Bình Luận">
				<i class="far fa-comments"></i> <?php $comments_count = wp_count_comments(); echo $comments_count->approved; ?>
			</a>
		</span>
	</div>
	<div class="column is-3 single-content-size">
		<a href="#" onclick="return false;" class="content-size content-small tooltip is-tooltip-info" data-size="is-small" data-tooltip="Đọc bài viết với cở chữ NHỎ"><i class="fas fa-font"></i></a>
		<a href="#" onclick="return false;" class="content-size content-normal tooltip is-tooltip-info" data-size="" data-tooltip="Đọc bài viết với cở chữ BÌNH THƯỜNG"><i class="fas fa-font"></i></a>
		<a href="#" onclick="return false;" class="content-size content-medium tooltip is-tooltip-info" data-size="is-medium" data-tooltip="Đọc bài viết với cở chữ HƠI LỚN"><i class="fas fa-font"></i></a>
		<a href="#" onclick="return false;" class="content-size content-large tooltip is-tooltip-info" data-size="is-large" data-tooltip="Đọc bài viết với cở chữ LỚN"><i class="fas fa-font"></i></a>
	</div>
</div>
