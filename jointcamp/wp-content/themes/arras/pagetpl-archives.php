<?php
/*
 * Template Name: Site Archives
 */
?>

<?php get_header(); ?>

<div id="content" class="section">
<?php arras_above_content() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php arras_above_post() ?>
	<div <?php arras_single_post_class() ?>>
        <?php arras_postheader() ?>
        
        <div class="entry-content clearfix">
		
		<h3><?php _e('פוסטים אחרונים', 'arras') ?></h3>
		<ul><?php wp_get_archives('type=postbypost&limit=20') ?></ul>
		
		<h3><?php _e('ארכיון לפי חודש', 'arras') ?></h3>
		<ul><?php wp_get_archives('type=monthly&show_post_count=1') ?></ul>
		
		<h3><?php _e('דפים', 'arras') ?></h3>
		<ul><?php wp_list_pages('title_li=') ?></ul>
		
		<h3><?php _e('קטגוריות', 'arras') ?></h3>
		<ul><?php wp_list_categories('title_li=') ?></ul>
		
		<h3><?php _e('מחברים', 'arras') ?></h3>
		<ul><?php wp_list_authors('exclude_admin=0&optioncount=1&title_li=') ?></ul>
		
		</div>
        
		<?php arras_postfooter() ?>

    </div>
    
	<?php arras_below_post() ?>
    
<?php endwhile; else: ?>

<?php arras_post_notfound() ?>

<?php endif; ?>

<?php arras_below_content() ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>