<?php
/**
 * @package hospital Parlour Business Theme - Adodis Drupal Theme
 * @version 1.1 November 25, 2010
 * @author Adodis Theme http://www.drupal-theme.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/**
 * Setting the theme from the back end
 *
 * @param form values $form
 * @param form state values $form_state
 */
function hospital_form_system_theme_settings_alter(&$form, $form_state) {

	/*
	 * Create the form using Forms API
	 */

if(theme_get_setting('font_resize') || theme_get_setting('menu_style')){
	$form['theme_config'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme settings'),
    '#attributes'    => '',
	);

	$form['theme_config']['font_resize'] = array(
	    '#type'          => 'select',
	    '#title'         => t('Font Re-size option'),
	    '#default_value' => theme_get_setting('font_resize'),
  		'#options'       => array(
                          'yes'   => t('Yes'),
                          'no'    => t('No'),
	),
        '#description'   => t(''),
	);

	$form['theme_config']['menu_style'] = array(
	    '#type'          => 'select',
	    '#title'         => t('Menu Style (Top Menu only)'),
	    '#default_value' => theme_get_setting('menu_style'),
  		'#options'       => array(
                          'superfish'   => t('SuperFish Menu'),
                          'suckerfishmenu'    => t('SuckerFish Menu'),
	),
        '#description'   => t(''),
	);


}
}
