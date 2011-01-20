<?php
/**
 * @package hospital Parlour Business Theme - Adodis Drupal Theme
 * @version 1.1 November 25, 2010
 * @author Adodis Theme http://www.drupal-themes.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>" <?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content-area"><?php print t('Skip to main content area'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
