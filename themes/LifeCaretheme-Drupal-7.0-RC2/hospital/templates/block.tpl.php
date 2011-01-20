<?php
/**
 * @package Global Education Business Theme - Adodis Drupal Theme
 * @version 1.1 November 25, 2010
 * @author Adodis Theme http://www.drupal-themes.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
/**
 * $block_html_id - Its generate the default id for the each block
 * $class_suffix - used for block variation
 * $block->subject - Generate the title
 */
 ?>
<div id="block-<?php print $block->module; ?>-<?php print $block->delta;?>" class = "<?php print $class_suffix; ?> region-block contextual-links-region"<?php print $attributes; ?>>
<?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
		<?php if($block->region=='content'): ?>
			<h1 class="subject"<?php print $title_attributes; ?>>
				<?php echo $block->subject; ?>
			</h1>
		<?php else: ?>
			<h2 class="subject"<?php print $title_attributes; ?>>
				<?php echo $block->subject; ?>
			</h2>
		<?php endif; ?>
	<?php endif; ?>
					<?php print render($title_suffix); ?>
			<div class="<?php print $region_class; ?> clearfix"<?php print $content_attributes; ?>>
				<?php echo $content; ?>
			</div>
</div>

<!-- ************** Created for sign up box layout ******************** -->
