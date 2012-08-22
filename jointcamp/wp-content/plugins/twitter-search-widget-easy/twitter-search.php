<?php
/*
Plugin Name: WP Twitter Search widget - easy
Plugin URI: http://wp-plugins-themes.com
Description: WP Twitter Search Widget plugin will show your tweets search under Sidebar Area (Widget). Tweets will REFRESH AUTOMATICALLY. Also it has reply option inside widget.  Go to  admin panel option  <code>(Settings -> WP Twitter Search Widget)</code> to set different color combination.
Version: 1.0
Author: Vas Pro
Author URI: http://wp-plugins-themes.com
*/

/*
    Copyright (C) 2004-11 wp-plugins-themes.com.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Some default options


add_option('wp_twitter_search_widget_search_query', 'Business');
add_option('wp_twitter_search_widget_search_title', 'Money for Life...');
add_option('wp_twitter_search_widget_search_caption', 'Business');
add_option('wp_twitter_search_search_height', '250');
add_option('wp_twitter_search_search_width', '250');
add_option('wp_twitter_search_search_scrollbar', '-1');
add_option('wp_twitter_search_search_shell_bg', '333333');
add_option('wp_twitter_search_search_shell_text', 'ffffff');
add_option('wp_twitter_search_search_tweet_bg', '000000');
add_option('wp_twitter_search_search_tweet_text', 'ffffff');
add_option('wp_twitter_search_search_links', '4aed05');
add_option('wp_twitter_search_show_sponser_link', '-1');
add_option('wp_twitter_search_search_widget_sidebar_title', 'Twitter Search');





function filter_wp_twitter_search_profile($content)
{
    if (strpos($content, "<!--wp_twitter_search-->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!--wp_twitter_search-->', wp_twitter_search_profile(), $content);
    }
    return $content;
}

function filter_wp_twitter_search_search($content)
{
    if (strpos($content, "<!--wp_twitter_search_search-->") !== FALSE)
    {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!--wp_twitter_search_search-->', wp_twitter_search_search(), $content);
    }
    return $content;
}


function wp_twitter_search_profile()
{
	$account = get_option('wp_twitter_search_username');
	$height = get_option('wp_twitter_search_height');
	$width = get_option('wp_twitter_search_width');

	$show_sponser = get_option('wp_twitter_search_show_sponser_link');

	if ($show_sponser == 1)
	{
		$sponserlink_profile = "";
	}
	else
	{
		$sponserlink_profile = '<div align="left">- <a href="http://wp-plugins-themes.com" title="Twitter Search  Widget" target="_blank"> <font size="1">' . 'Twitter Search - Profile' . '</font></a></div>';
	}

	if (get_option('wp_twitter_search_scrollbar') == 1){
		$scrollbar = "true";
	}else
	{
		$scrollbar = "false";
	}

	if (get_option('wp_twitter_search_behavior') == 1){
		$loop1 = "false";
		$behavior1 = "all";
	}else
	{
		$loop1 = "true";
		$behavior1 = "default";
	}

	$shell_bg = get_option('wp_twitter_search_shell_bg');
	$shell_text = get_option('wp_twitter_search_shell_text');
	$tweet_bg = get_option('wp_twitter_search_tweet_bg');
	$tweet_text = get_option('wp_twitter_search_tweet_text');
	$links = get_option('wp_twitter_search_links');

		$T1 = "new TWTR.Widget({  version: 2,  type: 'profile',  rpp: 30,  interval: 5000,  width: ";
			$v1 = $width;
		$T2 = ",  height: ";
			$v2 = $height;
		$T3 = ",  theme: {    shell: {      background: '#";
			$v3 = $shell_bg;
		$T4 = "',      color: '#";
			$v4 = $shell_text;
		$T5 = "'    },    tweets: {      background: '#";
			$v5 = $tweet_bg;
		$T6 = "',      color: '#";
			$v6 = $tweet_text;
		$T7 = "',      links: '#";
			$v7 = $links;
		$T8 = "'    }  },  features: {    scrollbar: ";
		    $v8 = $scrollbar;
		$T9 = ",    loop: ";
			$v9 = $loop1;
		$T10 = ",    live: true,    hashtags: true,    timestamp: true,    avatars: false,    behavior: '";
			$v10 = $behavior1;
		$T11 = "'  }}).render().setUser('";
			$v11 = $account;
		$T12 = "').start();";

	$output = '<script src="http://widgets.twimg.com/j/2/widget.js"></script><script>' . $T1 . $v1 . $T2 . $v2 . $T3 . $v3 . $T4 . $v4 . $T5 . $v5 . $T6 . $v6 . $T7 . $v7 . $T8 . $v8 . $T9 . $v9 . $T10 . $v10 . $T11 . $v11 . $T12 . '</script>';

	$output_profile = $output;

	return $output_profile;
}


function filter_wp_twitter_search_tweet_button_show($related_content)
{

	$tweet_btn_allow = get_option('wp_twitter_search_allow_tweet_button');
	$tweet_btn_display_page = get_option('wp_twitter_search_tweet_button_display_page');
	$tweet_btn_display_home = get_option('wp_twitter_search_tweet_button_display_home');
	$tweet_btn_display_rss = get_option('wp_twitter_search_tweet_button_display_rss');
	$tweet_btn_place = get_option('wp_twitter_search_tweet_button_place');
	$tweet_btn_style = get_option('wp_twitter_search_tweet_button_style');
	$tweet_btn_float = get_option('wp_twitter_search_tweet_button_container');
	$tweet_btn_twt_username = get_option('wp_twitter_search_tweet_button_twitter_username');
	$tweet_btn_reco_username = get_option('wp_twitter_search_tweet_button_reco_username');
	$tweet_btn_reco_desc = get_option('wp_twitter_search_tweet_button_reco_desc');

	global $post;
	$p = $post;
	$title1 = $p->post_title ;
	$link1 = get_permalink($p);
	$blog_url = get_bloginfo('wpurl');
	$blog_title = get_bloginfo('wp_title');

	$final_url2 = '<a href="http://twitter.com/share?url='.$link1.'&via='.$tweet_btn_twt_username.'&text='.$title1.'&related='.$tweet_btn_reco_username.':'.$tweet_btn_reco_desc.'&lang=en&count='.$tweet_btn_style.'" class="twitter-share-button">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';

	$final_url2 = '<div style="'.$tweet_btn_float.'">' . $final_url2 . '</div>';

	if($tweet_btn_allow == 1)
	{
		if (is_page() && $tweet_btn_display_page == 1)
		{
			if ($tweet_btn_place == "before")
			{
				$related_content =  $final_url2 . $related_content;
			}
			if ($tweet_btn_place == "after")
			{
				$related_content =  $related_content . $final_url2;
			}
			if ($tweet_btn_place == "manual")
			{
				wp_twitter_search_add_option_page();
			}
		}

		if (is_single() || is_search() || is_archive())
		{
			if ($tweet_btn_place == "before")
			{
				$related_content =  $final_url2 . $related_content;
			}
			if ($tweet_btn_place == "after")
			{
				$related_content =  $related_content . $final_url2;
			}
			if ($tweet_btn_place == "manual")
			{
				wp_twitter_search_add_option_page();
			}
		}

		if (is_home() && $tweet_btn_display_home == 1)
		{
			if ($tweet_btn_place == "before")
			{
				$related_content =  $final_url2 . $related_content;
			}
			if ($tweet_btn_place == "after")
			{
				$related_content =  $related_content . $final_url2;
			}
			if ($tweet_btn_place == "manual")
			{
				wp_twitter_search_add_option_page();
			}
		}

		if (is_feed() && $tweet_btn_display_rss == 1)
		{
			if ($tweet_btn_place == "before")
			{
				$related_content =  $final_url2 . $related_content;
			}
			if ($tweet_btn_place == "after")
			{
				$related_content =  $related_content . $final_url2;
			}
			if ($tweet_btn_place == "manual")
			{
				wp_twitter_search_add_option_page();
			}
		}
 	}
	$post = $p;
	return $related_content;
}

function twitter_search_tweet_button()
{

	$tweet_btn_allow = get_option('wp_twitter_search_allow_tweet_button');
	$tweet_btn_display_page = get_option('wp_twitter_search_tweet_button_display_page');
	$tweet_btn_display_home = get_option('wp_twitter_search_tweet_button_display_home');
	$tweet_btn_display_rss = get_option('wp_twitter_search_tweet_button_display_rss');
	$tweet_btn_place = get_option('wp_twitter_search_tweet_button_place');
	$tweet_btn_style = get_option('wp_twitter_search_tweet_button_style');
	$tweet_btn_float = get_option('wp_twitter_search_tweet_button_container');
	$tweet_btn_twt_username = get_option('wp_twitter_search_tweet_button_twitter_username');
	$tweet_btn_reco_username = get_option('wp_twitter_search_tweet_button_reco_username');
	$tweet_btn_reco_desc = get_option('wp_twitter_search_tweet_button_reco_desc');

	$final_url2 = '<a href="http://twitter.com/share?url='.$link1.'&via='.$tweet_btn_twt_username.'&text='.$title1.'&related='.$tweet_btn_reco_username.':'.$tweet_btn_reco_desc.'&lang=en&count='.$tweet_btn_style.'" class="twitter-share-button">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';

	echo $final_url2;
}


function wp_twitter_search_search()
{
	$search_query = get_option('wp_twitter_search_widget_search_query');
	$search_title = get_option('wp_twitter_search_widget_search_title');
	$search_caption = get_option('wp_twitter_search_widget_search_caption');
	$account = get_option('wp_twitter_search_username');

	$search_sidebar_title = get_option('wp_twitter_search_search_widget_sidebar_title');



	$search_height = get_option('wp_twitter_search_search_height');
	$search_width = get_option('wp_twitter_search_search_width');

	$show_sponser = get_option('wp_twitter_search_show_sponser_link');

	if ($show_sponser == 1)
	{
		$sponserlink_search = "";
	}
	else
	{
		$sponserlink_search = '<div align="left">- <a href="http://wp-plugins-themes.com" title="Twitter Search - Search Widget" target="_blank"> <font size="1">' . 'Twitter Search - Search' . '</font></a></div>';
	}

		if (get_option('wp_twitter_search_search_scrollbar') == 1){
			$search_scrollbar = "true";
		}else
		{
			$search_scrollbar = "false";
		}

		$search_shell_bg = get_option('wp_twitter_search_search_shell_bg');
		$search_shell_text = get_option('wp_twitter_search_search_shell_text');
		$search_tweet_bg = get_option('wp_twitter_search_search_tweet_bg');
		$search_tweet_text = get_option('wp_twitter_search_search_tweet_text');
		$search_links = get_option('wp_twitter_search_search_links');

		$T11 = "new TWTR.Widget({  version: 2,  type: 'search', search: '";
			$S1 = $search_query;
		$T12 = "', interval:6000, title: '";
			$S2 = $search_title;
		$T13 = "', subject: '";
			$S3 = $search_caption;
		$T14 = "', width: ";
			$v1 = $search_width;
		$T2 = ",  height: ";
			$v2 = $search_height;
		$T3 = ",  theme: {    shell: {      background: '#";
			$v3 = $search_shell_bg;
		$T4 = "',      color: '#";
			$v4 = $search_shell_text;
		$T5 = "'    },    tweets: {      background: '#";
			$v5 = $search_tweet_bg;
		$T6 = "',      color: '#";
			$v6 = $search_tweet_text;
		$T7 = "',      links: '#";
			$v7 = $search_links;
		$T8 = "'    }  },  features: {    scrollbar: ";
			$v8 = $search_scrollbar;
		$T9 = ",    loop: ";
			$v9 = "true";
		$T10 = ",    live: true,    hashtags: true,    timestamp: true,    avatars: true,    behavior: 'default'   }}).render().start();";

		$output1 = '<script src="http://widgets.twimg.com/j/2/widget.js"></script><script>' . $T11 .$S1 . $T12 . $S2 . $T13 . $S3 . $T14 . $v1 . $T2 . $v2 . $T3 . $v3 . $T4 . $v4 . $T5 . $v5 . $T6 . $v6 . $T7 . $v7 . $T8 . $v8 . $T9 . $v9 . $T10 . '</script>';

		$output_search = $output1 . $sponserlink_search;

	return $output_search;
}

// Displays Wordpress Blog Twitter Search Options menu
function wp_twitter_search_add_option_page() {
    if (function_exists('add_options_page')) {
        add_options_page('Twitter Search', 'Twitter Search', 8, __FILE__, 'wp_twitter_search_options_page');
    }
}

function wp_twitter_search_options_page() {


	$wp_twitter_search_tweet_button_place = $_POST['wp_twitter_search_tweet_button_place'];
	$wp_twitter_search_tweet_button_style = $_POST['wp_twitter_search_tweet_button_style'];


    if (isset($_POST['info_update']))
    {
		update_option('wp_twitter_search_widget_title', stripslashes_deep((string)$_POST["wp_twitter_search_widget_title"]));
        update_option('wp_twitter_search_username', (string)$_POST["wp_twitter_search_username"]);
        update_option('wp_twitter_search_height', (string)$_POST['wp_twitter_search_height']);
		update_option('wp_twitter_search_width', (string)$_POST['wp_twitter_search_width']);
		update_option('wp_twitter_search_scrollbar', ($_POST['wp_twitter_search_scrollbar']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_behavior', ($_POST['wp_twitter_search_behavior']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_shell_bg', (string)$_POST['wp_twitter_search_shell_bg']);
		update_option('wp_twitter_search_shell_text', (string)$_POST['wp_twitter_search_shell_text']);
		update_option('wp_twitter_search_tweet_bg', (string)$_POST['wp_twitter_search_tweet_bg']);
		update_option('wp_twitter_search_tweet_text', (string)$_POST['wp_twitter_search_tweet_text']);
		update_option('wp_twitter_search_links', (string)$_POST['wp_twitter_search_links']);

		update_option('wp_twitter_search_widget_search_query', stripslashes_deep((string)$_POST['wp_twitter_search_widget_search_query']));
		update_option('wp_twitter_search_widget_search_title', stripslashes_deep((string)$_POST['wp_twitter_search_widget_search_title']));
		update_option('wp_twitter_search_widget_search_caption', stripslashes_deep((string)$_POST['wp_twitter_search_widget_search_caption']));
        update_option('wp_twitter_search_search_height', (string)$_POST['wp_twitter_search_search_height']);
		update_option('wp_twitter_search_search_width', (string)$_POST['wp_twitter_search_search_width']);
		update_option('wp_twitter_search_search_scrollbar', ($_POST['wp_twitter_search_search_scrollbar']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_search_shell_bg', (string)$_POST['wp_twitter_search_search_shell_bg']);
		update_option('wp_twitter_search_search_shell_text', (string)$_POST['wp_twitter_search_search_shell_text']);
		update_option('wp_twitter_search_search_tweet_bg', (string)$_POST['wp_twitter_search_search_tweet_bg']);
		update_option('wp_twitter_search_search_tweet_text', (string)$_POST['wp_twitter_search_search_tweet_text']);
		update_option('wp_twitter_search_search_links', (string)$_POST['wp_twitter_search_search_links']);
		update_option('wp_twitter_search_search_widget_sidebar_title', (string)$_POST['wp_twitter_search_search_widget_sidebar_title']);



		update_option('wp_twitter_search_show_sponser_link', ($_POST['wp_twitter_search_show_sponser_link']=='1') ? '1':'-1' );

		update_option('wp_twitter_search_allow_tweet_button', ($_POST['wp_twitter_search_allow_tweet_button']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_tweet_button_display_page', ($_POST['wp_twitter_search_tweet_button_display_page']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_tweet_button_display_home', ($_POST['wp_twitter_search_tweet_button_display_home']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_tweet_button_display_rss', ($_POST['wp_twitter_search_tweet_button_display_rss']=='1') ? '1':'-1' );
		update_option('wp_twitter_search_tweet_button_container', stripslashes_deep((string)$_POST['wp_twitter_search_tweet_button_container']));
		update_option('wp_twitter_search_tweet_button_twitter_username', stripslashes_deep((string)$_POST['wp_twitter_search_tweet_button_twitter_username']));
		update_option('wp_twitter_search_tweet_button_reco_username', stripslashes_deep((string)$_POST['wp_twitter_search_tweet_button_reco_username']));
		update_option('wp_twitter_search_tweet_button_reco_desc', stripslashes_deep((string)$_POST['wp_twitter_search_tweet_button_reco_desc']));

		update_option('wp_twitter_search_tweet_button_place', stripslashes_deep((string)$_POST['wp_twitter_search_tweet_button_place']));
		update_option('wp_twitter_search_tweet_button_style', stripslashes_deep((string)$_POST['wp_twitter_search_tweet_button_style']));

        echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
        echo '</strong></p></div>';
    }else
	{
			$wp_twitter_search_tweet_button_place = get_option('wp_twitter_search_tweet_button_place');
			$wp_twitter_search_tweet_button_style = get_option('wp_twitter_search_tweet_button_style');
	}

    $new_icon = '<img border="0" src="'.$icon_url.'/wp-content/plugins/twitter-search/new.gif" /> ';
    $tweet_button = '<img border="0" src="'.$icon_url.'/wp-content/plugins/twitter-search/twitter-search-tweet-button.jpg" /> ';

    ?>

    <div class="wrap">

    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <input type="hidden" name="info_update" id="info_update" value="true" />

    <script src="<?php echo plugins_url('twitter-search/jscolor.js');?>" type="text/javascript"></script>

    <u><h2>Twitter Search</h2></u>

	<div id="poststuff" class="metabox-holder has-right-sidebar" >
		<div style="float:left;width:60%;">




			<div class="postbox">
				<h3>3) Twitter Search <font color="red">Search Widget</font> Options <?=$new_icon?></h3>
					<div>
					<table class="form-table">
					<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Search Query</label></th>
                        <td><textarea name="wp_twitter_search_widget_search_query" cols="18" rows="1"><?php echo get_option('wp_twitter_search_widget_search_query'); ?></textarea><br>HELP:
                        <a href="http://search.twitter.com/operators" target="_blank">http://search.twitter.com/operators</a></td>
					</tr>
					<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Search Title</label></th>
                        <td><textarea name="wp_twitter_search_widget_search_title" cols="18" rows="1"><?php echo get_option('wp_twitter_search_widget_search_title'); ?></textarea></td>
					</tr>
					<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Search Caption</label></th>
                        <td><textarea name="wp_twitter_search_widget_search_caption" cols="18" rows="1"><?php echo get_option('wp_twitter_search_widget_search_caption'); ?></textarea></td>
					</tr>

				<tr valign="top">
          			<th scope="row" style="width:29%;"><label>Widget Title</label></th>
                      <td><textarea name="wp_twitter_search_search_widget_sidebar_title" cols="18" rows="1"><?php echo get_option('wp_twitter_search_search_widget_sidebar_title'); ?></textarea></td>
				</tr>

				<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Widget Height</label></th>
					<td>
					<input name="wp_twitter_search_search_height" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_height'); ?>" />
					</td>
				</tr>
				<tr valign="top">
						<th scope="row" style="width:29%;"><label>Widget Width</label></th>
					<td>
					 <input name="wp_twitter_search_search_width" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_width'); ?>" />
					</td>
				</tr>

				<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Include Scrollbar?</label></th>
					<td>
					<input name="wp_twitter_search_search_scrollbar" type="checkbox"<?php if(get_option('wp_twitter_search_search_scrollbar')!='-1') echo 'checked="checked"'; ?> value="1" /> <code>Check</code> to include Scrollbar
					</td>
				</tr>

				<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Widget Shell Background Color</label></th>
					<td>
					 <input class="color" name="wp_twitter_search_search_shell_bg" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_shell_bg'); ?>" />

					</td>
				</tr>
				<tr valign="top">
						<th scope="row" style="width:29%;"><label>Widget Shell Text Color</label></th>
					<td>
					<input class="color" name="wp_twitter_search_search_shell_text" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_shell_text'); ?>" />
					</td>
				</tr>

				<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Widget Tweet Background Color</label></th>
					<td>
					 <input class="color" name="wp_twitter_search_search_tweet_bg" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_tweet_bg'); ?>" />

					</td>
				</tr>
				<tr valign="top">
						<th scope="row" style="width:29%;"><label>Widget Tweet Text Color</label></th>
					<td>
					<input class="color" name="wp_twitter_search_search_tweet_text" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_tweet_text'); ?>" />
					</td>
				</tr>
				<tr valign="top" class="alternate">
						<th scope="row" style="width:29%;"><label>Link Color</label></th>
					<td>
					<input class="color" name="wp_twitter_search_search_links" type="text" size="15" value="<?php echo get_option('wp_twitter_search_search_links'); ?>" />
					</td>
				</tr>

					</table>
					</div>

				 <div class="submit">
					<input type="submit" name="info_update" class="button-primary" value="<?php _e('Update options'); ?> &raquo;" />
				</div>

			</div>

    </form>

</div>

	</div>
    </div><?php

}

function show_wp_twitter_search_profile_widget($args)
{
	extract($args);
	$wp_twitter_search_widget_title1 = get_option('wp_twitter_search_widget_title');
	echo $before_widget;
	echo $before_title . $wp_twitter_search_widget_title1 . $after_title;
    echo wp_twitter_search_profile();
    echo $after_widget;
}

function show_wp_twitter_search_search_widget($args)
{
	extract($args);
	$wp_twitter_search_widget_title1 = get_option('wp_twitter_search_search_widget_sidebar_title');
	echo $before_widget;
	echo $before_title . $wp_twitter_search_widget_title1 . $after_title;

    echo wp_twitter_search_search();
    echo $after_widget;
}


function wp_twitter_search_profile_widget_control()
{
    ?>
    <p>
    <? _e("Please go to <b>Settings -> Twitter Search</b> for options. <br><br> Available options: <br> 1) Widget Title <br> 2) Twitter Username <br> 3) Widget Height <br> 4) Widget Width <br> 5) 5 different Shell and Tweet background and text color options"); ?>
    </p>
    <?php
}


function wp_twitter_search_search_widget_control()
{
    ?>
    <p>
    <? _e("Please go to <b>Settings -> Twitter Search</b> for options. <br><br> Available options: <br> 1) Search Query <br> 2) Search Title <br> 3) Search Caption"); ?>
    </p>
    <?php
}



function widget_wp_twitter_search_search_init()
{
    $widget_options = array('classname' => 'widget_wp_twitter_search_search', 'description' => __( "Display Twitter Search  Widget") );
    wp_register_sidebar_widget('wp_twitter_search_search_widgets', __('Twitter Search '), 'show_wp_twitter_search_search_widget', $widget_options);
    wp_register_widget_control('wp_twitter_search_search_widgets', __('Twitter Search '), 'wp_twitter_search_search_widget_control' );
}

add_filter('the_content', 'filter_wp_twitter_search_profile');
add_filter('the_content', 'filter_wp_twitter_search_search');

add_filter('the_content', 'filter_wp_twitter_search_tweet_button_show');



add_action('init', 'widget_wp_twitter_search_search_init');

// Insert the wp_twitter_search_add_option_page in the 'admin_menu'
add_action('admin_menu', 'wp_twitter_search_add_option_page');

?>