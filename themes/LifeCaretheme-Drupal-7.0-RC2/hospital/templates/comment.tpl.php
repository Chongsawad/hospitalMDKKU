<?php
/**
 * @package hospital Parlour Business Theme - Adodis Drupal Theme
 * @version 1.1 November 25, 2010
 * @author Adodis Theme http://www.drupal-themes.adodis.com
 * @copyright Copyright (C) 2010 Adodis Drupal Theme
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="comment-block clearfix">
		<div id="comment-left" class="clearfix">
    	<?php if ($new): ?>
     		 <span class="new"><?php print $new; ?></span>
    	<?php endif; ?>

    	<?php print render($title_prefix); ?>
	    <h4<?php print $title_attributes; ?>>
	    	<?php print $title; ?>
	    </h4>
    	<?php print render($title_suffix); ?>
    	<div class="content"<?php print $content_attributes; ?>>
	      <?php hide($content['links']);
	        print render($content);
	      ?>
		  <?php if ($signature): ?>
		      <div class="clearfix">
		        <?php print $signature; ?>
		      </div>
      	 <?php endif; ?>
   		</div> 

   		 <?php print render($content['links']); ?>
 	</div>
    <div class="user-pic">
        <?php print $picture; ?>
        <?php print $author; ?>
        <?php print $created; ?>
        <?php print $permalink; ?>
     </div>
   </div> 
</div>
