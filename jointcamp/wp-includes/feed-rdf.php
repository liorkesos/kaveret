<?php // Modified for WPH (For proper directionality)
// http://trac.wordpress.org/ticket/6425
/**
 * RSS 1 RDF Feed Template for displaying RSS 1 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('rdf') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rdf:RDF
	xmlns="http://purl.org/rss/1.0/"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:admin="http://webns.net/mvcb/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	<?php do_action('rdf_ns'); ?>
>
<channel rdf:about="<?php bloginfo_rss("url") ?>">
	<title>&#8235;<?php bloginfo_rss('name'); wp_title_rss(); ?>&#8236;</title> <?php /* WPH */ ?>
	<link><?php bloginfo_rss('url') ?></link>
	<description>&#8235;<?php bloginfo_rss('description') ?>&#8236;</description> <?php /* WPH */ ?>
	<dc:date><?php echo mysql2date('Y-m-d\TH:i:s\Z', get_lastpostmodified('GMT'), false); ?></dc:date>
	<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
	<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
	<sy:updateBase>2000-01-01T12:00+00:00</sy:updateBase>
	<?php do_action('rdf_header'); ?>
	<items>
		<rdf:Seq>
		<?php while (have_posts()): the_post(); ?>
			<rdf:li rdf:resource="<?php the_permalink_rss() ?>"/>
		<?php endwhile; ?>
		</rdf:Seq>
	</items>
</channel>
<?php rewind_posts(); while (have_posts()): the_post(); ?>
<item rdf:about="<?php the_permalink_rss() ?>">
	<title>&#8235;<?php the_title_rss() ?>&#8236;</title> <?php /* WPH */ ?>
	<link><?php the_permalink_rss() ?></link>
	 <dc:date><?php echo mysql2date('Y-m-d\TH:i:s\Z', $post->post_date_gmt, false); ?></dc:date>
	<dc:creator>&#8235;<?php the_author() ?>&#8236;</dc:creator> <?php /* WPH */ ?>
	<?php the_category_rss('rdf') ?>
<?php if (get_option('rss_use_excerpt')) : ?>
	<description>&#8235;<?php the_excerpt_rss() ?>&#8236;</description> <?php /* WPH */ ?>
<?php else : ?>
	<description>&#8235;<?php the_excerpt_rss() ?>&#8236;</description> <?php /* WPH */ ?>
	<content:encoded><![CDATA[<div dir="rtl"><?php the_content_feed('rdf') ?>]]></content:encoded> <?php /* WPH */ ?>
<?php endif; ?>
	<?php do_action('rdf_item'); ?>
</item>
<?php endwhile;  ?>
</rdf:RDF>
