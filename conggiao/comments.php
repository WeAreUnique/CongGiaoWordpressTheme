<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CongGiao
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="title is-4">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'Có một cuộc thảo luận ở &ldquo;%1$s&rdquo;', 'conggiao' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s cuộc thảo luận ở &ldquo;%2$s&rdquo;', '%1$s cuộc thảo luận ở &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'conggiao' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<?php
			wp_list_comments( array(
				'walker' => new comment_walker()
			) );
		?><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Chức năng bình luận đã khóa cho bài viết này.', 'conggiao' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	// Comment Form 
	$commentFields =  array(
		'author' => '<div class="field">
		    <p class="control has-icons-left has-icons-right">
		        <input class="input" id="author" name="author" type="text" placeholder="Tên Hiển Thị" value="' . esc_attr( $commenter['comment_author'] ) .'">
		        <span class="icon is-small is-left">
		            <i class="fas fa-user-circle"></i>
		        </span>
		        <span class="icon is-small is-right">
		            <i class="fas fa-certificate"></i>
		        </span>
		    </p>
		</div>',
		'email' => '<div class="field">
		    <p class="control has-icons-left has-icons-right">
		        <input class="input" id="email" name="email" type="email" value="'.esc_attr(  $commenter['comment_author_email'] ).'" placeholder="Địa chỉ Email (sẻ không hiển thị)">
		        <span class="icon is-small is-left">
		            <i class="fas fa-envelope"></i>
		        </span>
		        <span class="icon is-small is-right">
		            <i class="fas fa-certificate"></i>
		        </span>
		    </p>
		</div>',
		'url' => '<div class="field comment-form-url">
		    <p class="control has-icons-left has-icons-right">
		        <input class="input" id="url" name="url" type="text" value="'.esc_attr(  $commenter['comment_author_url'] ).'" placeholder="Địa chỉ Website">
		        <span class="icon is-small is-left">
		            <i class="fas fa-globe"></i>
		        </span>
		    </p>
		</div>',
	);
	$argsComments = array(
		'id_form'           => 'commentform',
		'class_form'      	=> 'comment-form',
		'id_submit'         => 'submit',
		'class_submit'      => 'submit button is-link',
		'name_submit'       => 'submit',
		'title_reply'       => __( 'Bình Luận' ),
		'title_reply_to'    => __( 'Gửi Trả Lời Tới %s' ),
		'cancel_reply_link' => __( 'Hủy Trả Lời' ),
		'label_submit'      => __( 'Gửi Bình Luận' ),
		'format'            => 'xhtml',
		'comment_field' 	=>  '<div class="field">
		    <div class="control">
		        <textarea id="comment" name="comment" class="textarea" placeholder="Nội Dung Bình Luận"></textarea>
		    </div>
		</div>',
		'must_log_in' 		=> '<p class="must-log-in">' .
		sprintf(
		  __( 'Bạn cần <a href="%s">đăng nhập</a> để gửi bình luận.' ),
		  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		) . '</p>',

		'logged_in_as' 		=> '<p class="logged-in-as">' .
		sprintf(
		__( 'Đăng nhập với tài khoản: <a href="%1$s">%2$s</a>. <a href="%3$s" title="Đăng xuất tài khoản này">Đăng Xuất?</a>' ),
		  admin_url( 'profile.php' ),
		  $user_identity,
		  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		) . '</p>',
		'title_reply_before' => '<hr><h3 id="reply-title" class="title comment-reply-title">',
		'fields' => apply_filters( 'comment_form_default_fields', $commentFields ),
	);
	comment_form($argsComments);
?>

</div><!-- #comments -->
