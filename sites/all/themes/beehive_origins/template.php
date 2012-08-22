<?php
	function custom_top_menu($search,$primary_links_tree) {
		global $user;
		$output = '';
		$output .= '<ul id="top-menu" class="top-menu">';
		$output .= '<li class="top-menu-name"><a href="'.url('<front>').'">תמיכה</a></li>';
		$output .= '<div class="top-menu-menu-block">';
		if (user_is_logged_in()) {
			$output .= '<li><a href="'.url('logout').'">יציאה</a></li>';
		}
		else {
			$output .= '<li class="top-menu-login"><a href="'.url('user').'">כניסה</a></li>';
		}
		$output .= '<li><a href="'.url('stream').'">עדכונים</a></li>';
		$output .= '<li><a href="'.url('page/תמיכה').'">תמיכה</a></li>';
		$output .= '<li><a href="'.url('content/אודות-הכוורת-וייזמיה').'">אודות</a></li>';
		$output .= '<li><a href="'.url('page/צור-קשר').'">צור קשר</a></li>';
		$output .= '<li class="top-menu-search">'.$search.'</li>';
		$output .= '</div>';
		$output .= '<div class="top-menu-user-block">';
		$output .= '<li class="top-menu-logo">הכוורת</li>';
		if (user_is_logged_in())
			$output .= '<li class="top-menu-welcome"><span>ברוך שובך </span><span>'.$user->name.'</span></li>';
		if (isset($user->picture))
			$output .= '<li class="top-menu-picture">'.theme('imagecache', 'group_images_thumb', $user->picture, 'User Picture', 'User Picture').'</li>';
		$output .= '</div>';
		$output .= '</ul>';

		return $output;
	}

/**
* Override or insert PHPTemplate variables into the search_theme_form template.
*
* @param $vars
*   A sequential array of variables to pass to the theme template.
* @param $hook
*   The name of the theme function being called (not used in this case.)
*/
function beehive_origins_preprocess_search_theme_form(&$vars, $hook) {
  // Remove the "Search this site" label from the form.
  $vars['form']['search_theme_form']['#title'] = t('');
  
  // Set a default value for text inside the search box field.
  $vars['form']['search_theme_form']['#value'] = t('');
  
  // Add a custom class and placeholder text to the search box.
  $vars['form']['search_theme_form']['#attributes'] = array('class' => 'NormalTextBox txtSearch', 'onblur' => "if (this.value == '') {this.value = '".$vars['form']['search_theme_form']['#value']."';} ;", 'onfocus' => "if (this.value == '".$vars['form']['search_theme_form']['#value']."') {this.value = '';} ;" );

  
  // Change the text on the submit button
  //$vars['form']['submit']['#value'] = t('Go');

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_theme_form']['#printed']);
  $vars['search']['search_theme_form'] = drupal_render($vars['form']['search_theme_form']);

  // $vars['form']['submit']['#type'] = 'image_button';
  // $vars['form']['submit']['#src'] = path_to_theme() . '/images/search.jpg';
    
  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['form']['submit']['#type'] = 'image_button';
  $vars['form']['submit']['#src'] = path_to_theme() . '/images/top_magnify.jpg';

  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}

/**
* Cearet new TPL for ragister ( we need this for the welcome message)
**/
function beehive_origins_theme() {
  return array(
    'user_register' => array(
      'template' => 'user-register',
      'arguments' => array('form' => NULL),
    ),
  );
}
/**
* Implementation of preprocess_user_register
**/
function beehive_origins_preprocess_user_register(&$variables) {
  if(isset($_GET['invite-group'])){
    $group_name = htmlspecialchars($_GET['invite-group']);
    $variables['intro_text'] = t("Welcome to the group") . " \"" . $group_name . "\""  ;
  }
 // $variables['rendered'] = drupal_render($variables['form']['name']);
  //$variables['rendered'] .= drupal_render($variables['form']['pass']);
  //}else{
     $variables['rendered'] = drupal_render($variables['form']);
  
}


