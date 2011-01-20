<?php
/**
 * @package hospital Parlour Business Theme - Adodis Drupal Theme
 * @version 1.1 November 25, 2010
 * @author Adodis Theme http://www.drupal-themes.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>

<div id="maintenane-page-wrapper">

  <div class="maintenance"><div class="section clearfix">

	<?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">

        <?php if ($site_name): ?>

          <?php if ($title): ?>
            <div id="site-name">
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>

          <?php else: ?>

            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>

        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan">
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div>
    <?php endif; ?>

  </div></div>

  <div id="content" class="content-part"><div class="section">

      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print $content; ?>
      <?php if ($messages): ?>
        <div id="messages"><div class="section clearfix">
          <?php print $messages; ?>
        </div></div>
      <?php endif; ?>

  </div></div>

</div>

</body>
</html>
