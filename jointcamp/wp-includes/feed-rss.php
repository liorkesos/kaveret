<?php // Modified for WPH (For proper directionality)
// http://trac.wordpress.org/ticket/6425
/**
 * RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rss version="0.92">
<channel>
	<title>&#8235;<?php bloginfo_rss('name'); wp_title_rss(); ?>&#8236;</title> <?php /* WPH */ ?>
	<link><?php bloginfo_rss('url') ?></link>
	<description>&#8235;<?php bloginfo_rss('description') ?>&#8236;</description> <?php /* WPH */ ?>
	<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
	<docs>http://backend.userland.com/rss092</docs>
	<language><?php echo get_option('rss_language'); ?></language>
	<?php do_action('rss_head'); ?>

<?php while (have_posts()) : the_post(); ?>
	<item>
		<title>&#8235;<?php the_title_rss() ?>&#8236;</title> <?php /* WPH */ ?>
		<description><![CDATA[&#8235;<?php the_excerpt_rss() ?>&#8236;]]></description> <?php /* WPH */ ?>
		<link><?php the_permalink_rss() ?></link>
		<?php do_action('rss_item'); ?>
	</item>
<?php endwhile; ?>
</channel>
</rss>
