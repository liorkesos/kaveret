<?php
/**
 * Display class, GDocs Wordpress plugin
 *
 * Handles HTML formatting
 *
 * @author		Lim Jiunn Haur <codex.is.poetry@gmail.com>
 * @copyright	Copyright (c) 2008, Lim Jiunn Haur
 * @license		http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package		gdocs
 * @subpackage	gdocs.inc
 * @since		0.5
 * @version		0.9
 */
 
/**
 * GDisplay class
 *
 * No special OOP techniques used here. This class just
 * groups all display-related functions together.
 * @author		Lim Jiunn Haur <codex.is.poetry@gmail.com>
 * @copyright	Copyright (c) 2008, Lim Jiunn Haur
 * @license		http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package		gdocs
 * @subpackage	gdocs.inc
 * @since		0.5
 * @version		0.9
 */
class GDisplay {

	/**#@+
	 * @static
	 */
	
	/**
	 * Array of all stylesheets used on this page
	 *
	 * Keeps a record so that any given stylesheet
	 * isn't imported more than once on the same page
	 * @var array
	 */
	private static $stylesheets = array ();
	 
	/**
	 * Prints head of configuration page
	 */
	public static function printHead (){
	?>
	<style type="text/css">
		div#gdocs_left {
			float:left;
			width:50%;
		}
		div#gdocs_right {
			float:right;
			width:50%;
		}
		div#gdocs_right td.gdocs_loader {
			background:#cfebf7 url("<?php echo GDOCS_ADDRESS ?>/inc/img/ajax-loader.gif") center right no-repeat;
		}
		div#gdocs_right tr.gdocs_loader td{
			background-color:#cfebf7;
		}
		div#gdocs_right table.hor-zebra {
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
			font-size: 10px;
			margin: 15px 0;
			text-align: left;
			border-collapse: collapse;
		}
		div#gdocs_right table.hor-zebra th {
			font-size: 12px;
			font-weight: normal;
			padding: 10px 8px;
			color: #039;
		}
		div#gdocs_right table.hor-zebra td {
			padding: 8px;
			color: #669;
		}
		div#gdocs_right table.hor-zebra .odd {
			background: #e8edff;
		}
		
		span.description {
			font-style:normal;
		}
	</style>
	
	<div class='wrap'>
		<h2>Inline Google Docs</h2>
		<div id='gdocs_left'>
			<form method='post' action='options.php'>
				<?php
				if (function_exists ('settings_fields')){
					settings_fields ('gdocs-options');
				}else {
				?>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="gdocs_user,gdocs_pwd,gdocs_proxy_host,gdocs_proxy_port,gdocs_proxy_user,gdocs_proxy_pwd,gdocs_cache_expiry,gdocs_style_dir" />
				<?php 
					wp_nonce_field ('update-options');	
				}
				?>
			
	<?php
	
	}

	/**
	 * Prints login credentials input form
	 */
	public static function printLogin (){
	?>
	
				<!-- Login Credentials -->
				<h3>Google Account Login</h3>
				<table class='form-table'>
					<tbody>
						<tr valign="top">
							<th scope="row"><label for='gdocs_user'>Username</label></th>
							<td><input id='gdocs_user' type="text" size="40" name="gdocs_user" value="<?php echo get_option ('gdocs_user'); ?>" /><br/><span class='description'><strong>For Google Apps users, append your username with </strong><code>@yourdomain.com</code></span></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for='gdocs_pwd'>Password</label></th>
							<td><input id='gdocs_pwd' type="password" size="40" name="gdocs_pwd" value="<?php echo get_option ('gdocs_pwd'); ?>" /></td>
						</tr>
					</tbody>
				</table>
	
	<?php
	}
	
	/**
	 * Prints proxy settings input form
	 */
	public static function printProxy (){
	?>
	
				<!-- Proxy Settings -->
				<h3>Proxy Settings</h3>
				<span class='description'>Leave this section blank if your host is not behind a proxy.</span>
				<table class='form-table'>
					<tbody>
						<tr valign="top">
							<th scope="row"><label for="gdocs_proxy_host">Host</label></th>
							<td><input type="text" size="40" name="gdocs_proxy_host" id="gdocs_proxy_host" value="<?php echo get_option ('gdocs_proxy_host'); ?>" /></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="gdocs_proxy_port">Port</label></th>
							<td><input type="text" size="40" name="gdocs_proxy_port" id="gdocs_proxy_port" value="<?php echo get_option ('gdocs_proxy_port'); ?>" /></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="gdocs_proxy_user">Username</label></th>
							<td><input type="text" size="40" name="gdocs_proxy_user" id="gdocs_proxy_user" value="<?php echo get_option ('gdocs_proxy_user'); ?>" /></td>
						</tr>
						<tr valign="top">
							<th scope="row"><label for="gdocs_proxy_pwd">Password</label></th>
							<td><input type="password" size="40" name="gdocs_proxy_pwd" id="gdocs_proxy_pwd" value="<?php echo get_option ('gdocs_proxy_pwd'); ?>" /></td>
						</tr>
					</tbody>
				</table>
	
	<?php
	}
	
	/**
	 * Prints cache settings input form
	 */
	public static function printCache (){
	?>
	
				<!-- Cache Settings -->
				<h3>Cache Settings</h3>
				<table class='form-table'>
					<tbody>
						<tr valign="top">
							<th scope="row"><label for='gdocs_cache_expiry'>Lifespan</label></th>
							<td><input type="text" size="40" id='gdocs_cache_expiry' name="gdocs_cache_expiry" value="<?php echo get_option ('gdocs_cache_expiry'); ?>" /><span class='description'>minutes</span><br/><span class='description'><strong>Set to <code>0</code> to turn off caching.</strong></span></td>
						</tr>
					</tbody>
				</table>
	
	<?php
	}
	
	/**
	 * Prints style settings input form
	 */
	public static function printStyle (){
	?>
				
				<!-- Stylesheet Settings -->
				<h3>Stylesheet Settings</h3>
				<table class='form-table'>
					<tbody>
						<tr valign='top'>
							<th scope='row'><label for='gdocs_style_dir'>Directory</label></th>
							<td><span class='description'><?php bloginfo ('wpurl')?>/</span><input type='text' size="30" id="gdocs_style_dir" name="gdocs_style_dir" value="<?php echo get_option ('gdocs_style_dir'); ?>" /><br /><span class='description'><strong>Specify the directory where you keep your CSS stylesheets in.</strong></span></td>
						</tr>
					</tbody>
				</table>
				
	<?php
	}
	
	/**
	 * Prints foot of configuration page
	 */
	public static function printFoot (){
	?>		
				<p class='submit'>
					<input type='submit' name='Submit' value="<?php _e('Save changes') ?>" class='button-primary' />
				</p>				
				
			</form>
		</div>
		
	<?php
	}
	
	/**
	 * Prints list of documents
	 */
	public static function printDocList (){
		
	?>
		<div id='gdocs_right'>
			<!-- Document List -->
			<h3>Google Documents <small><code id='dc' style='display:none'><span></span> documents</code></small></h3>
			<small>Use the corresponding Document ID in your shortcode.<br />
			<span style="color: blue">[gdocs id=<em>doc_id</em> type='document']</span></small>
			<table class='hor-zebra'>
				<thead>
					<tr><th>Title</th><th>Document ID</th></tr>
				</thead>
				<tbody id='gdocs_list_document'>
					<tr class='gdocs_loader'><td>Loading...</td><td class='gdocs_loader'></td></tr>
				</tbody>
			</table>
	<?php
		
	}
	
	/**
	 * Prints list of spreadsheets
	 */
	public static function printStList (){
		
	?>
			<!-- Spreadsheet List -->
			<h3>Google Spreadsheets <small><code id='sc' style='display:none'><span></span> spreadsheets</code></small></h3>
			<small>Use the corresponding Spreadsheet ID and Worksheet ID in your shortcode.<br />
			<span style="color: blue">[gdocs st_id=<em>spreadsheet_id</em> wt_id=<em>worksheet_id</em> type='spreadsheet']</span></small>
	
			<table class='hor-zebra'>
				<thead>
					<tr><th>Title</th><th>Spreadsheet ID</th><th>Worksheets</th></tr>
				</thead>
				<tbody id='gdocs_list_spreadsheet'>
					<tr class='gdocs_loader'><td>Loading...</td><td class='gdocs_loader'></td><td></td></tr>
				</tbody>
			</table>
		</div>
		<p style='clear:both'></p>
	</div>
		
	<?php
	
	}
	
	/**
	 * Prints cache not writable
	 */
	public static function printCacheNotWritableError (){
		$user = exec ('whoami');
		$grp = exec ("groups {$user}");
		$grp = str_replace (' ', ', ', $grp);
	?>
		<div class='error' id='message_100' style='background-color: rgb(255, 170, 150);'><p><strong><?php _e("The cache folder is not writable.<br/>Current user: <code>{$user}</code> | Groups: <code>$grp</code>") ?></strong></p></div>
	<?php
	}
	
	/**
	 * Prints log not writable
	 */
	public static function printLogNotWritableError (){
		$user = exec ('whoami');
		$grp = exec ("groups {$user}");
		$grp = str_replace (' ', ', ', $grp);
	?>
		<div class='error' id='message_101' style='background-color: rgb(255, 170, 150);'><p><strong><?php _e("The <a href='" . GDOCS_ADDRESS . "/cache/error.log.php'>log file</a> is not writable.<br/>Current user: <code>{$user}</code> | Groups: <code>$grp</code>") ?></strong></p></div>
	<?php
	}
	
	/**
	 * Prints CAPTCHA verfication form
	 * @param	Zend_Gdata_App_CaptchaRequiredException $e
	 * @return	string	$html	HTML string
	 */
	public static function printCaptchaError (Zend_Gdata_App_CaptchaRequiredException $e){
		$obj = strpos ($_SERVER['HTTP_REFERER'], 'options-general.php') === FALSE ? 'GDocs' : 'GDocsOptions';
		return 
		"Google requested CAPTCHA verification.<br/>
		<img src='" . $e->getCaptchaUrl() . "' style='margin:5px 0 4px' />
		<form method='post' action='options.php' onsubmit='javascript: {$obj}.verify (this); return false;'>
			<input type='hidden' name='gdocs_token' id='gdocs_token' value='" . $e->getCaptchaToken() . "'  />
			<input type='text' name='gdocs_captcha' size='40' id='gdocs_captcha' />
			<input type='submit' value='Submit' onclick='javascript: {$obj}.verify (this); return false;' />
		</form>";
	}
	
	/**
	 * Prints a postbox in the edit-post / edit-page page
	 * Lists all Google documents and Google Spreadsheets
	 * Lets user add shortcode tag to post by clicking
	 * @param	array	$results	array of rows returned from the database
	 */
	public static function printHelper ($results){
	
		$html = ""; $doc_count = 0;
	
		if ($results) {
			
			foreach ($results as $row){
				// <a href='#' onclick="javascript: GDocs.ring('MAIN_ID+SUB_ID', 'TYPE', 'TITLE'); return false;" id='MAIN_ID+SUB_ID+type'>
				$sub = $row->sub_title ? "<br/>[" . $row->sub_title . "]" : "";
				$html .= sprintf ("<span class='gdocs_%s'><a href='#' onclick=\"javascript: GDocs.ring ('%s+%s', '%s'); return false;\" id='%s+%s'>%s{$sub}</a></span>", $row->type, $row->main_id, $row->sub_id, $row->type, $row->main_id, $row->sub_id, $row->title, $row->sub_title);
				if ($row->type === 'document') $doc_count++;
			}
			
		}
	
	?>
		<!-- Begin G Docs Helper -->
		<style type='text/css'>
			div#gdocs_helper .inside span{
				display:block;
				float:left;
				margin:10px 0;
				min-height:110px;
				width:160px;
				text-align:center;
			}
			
			div#gdocs_helper .inside span a{
				position:relative;
				top:80px;
				line-height:1.3em;
			}
			
			div#gdocs_helper .inside img{
				border: 0 none;
			}
			div#gdocs_helper h3 a{
				float: right;
			}
			div#gdocs_helper h3 small{
				float: right;
				padding-right: 10px;
			}
			
			.gdocs_error {
				border-width: 1px;
				border-style: solid;
				border-color: red;
				padding: 0 0.6em;
				margin: 5px 15px 2px;
				-moz-border-radius: 3px;
				-khtml-border-radius: 3px;
				-webkit-border-radius: 3px;
				border-radius: 3px;
			}
			
			.gdocs_error p {
				margin: 0.5em 0;
				line-height: 1;
				padding: 2px;
			}
			
			span.gdocs_document {
				background:transparent url("<?php echo GDOCS_ADDRESS ?>/inc/img/document.png") no-repeat center top;
			}
			span.gdocs_document:hover {
				background:transparent url("<?php echo GDOCS_ADDRESS ?>/inc/img/document_highlight.png") no-repeat center top;
			}
			
			span.gdocs_spreadsheet {
				background:transparent url("<?php echo GDOCS_ADDRESS ?>/inc/img/spreadsheet.png") no-repeat center top;
			}
			span.gdocs_spreadsheet:hover {
				background:transparent url("<?php echo GDOCS_ADDRESS ?>/inc/img/spreadsheet_highlight.png") no-repeat center top;
			}
		</style>
		<div id='gdocs_helper' class='postbox open'>
			<h3><a href="#" onclick="javascript: GDocs.updateList(); return false;"><img id='gdocs_helper_ajax' src='<?php echo GDOCS_ADDRESS . "/inc/img/ajax-refresh.png" ?>' /></a>Google Documents/Spreadsheets <small><code id='count'><span><?php echo $doc_count ?></span> documents | <span><?php echo (sizeof($results) - $doc_count) ?></span> worksheets</code></small></h3>			
			<div class='inside'>
				<noscript><div class='gdocs_error' id='gdocs_js_error' style='background-color: rgb(255, 170, 150);'><p><strong><?php _e("Enable Javascript to use this panel.") ?></strong></p></div></noscript>
				<?php
				if ($results) echo $html; 
				else {
				?>
				<div class='gdocs_error' id='message' style='background-color: rgb(255, 170, 150);'><p><strong><?php _e("The plugin was unable to connect to the database. Refresh this box to see the list of documents and spreadsheets available.") ?></strong></p></div>
				<?php } ?>
			</div>
			<div style="clear:both"></div>
		</div>
		<!-- End G Docs helper -->
	<?php
	}
	
	/**
	 * Formats and prints tablesorter initialization script
	 * @param	string	$st_id	spreadsheet id
	 * @param	string	$wt_id	worksheet id
	 * @param	string	$params	parameters to pass to tablesorter
	 */
	public static function printSortScript ($st_id, $wt_id, $params){
		return 
		"<script type='text/javascript' language='javascript'>
			jQuery(document).ready(function() { 
        		jQuery('#gdocs_{$st_id}_{$wt_id}').tablesorter({$params});
			});
		</script>";
	}
	
	/**
	 * Formats div tag for document
	 * @param	string	$id			id of document
	 * @param	string	$content	html to embed
	 * @param	string	$style		style classes to include
	 * @return	string	$html		formatted string
	 */
	public static function printDocTag ($id, $style=NULL){
		$classes = preg_split ("/,(\s)?/", $style);
		$classes = implode (' ', $classes);
		return "<div class='gdocs {$classes}' id='gdocs_{$id}'>";
	}
	
	/**
	 * Formats table tag
	 * @param	string			$st_id		spreadsheet id
	 * @param	string			$wt_id		worksheet id
	 * @param	string			$style		predefined stylesheet
	 * @return	string			$html		formatted table tag
	 */
	public static function printStTblTag ($st_id, $wt_id, $style = NULL){
		/*
		 * class=$st_id to identify with a certain spreadsheet
		 * id=$st_id $wt_id to make this worksheet unique
		 * class=gdocs allows global styles to be set across all Google Docs/Spreadsheets
		 * class=$style to associate this table with a predefined stylesheet
		 */
		$classes = preg_split ("/,(\s)?/", $style);
		$classes = implode (' ', $classes);
		return "<table class='gdocs gdocs_{$st_id} {$classes}' id='gdocs_{$st_id}_{$wt_id}'>\r\n";
	}
	
	/**
	 * Formats HTML to display spreadsheet content in a table
	 * @param	Zend_Gdata_Feed	$feed		list feed
	 * @param	string			$headers	comma-separated custom column titles to replace original titles with
	 */
	public static function printStTbl (Zend_Gdata_Feed $feed, $headers = NULL){
		
		// convert to spreadsheet list feed object
		$feed = new Zend_Gdata_Spreadsheets_ListFeed ($feed->getDom ());
		
		// if headers are specified or entries are given
		if (isset ($headers) || $feed->entries[0]){
			
			// start <thead>
			$html .= "\t<thead>\r\n";
			$html .= "\t\t<tr class='row_0'>\r\n\t\t\t";
				
			$k = 0;
			
			if (isset ($headers)){
				// custom headers given
				$colHeads = preg_split ("/,(\s)?/", $headers);
				
				// get all the headers specified by user
				foreach ($colHeads as $colHead){
					$colax = $k%2==0 ?'odd' : 'even';
					$html .= "<th class='col_{$k} {$colax}'>" . $colHead . "</th>";
					$k++;
				}
			
			}
				
			if ($feed->entries[0]){
				// custom headers not given
				
				// extract column headings
				$firstRow = $feed->entries[0]->getCustom ();
				
				// if  user did not specify all, get rest from list feed
				while ($colHead = $firstRow [$k]){
					$colax = $k%2==0 ?'odd' : 'even';
					$html .= "<th class='col_{$k} {$colax}'>" . $colHead->getColumnName () . "</th>";
					$k++;
				}
				
				
			}
			
			// end <thead>
			$html .= "\r\n\t\t</tr>\r\n";
			$html .= "\t</thead>\r\n";
			
		}
		
		$html .= "\t<tbody>\r\n";
	
		// for every row
		$i = 1;
		foreach ($feed->entries as $entry){
		
			$rowlax = $i%2!=0 ?'odd' : 'even';
			
			// start table row
			$html .= "\t\t<tr class='row_{$i} {$rowlax}'>\r\n\t\t\t";
			
			// get all the cells in this row
			$cells = $entry->getCustom ();
			
			// for every cell, display the contents
			$j = 0;
			foreach ($cells as $cell){
				$colax = $j%2!=0 ?'even' : 'odd';			
				$html .= "<td class='col_{$j} {$colax}'>" . $cell->getText () . "</td>";
				$j++;
			}
			
			// end table row
			$html .= "\r\n\t\t</tr>\r\n";
			$i++;
			
		}
		
		$html .= "\t</tbody>\r\n";		
		$html .= "</table>\r\n";
		
		return $html;
	
	}
	
	/**
	 * Formats <span> tag for cell
	 * @param	string	$st_id		Spreadsheet ID
	 * @param	string	$wt_id		Worksheet ID
	 * @param	string	$cell_id	Cell ID
	 * @param	string	$style		Style classes to include
	 */
	public static function printCellTag ($st_id, $wt_id, $cell_id, $style=NULL){
		$classes = preg_split ("/,(\s)?/", $style);
		$classes = implode (' ', $classes);
		return "<span class='gdocs {$classes}' id='gdocs_{$st_id}_{$wt_id}_{$cell_id}'>";
	}
	
	/**
	 * Formats contents of spreadsheet cell for display
	 */
	public static function printCell (Zend_Gdata_Feed $feed){
		$entry = new Zend_Gdata_Spreadsheets_CellEntry ($feed[0]->getDOM());
		return $entry->getCell()->getText() . "</span>";
	}
	
	/**
	 * Prints stylesheet <link>
	 * @param	string	$style	Style classes for this spreadsheet
	 * @return	string	$html	<style> tag to add to the HTML output
	 */
	public static function printStylesheet ($style){
		
		// split style classes
		$classes = preg_split ("/,(\s)?/", $style);
		
		// parse gdocs_style_dir option
		$dir = get_option ('gdocs_style_dir');
		if ($dir){
			if ($dir[strlen ($dir) -1] !== "/") $dir .= "/";	// if no ending slash, add ending slash
			if ($dir[0] !== "/") $dir = "/" . $dir;				// if no starting slash, add starting slash
		}
		
		$html = "";
		
		foreach ($classes as $class){
		
			if (in_array ($class, self::$stylesheets)) continue;
			self::$stylesheets[] = $class;
			
			if (file_exists (ABSPATH . $dir . "{$class}.css")){
				$path = get_bloginfo ('wpurl') . $dir . "{$class}.css";
				$html .= "<link href='{$path}' rel='stylesheet' type='text/css' />\r\n";
			}else if (file_exists (ABSPATH . $dir . "{$class}/{$class}.css")) {
				$path = get_bloginfo ('wpurl') . $dir . "{$class}/{$class}.css";
				$html .= "<link href='{$path}' rel='stylesheet' type='text/css' />\r\n";
			}else if (file_exists (GDOCS_PATH . "/styles/{$class}.css")){
				$path = GDOCS_ADDRESS . "/styles/{$class}.css";
				$html .= "<link href='{$path}' rel='stylesheet' type='text/css' />\r\n";
			}else if (file_exists (GDOCS_PATH . "/styles/{$class}/{$class}.css")) {
				$path = GDOCS_ADDRESS . "/styles/{$class}/{$class}.css";
				$html .= "<link href='{$path}' rel='stylesheet' type='text/css' />\r\n";
			}

		}
		return $html;
	
	}
	
	/**#@-*/

}
?>
