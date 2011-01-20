<?php

/**
 * @package hospital Parlour Business Theme - Adodis Drupal Theme
 * @version 1.1 November 25, 2010
 * @author Adodis Theme http://www.drupal-themes.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/**
 * Theme Engine functions. Its change the html,page,block layouts
 * @param All variables and values defined by $variables
 */

//pre-process hook_preprocess_search_block_form
function hospital_preprocess_search_block_form(&$variables) {

	/***** Search form Moderation *********/
	$variables['form']['search_block_form']['#title'] = '';
	$variables['form']['search_block_form']['#size'] = 20;
	$variables['form']['search_block_form']['#value'] = 'Enter keyword....';
	$variables['form']['search_block_form']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '".$variables['form']['search_block_form']['#value']."';}", 'onfocus' => "if (this.value == '".$variables['form']['search_block_form']['#value']."') {this.value = '';}" );
	unset($variables['form']['search_block_form']['#printed']);

	$variables['search']['search_block_form'] = drupal_render($variables['form']['search_block_form']);
	$variables['search_form'] = implode($variables['search']);

}

/*
 * Process page
 * pre-process hook_preprocess_page
 */
function hospital_process_page(&$variables){
/*
 $active_trail = menu_get_active_trail();
 echo "karthick"."<pre>";
	print_r($variables) ;


echo "</pre>";*/
	/***** User login form Moderation *********/
	if($variables['page']['sidebar_left']){
		$variables['page']['sidebar_left']['user_login']['links']='';
		$variables['page']['sidebar_left']['user_login']['name']['#title']='';
		$variables['page']['sidebar_left']['user_login']['name']['#value']='User Name';
		$variables['page']['sidebar_left']['user_login']['name']['#required']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#title']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#value']='Password';
		$variables['page']['sidebar_left']['user_login']['actions']['submit']['#value']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#required']='';
		$variables['page']['sidebar_left']['user_login']['pass']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '".$variables['page']['sidebar_left']['user_login']['pass']['#value']."';}", 'onfocus' => "if (this.value == '".$variables['page']['sidebar_left']['user_login']['pass']['#value']."') {this.value = '';}" );
		$variables['page']['sidebar_left']['user_login']['name']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '".$variables['page']['sidebar_left']['user_login']['name']['#value']."';}", 'onfocus' => "if (this.value == '".$variables['page']['sidebar_left']['user_login']['name']['#value']."') {this.value = '';}" );
	}

	/***** Sidebars class defined *********/
	if($variables['page']['sidebar_left'] && $variables['page']['sidebar_right']){
		$variables['switch_column']='three-column';
	}
	elseif($variables['page']['sidebar_left']){
		$variables['switch_column']='two-column-left';
	}
	elseif($variables['page']['sidebar_right']){
		$variables['switch_column']='two-column-right';
	}
	else{
		$variables['switch_column']='one-column';
	}

	/***** User Positions block class defined *********/
	$userbox= 0;
	if ($variables['page']['user1']) $userbox += 1;
	if ($variables['page']['user2']) $userbox += 1;
	if ($variables['page']['user3']) $userbox += 1;
	if ($variables['page']['user4']) $userbox += 1;

	switch ($userbox) {
		case 1:
			$userbox = "one";
			break;
		case 2:
			$userbox = "two";
			break;
		case 3:
			$userbox = "three";
			break;
		case 4:
			$userbox = "four";
			break;
		default:
			$userbox = "";
	}
	$variables['user_column']=$userbox;


	/******* User Positions width Seperatation *********/
	/***** Upper Positions block class defined *********/
	$upperbox= 0;

	if ($variables['page']['upper1']) $upperbox += 1;
	if ($variables['page']['upper2']) $upperbox += 1;


	switch ($upperbox) {
		case 1:
			$upperbox = "one";
			$upper_seperation="";
			break;
		case 2:
			$upperbox = "two";
			$upper_seperation="upperseperate";
			break;
		default:
			$upperbox = "";
			$upper_seperation="";
	}
	$variables['upper_column']=$upperbox;
	$variables['upper_seperation']=$upper_seperation;

	/******* Upper Positions width Seperatation *********/
		/*** footer column **/
		$footer_column= 0;
	if ($variables['page']['footer1']) $footer_column += 1;
	if ($variables['page']['footer2']) $footer_column += 1;
	switch ($footer_column) {
		case 1:
			$footer_column = "one";
			break;
		case 2:
			$footer_column = "two";
			break;

		default:
			$footer_column = "";
	}
	$variables['footer_column']=$footer_column;
		/*** footer column **/

	/*if($variables['page']['user1']){
		$variables['user_position_class']='one-user';
		}
		if($variables['page']['user2']){
		$variables['user_position_class']='two-user';
		}
		if($variables['page']['user3']){
		$variables['user_position_class']='three-user';
		}
		if($variables['page']['user4']){
		$variables['user_position_class']='four-user';
		}*/
}

/*
 * Process Block
 * pre-process hook_preprocess_block(()
 */
function hospital_preprocess_block(&$variables) {

	/******* Side bar left and right class suffix *********/


	if($variables['block']->region=='sidebar_left'){

		$variables['region_class']='block-content';
		$variables['class_suffix']=$variables['class_suffix'];
	}
	elseif($variables['block']->region=='sidebar_right'){
/*$value_reg=block_list($variables['block']->region);
			echo "karthick.<pre>";
			print_r($value_reg);
			echo "karthick1";
print_r($variables);
echo "</pre>";*/

		$variables['region_class']='block-content';
		$variables['class_suffix']=$variables['class_suffix'];
	}
	else{
		$variables['region_class']='content';
		$variables['class_suffix']='';
	}
	if($variables['block']->region=='user1'){
		$variables['user_position_class']='one-user';
	}

	if(theme_get_setting('menu_style')=='superfish'){
		if($variables['block']->region=='navigation'){
			$mainmenu_dv="<div id='naviagtion_menu' class='menu_navigation clearfix'>".$variables['content']."</div>";
			$variables['content']=$mainmenu_dv;
		}
	}

/** Assigning first and last name for block in all regions **/

	static $counts;
    if(!isset($counts)) $counts = array();
    $region = $variables['block']->region;
    if(!isset($counts[$region]))
    $counts[$region] = count(block_list($region));


    $count = $counts[$region];
    $extremity = '';
    if($variables['block_id'] == 1)

    {
     $extremity = 'first';

    }
    if($variables['block_id'] == $count)

    { $extremity = 'last';

    }
   $variables['class_suffix'] .= $extremity != '' ? ' ' . $extremity : '';
    //  $variables['class_suffix'] .= $extremity  ?  $extremity : '';

/** Assigning first and last name for block **/


}

function hospital_preprocess_html(&$variables) {



	// Add conditional stylesheets for IE
	if(theme_get_setting('menu_style')=='superfish' || theme_get_setting('slideshow')=='yes'){
		drupal_add_js(path_to_theme().'/js/jquery-1.4.4.js');
	}
	if(theme_get_setting('slideshow')=='yes'){
		drupal_add_js(path_to_theme() . '/js/slideshow.js');
	}

	drupal_add_js(path_to_theme().'/js/superfish.js');

	if(theme_get_setting('menu_style')=='superfish'){
		drupal_add_css(path_to_theme() . '/css/superfish-menu.css');
		drupal_add_js('jQuery(function(){ jQuery("ul.menu").superfish(); });','inline');
	}
	else{
		drupal_add_css(path_to_theme() . '/css/suckerfish-menu.css');
	}
}

function hospital_menu_link(array $variables) {
 /* $element = $variables['element'];
  $sub_menu = '';

 if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  if (strpos( $element['#href'], 'fake.link')) {
    $output = '<a href="#" class="nolink">' . $element['#title'] . '</a>';
  } else {
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";*/

$element=$variables['element'];

$link = $variables['element']['#original_link'];
$class = implode(" ",$variables['element']['#attributes']['class']);
$class = "menu-".$variables['element']['#original_link']['mlid']." ".$class;

  $output = '<li class="'.$class.'">';
  if (isset($link['href'])) {
    $output .= link_create($link['title'], $link['href'], isset($link['localized_options']) ? $link['localized_options'] : array());
  }
  elseif (!empty($link['localized_options']['html'])) {
    $output .= $link['title'];
  }
  else {
    $output .= check_plain($link['title']);
  }
if ($element['#below']) {
    $output .= drupal_render($element['#below']);
  }
  $output .= "</li>\n";
  return $output;
}


function link_create($text, $path, array $options = array()) {
global $language_url;
static $use_theme = NULL;

// Merge in defaults.
$options += array(
'attributes' => array(),
'html' => FALSE,
);

if (($path == $_GET['q'] || ($path == '<front>' && drupal_is_front_page())) &&
(empty($options['language']) || $options['language']->language == $language_url->language)) {
$options['attributes']['class'][] = 'active';
}

if (isset($options['attributes']['title']) && strpos($options['attributes']['title'], '<') !== FALSE) {
$options['attributes']['title'] = strip_tags($options['attributes']['title']);
}
if (!isset($use_theme) && function_exists('theme')) {
if (variable_get('theme_link', TRUE)) {
drupal_theme_initialize();
$registry = theme_get_registry();
$use_theme = !isset($registry['link']['function']) || ($registry['link']['function'] != 'theme_link');
$use_theme = $use_theme || !empty($registry['link']['preprocess functions']) || !empty($registry['link']['process functions']) || !empty($registry['link']['includes']);
}
else {
$use_theme = FALSE;
}
}
if ($use_theme) {
return theme('link', array('text' => $text, 'path' => $path, 'options' => $options));
}
return '<a href="' . check_plain(url($path, $options)) . '"' . drupal_attributes($options['attributes']) . '><span>' . ($options['html'] ? $text : check_plain($text)) . '</span></a>';
}

