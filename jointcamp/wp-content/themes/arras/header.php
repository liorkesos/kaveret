<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?></title>
<?php arras_document_description() ?>


<?php if ( is_search() || is_author() ) : ?> 
<meta name="robots" content="noindex, nofollow" />
<?php endif ?>


<?php if ( ($feed = arras_get_option('feed_url') ) == '' ) : ?>
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s פוסטים אחרונים', 'arras' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
<?php else : ?>
<link rel="alternate" type="application/rss+xml" href="<?php echo $feed ?>" title="<?php printf( __( '%s פוסטים אחרונים', 'arras' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
<?php endif; ?>

<?php if ( ($comments_feed = arras_get_option('comments_feed_url') ) == '' ) : ?>
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s תגובות אחרונות', 'arras' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
<?php else : ?>
<link rel="alternate" type="application/rss+xml" href="<?php echo $comments_feed ?>" title="<?php printf( __( '%s תגובות אחרונות', 'arras' ), esc_html( get_bloginfo('name'), 1 ) ) ?>" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( !file_exists(ABSPATH . 'favicon.ico') ) : ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
<?php else: ?>
<link rel="shortcut icon" href="<?php echo get_bloginfo('url') ?>/favicon.ico" />
<?php endif; ?>

<?php
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-tabs', null, array('jquery-ui-core', 'jquery'), null, false); 

if ( is_home() || is_front_page() ) {
	wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.min.js', 'jquery', null, true);
}

if ( !function_exists('pixopoint_menu') ) {
	wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/superfish/hoverIntent.js', 'jquery', null, false);
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish/superfish.js', 'jquery', null, false);
}

if ( is_singular() ) {
	wp_enqueue_script('comment-reply');
	wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', 'jquery', null, false);
}

?>

<?php wp_head(); ?>
</head>

<body <?php arras_body_class() ?>>
<script type="text/javascript">
//<![CDATA[
(function(){
var c = document.body.className;
c = c.replace(/no-js/, 'js');
document.body.className = c;
})();
//]]>
</script>

<!-- CUSTOM HEADERS -->
<?php if ( is_page('economy') || is_category('economy') ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/economy.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('education') || is_category('education') ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/education.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('health') || is_category('health')  ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/health.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('vision') || is_category('vision')  ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/vision.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('housing-transport') || is_category('housing-transport')  ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/housing-transport.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('law') || is_category('law') ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/law.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('welfare') || is_category('welfare') ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/welfare.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('employment') || is_category('employment') ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/employment.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<?php if ( is_page('public') || is_category('public') ) : ?>
<style>
.blog-name a {
background: url(http://j14.org.il/spivak/wp-content/uploads/2011/09/public.jpg) no-repeat;
width: 980px;
height: 222px;
display: block;}
</style>
<?php endif ?>
<!-- CUSTOM HEADERS -->

<?php arras_body() ?>

<div id="top-menu" class="clearfix">
<?php arras_above_top_menu() ?>
	<?php 
	if ( function_exists('wp_nav_menu') ) {
		wp_nav_menu( array( 
			'sort_column' => 'menu_order', 
			'menu_class' => 'sf-menu menu clearfix', 
			'theme_location' => 'top-menu',
			'container_id' => 'top-menu-content'
		) );
	}
	?>
<?php arras_below_top_menu() ?>
</div><!-- #top-menu -->

<div id="header">
	<div id="branding" class="clearfix">
	<div class="logo">
		<?php if ( is_home() || is_front_page() ) : ?>
		<h1 class="blog-name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<h2 class="blog-description"><?php bloginfo('description'); ?></h2>
		<?php else: ?>
		<span class="blog-name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></span>
		<span class="blog-description"><?php bloginfo('description'); ?></span>
		<?php endif ?>
	</div>

<!--<div id="searchbar"><?php get_search_form() ?></div> -->

	</div><!-- #branding -->
</div><!-- #header -->

<?php arras_above_nav() ?>

<div id="nav">
	<div id="nav-content" class="clearfix">

	<?php 
	if ( function_exists('pixopoint_menu') ) {
		pixopoint_menu();
	} elseif ( function_exists('wp_nav_menu') ) {
		wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'sf-menu menu clearfix', 'theme_location' => 'main-menu', 'fallback_cb' => 'arras_nav_fallback_cb' ) );
	} else { ?>
		<ul class="sf-menu menu clearfix">
			<li><a href="<?php bloginfo('url') ?>"><?php _e( arras_get_option('topnav_home') ); ?></a></li>
			<?php 
			if (arras_get_option('topnav_display') == 'pages') {
				wp_list_pages('sort_column=menu_order&title_li=');
			} else if (arras_get_option('topnav_display') == 'linkcat') {
				wp_list_bookmarks('category='.arras_get_option('topnav_linkcat').'&hierarchical=0&show_private=1&hide_invisible=0&title_li=&categorize=0&orderby=id'); 
			} else {
				wp_list_categories('hierarchical=1&orderby=id&hide_empty=1&title_li=');	
			}
			?>
		</ul>
	<?php } ?>
	<?php arras_beside_nav() ?>
	</div><!-- #nav-content -->

</div><!-- #nav -->
<?php arras_below_nav() ?>

<div id="wrapper">




	<?php arras_above_main() ?>
  
	<div id="main" class="clearfix">
<?php 
if(true){if ( function_exists('insert_newsticker') ) {
echo "<style>

#news-ticker li{
position:relative !important;
}
</style>
";
echo "<div style = 'text-align:right'>";
 insert_newsticker(); 
echo "</div>";
} }
?>
<!-- Start AWSOM News Announcement Block -->
<div id="announcement">
<?php if (function_exists('display_my_news_announcement')) { display_my_news_announcement(0); } ?>
</div>

<!-- End AWSOM News Announcement Block -->
    <div id="container" class="clearfix">
