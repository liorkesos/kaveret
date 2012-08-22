<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>

<div class="single-post">
	<h1 class="entry-title"><?php _e('Error 404 - Not Found', 'arras') ?></h1>
	<div class="entry-content clearfix">
		<?php _e('<p><strong>אנחנו מצטערים, מה שחיפשת - לא כאן.</strong><br />
		תוודא שיש לך את הכתובת הנכונה.</p>
		<p>אם בכל זאת אתה לא מוצא את מה שאתה מחפש - השתמש בטופס החיפוש למטה.</p>', 'arras') ?>
		<?php get_search_form(); ?>
	</div>
</div>

<?php arras_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>