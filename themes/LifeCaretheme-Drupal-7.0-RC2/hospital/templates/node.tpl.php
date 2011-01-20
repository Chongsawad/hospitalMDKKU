<?php
	/**
	 * @package hospital Parlour Business Theme - Adodis Drupal Theme
	 * @version 1.1 November 25, 2010
	 * @author Adodis Theme http://www.drupal-themes.adodis.com
	 * @copyright Copyright (C) 2010 Adodis Drupal Theme
	 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
	 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="node-user-pic">
      <?php print $user_picture; ?>
      <?php print t('Created by !username on !datetime', array('!username' => $name, '!datetime' => $date)); ?>
    </div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>

</div>
