<?php
if ( !empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) ) {
	die( __('אל תטען דף זה ישירות!', 'arras') );
}

if ( post_password_required() ) {
	?> <h4 class="module-title"><?php _e('יש צורך בססמא', 'arras') ?></h4> <?php
	_e('<p class="nocomments">עלייך להכנס עם ססמא על מנת לצפות בתגובות.</p>', 'arras');
	return;
}

$comments_by_type = &separate_comments($comments);   

if ( have_comments() ) : ?>

	<?php if ( !empty($comments_by_type['comment']) ) : ?>  
	<h4 class="module-title"><?php comments_number( __('אין תגובות', 'arras'), __('תגובה אחת', 'arras'), _n('% תגובות', '% תגובות', get_comments_number(), 'arras') ); ?></h4>
		<ol id="commentlist" class="clearfix">
			<?php wp_list_comments('type=comment&callback=arras_list_comments'); ?>
		</ol>
	<?php endif; ?>
	
	<div class="comments-navigation clearfix">
		<?php paginate_comments_links() ?>
	</div>
	
	<?php if ( !empty($comments_by_type['pings']) ) : ?>
	<h4 class="module-title"><?php _e('עוקבים', 'arras') ?></h4>
	<ol class="pingbacks"><?php wp_list_comments('type=pings&callback=arras_list_trackbacks'); ?></ol>
	<?php endif; ?>
	
<?php else: ?>
		<?php if ('open' == $post->comment_status) : ?>
		<h4 class="module-title"><?php _e('אין תגובות', 'arras') ?></h4>
		<p class="nocomments"><?php _e('לפוסט זה עדיין אין תגובות, תהייה הראשון להגיב', 'arras') ?></p>
		<?php endif ?>
<?php endif; ?>

<?php if ('closed' == $post->comment_status) :  if (!is_page()) : ?>
	<h4 class="module-title"><?php _e('פוסט זה סגור לתגובות', 'arras') ?></h4>
	<p class="nocomments"><?php _e('פוסט זה סגור לתגובות.', 'arras') ?></p>
<?php endif; else: ?>

	<?php
	$req = get_option('require_name_email');
	$aria_req = ( $req ? ' aria-required="true"' : '' );
	$commenter = wp_get_current_commenter();
	
	comment_form( 
		array(
			'fields' => array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'שם' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="author" class="required" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
				'email' => '<p class="comment-form-email"><label for="email">' . __( 'מייל' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="email" class="required email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
				'url'    => '<p class="comment-form-url"><label for="url">' . __( 'כתובת אתר' ) . '</label>' .
				'<input id="url" class="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
			),
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'הגב', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="required"></textarea></p>'
		) 
	); 
	?>
	
<?php endif ?>