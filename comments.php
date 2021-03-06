<?php
	if ( post_password_required() )
		return;
?>

<?php if ( have_comments() || comments_open() ) : ?>
<section id="comments">

	<h2><?php printf( _n( 'One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'theme_name' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h2>
	<?php if ( have_comments() ) : ?>

		<ol>
			<?php wp_list_comments( array( 'callback' => 'theme_name_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

	<?php else : // or, if we don't have comments: ?>
		<p><?php _e('Be the first to leave a comment!', 'theme_name')?></p>

	<?php endif; // have_comments() ?>

	<?php
	$custom_comment_form = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author">' .
				'<input id="author" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . ' class="required" />' .
				'<label for="author">' . __( 'Your Name' , 'theme_name' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'</p>',
			'email'  => '<p class="comment-form-email">' .
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . ' class="required email" />' .
				'<label for="email">' . __( 'Your Email' , 'theme_name' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' ) .
				'</p>',
			'url'    =>  '<p class="comment-form-url">' .
				'<input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30"' . ' />' .
				'<label for="website">' . __( 'Your Website' , 'theme_name' ) . '</label> ' .
				'</p>') ),
			'comment_field' => '<p class="comment-form-comment">' .
				'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="required"></textarea>' .
				'</p>',
			'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->id ) ) ) ) . '</p>',
			'title_reply' => __( 'Leave a Reply' , 'theme_name' ),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'cancel_reply_link' => __( 'Cancel' , 'theme_name' ),
			'label_submit' => __( 'Post Comment' , 'theme_name' ),
		);
		comment_form($custom_comment_form);
	?>

</section><!-- #comments -->
<?php endif; // comments_open() ?>