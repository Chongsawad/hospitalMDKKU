<?php // $Id$

// we define a global tag to use in diferent templates
define('OUTTAG', ( theme_get_setting('outside_tags') ? 'p' : 'h2' ) );

include_once('theme/theme.inc');
include_once('logics/layout.inc');
include_once('logics/banners.inc');

/**
 * Additional page variables
 */
function marinelli_preprocess_page(&$vars) {
  // Useful for devel default banners, remove before commit
  //   variable_del('theme_marinelli_first_install');
  // Chcek if is first setup of marinelli and install banners.
  if (variable_get('theme_marinelli_first_install', TRUE)) {
    include_once('theme-settings.php');
    _marinelli_install();
  }
  
  // theme vars
  $vars['usebanner']   = (theme_get_setting('banner_usage') != 0) ? TRUE : FALSE;
  // Set $page['advertise'] to hide advertise space (if not used).
  $vars['page']['advertise'] = $vars['usebanner'] ? FALSE : $vars['page']['advertise'];
  $vars['border']       = TRUE;
  $vars['layout_width'] = marinelli_page_width(theme_get_setting('layout_width'));
  $vars['layoutType']   = theme_get_setting('layout_type');

  // special var that checks if we have the top region
  $vars['topRegion'] = TRUE;
  if (!$vars['logo'] && !$vars['site_name'] && !$vars['site_slogan'] && !$vars['page']['utility_top'] && !$vars['page']['search']) {
  	$vars['topRegion'] = FALSE;
  }
  
  // topbar Link
  $vars['topbarlink'] = l('&darr; ' . t(check_plain(theme_get_setting('bartext'))), current_path(),
    array(
      'attributes' => array(
        'title' => 'Open this region',
        'class' => array('openregion marinelli-hide-no-js'),
      ),
      'html' => TRUE
    )
  );

  // pass the text variables to javascript
  drupal_add_js(
    array(
      'marinelli' => array(
        'bartext'  => theme_get_setting('bartext'),
        'bartext2' => theme_get_setting('bartext2'),
      )
    ),
    array('type' => 'setting')
  );

  // LOGO SECTION ==============================================================
  // site logo
  $vars['imagelogo'] = theme('image', array(
    'path' => $vars['logo'],
    'alt'  => $vars['site_name'],
    'getsize' => FALSE,
    'attributes' => array('id' => 'logo'),
  ));

  $vars['imagelogo'] = l(
    $vars['imagelogo'],
    '<front>',
    array(
      'html' => TRUE,
      'attributes' => array(
        'title' => t('Back to homepage'),
      )
    )
  );

  // HEADER SECTION ============================================================
  // site title and slogan: use h1 and h2 for front page, otherwise use <p>
  $title_tag  = $vars['is_front'] && theme_get_setting('title_tags')== 0 ? 'h1' : 'p';
  $slogan_tag = $vars['is_front'] && theme_get_setting('title_tags')== 0 ? 'h2' : 'p';

  $vars['sitename']  = '<' . $title_tag . ' id="site-title">';
  $vars['sitename'] .= l($vars['site_name'], '<front>', array('attributes' => array('title' => t('Back to homepage')),'html' => TRUE));
  $vars['sitename'] .= '</' . $title_tag . '>';

  $vars['siteslogan']  = '<' . $slogan_tag . ' id="site-slogan">';
  $vars['siteslogan'] .= l($vars['site_slogan'], '<front>', array('attributes' => array('title' => t('Back to homepage')),'html' => TRUE));
  $vars['siteslogan'] .= '</' . $slogan_tag . '>';

  // MENU SECTION ==============================================================
  // secondary links with <span>
  $links = $vars['secondary_menu'];

  foreach ($links as $key => $link) {
    $links[$key]['html'] = TRUE;
    $links[$key]['title'] = '<span>' . $link['title'] . '</span>';
  }

  $vars['secondary_menu'] = $links;

  // primary links markup
  if (theme_get_setting('menu_type') == 2) { // use mega menu
    $vars['mainmenu'] = theme('mega_menu', array('menu' => menu_tree_all_data('main-menu')));
  }
  elseif (theme_get_setting('menu_type') == 1) {
    if (theme_get_setting('menu_headings') == 1) { // use classic <li>
      $vars['mainmenu'] = theme('links', array('links' => $vars['main_menu'], 'attributes' => array('id' => 'primary', 'class' => array('links', 'clearfix', 'main-menu'))));
    }
    elseif (theme_get_setting('menu_headings') == 2){ // use <h2> (custom_links in theme/theme.inc)
      $vars['mainmenu'] = theme('custom_links', array('links' => $vars['main_menu'], 'attributes' => array('id' => 'primary', 'class' => array('links', 'clearfix', 'main-menu'))));
    }
  }

  // BANNER SECTION ============================================================
  // Banner to display
  $banners = marinelli_show_banners();

  // Banners section
  $vars['banner_image'] = marinelli_banners_markup($banners);
  $vars['banner_text'] = '';
  $vars['banner_nav'] = '';

  // Display text only if there are some banner visibile and visivility settings is true
  if ($banners && theme_get_setting('banner_showtext')) {
    // Banner text markup
    $vars['banner_text'] = theme('mbanner_text');
  }

  // Display nav only if there more then one banner visibile and visivility settings is true
  if ($banners && (count($banners) > 1) && theme_get_setting('banner_shownavigation')) {
    // Banner navigation markup
    $vars['banner_nav'] = theme('mbanner_nav', array(
      'prev' => t('Previous Ad'),
      'next' => t('Next Ad'),
    ));
  }

  // OTHER SETTINGS ============================================================
  if (!$vars['page']['advertise'] && !$vars['banner_image']) {
    $vars['noborder'] = 'class="noborder"';
  } else {
    $vars['noborder'] = '';
  }
}


/**
 * Additional node variables
 */
function marinelli_preprocess_node(&$vars){
	$vars['sticky_text'] = theme_get_setting('sticky_text');
	$type=$vars['type'];
	if($vars['teaser']) { // custom teaser templates
		$vars['theme_hook_suggestions'][] = 'node__teaser';
    }
    if($vars['teaser'] && $vars['type']){
    	$vars['theme_hook_suggestions'][] = 'node__'.$type.'__teaser';
    }
}

/**
 * Additional block variables
 */
function marinelli_preprocess_block(&$vars){ // title visibility
	$vars['blockhide'] = "";
	if (($vars['block']->region != "sidebar_first" && $vars['block']->region != "sidebar_second" && theme_get_setting('blocks') == 1) || ($vars['block']->region == "utility_top" || $vars['block']->region == "utility_bottom")) {
		$vars['blockhide'] = "blockhide ";
	}
	
	// block title tag depends on theme settings and region
	
	$vars['blocktag'] = "h2";
	if($vars['block']->region == "topbar" || $vars['block']->region == "utility_top" || $vars['block']->region == "search" || $vars['block']->region == "advertise" || $vars['block']->region == "overcontent" || $vars['block']->region == "overnode") {
		$vars['blocktag'] = OUTTAG;	
	}
}

/**
 * Additional comment variables
 */
function marinelli_preprocess_comment(&$vars) {
	$vars['classes_array'][] = $vars['zebra'];
  if (isset($vars['user']->picture)) {
    $picture = file_load($vars['user']->picture);
    $user_image = image_get_info(image_style_path(variable_get('user_picture_style'), $picture->uri));
  } else {
    $user_image = array('width' => 0);
  }
  $vars['image_width'] = $user_image['width'] + 25;
}


function marinelli_preprocess_html(&$vars){
  // CSS3 effects: load modernizer and the stylesheets
  $css_typo = theme_get_setting('css_typo');

  if (theme_get_setting('css') == 1) {
    drupal_add_js(drupal_get_path('theme','marinelli')  . '/js/modernizer/modernizr.js');
    drupal_add_css(path_to_theme() . '/css/css3/css3.css', array('group' => CSS_THEME + 1,'every_page' =>TRUE));
    drupal_add_css(path_to_theme() . '/css/css3/css3_graphics.css', array('group' => CSS_THEME + 2,'every_page' =>TRUE));
    if ($css_typo == 2) {
      drupal_add_css(path_to_theme() . '/css/css3/css3_fonts.css', array('group' => CSS_THEME + 3,'every_page' =>TRUE));
    }
  }

  // Send a js variable to tell topregion js not to hide the region
  if (arg(2)=="block" && arg(3)=="demo") {
    drupal_add_js(
      array(
        'marinelli' => array(
          'blockdemo'  => TRUE
        )
      ),
      array('type' => 'setting')
    );
  }
}

/**
 * Breadcrumb.
 */
function marinelli_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $output = '<'.OUTTAG.' class="element-invisible">' . t('You are here') . '</'.OUTTAG.'>';

    if (theme_get_setting('breadcrumb_title') == 1) { // show the title setting
      $breadcrumb[] = truncate_utf8(drupal_get_title(), theme_get_setting('breadcrumb_title_length'), $wordsafe = TRUE, $dots = TRUE);
    }

    $output .= '<div class="breadcrumb">' . implode(' &raquo; ', $breadcrumb) . '</div>';
    return $output;
  }
}


/**
 * Get banner settings.
 *
 * @param <bool> $all
 *    Return all banners or only active.
 *
 * @return <array>
 *    Settings information
 */
function marinelli_get_banners($all = TRUE) {
  $banners = variable_get('theme_marinelli_banner_settings', array());

  if (!$all) {
    $banners_value = array();
    foreach ($banners as $banner) {
      if ($banner['image_published']) {
        $banners_value[] = $banner;
      }
    }
    return $banners_value;
  } else {
    return $banners;
  }
}

/**
 * Set banner settings.
 *
 * @param <array> $value
 *    Settings to save
 */
function marinelli_set_banners($value) {
  variable_set('theme_marinelli_banner_settings', $value);
}