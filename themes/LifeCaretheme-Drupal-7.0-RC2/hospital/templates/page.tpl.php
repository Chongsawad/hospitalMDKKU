<?php
	/**
	 * @package hospital Parlour Business Theme - Adodis Drupal Theme
	 * @version 1.1 November 25, 2010
	 * @author Adodis Theme http://www.drupal-themes.adodis.com
	 * @copyright Copyright (C) 2010 Adodis Drupal Theme
	 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
	 */
?>
<div id="wrapper">
<div id="header-wrapper"><div class="header-banner">
  <div id="header" class="section clearfix">
	   <!-- Logo -->
	   <?php if ($logo): ?>
	     <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
	       <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
	     </a>
	   <?php endif; ?>
	   <?php if ($site_name): ?>
		 <?php if ($title): ?>
		   <div id="site-name">
			    <h1>
			     <strong>
			    	 <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
			   	 </strong>
			   </h1>
		   </div>
		 <?php else: ?>
		   <h1 id="site-name">
		    	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
		   </h1>
		 <?php endif; ?>
	   <?php endif; ?>


	   <!-- Header Right Area -->
	   <?php if($page['header_right']): ?>
		 <div id="header-right">
			  <div class="head-top-right">
			    <?php print render($page['header_right']); ?>
			  </div>
		 </div>
	   <?php endif; ?>
<!-- Font Resize Tool Area -->
	   <?php if(theme_get_setting('font_resize')=='yes'): ?>
		 <div class="font-resize clearfix">
			   <span onclick="switchfontsize('dec')" class="smallA">A</span>
			   <span href="#" onclick="switchfontsize('nor')" class="normalA">A</span>
			   <span href="#" onclick="switchfontsize('inc')" class="bigA">A</span>
		 </div>
	   <?php endif; ?>

  </div>

  <!-- Top Menu Navigation -->
  <?php if($page['navigation']): ?>
	 <div id="menu" class="clearfix" >
		<?php print render($page['navigation']); ?>
	 </div>
  <?php endif; ?>


</div>




</div> <!-- End Header Wrapper -->

  <!--  Upper Positions  and User Positions -->
  <?php if($page['user1'] || $page['user2'] || $page['user3'] || $page['user4'] || $page['upper1'] || $page['upper2']): ?>
  <div id="usersection">
	   <!--  Upper Positions -->
	 <?php if($page['upper1'] || $page['upper2']): ?>
		<div id="upper-position" class="clearfix">
			<?php if($page['upper1']): ?>
				<div id="upper-1">
					<div class="upper-column-<?php print $upper_column; ?>"><div class="upper-column-inner">
						<?php print render($page['upper1']); ?>
					</div></div>
				</div>
			<?php endif; if($page['upper2']): ?>
				<div id="upper-2">
					<div class="upper-column-<?php print $upper_column." ".$upper_seperation; ?>"><div class="upper-column-inner">
						<?php print render($page['upper2']); ?>
					</div></div>
				</div>
		<?php endif; ?>
		</div>
	 <?php endif; ?> <!--  End Upper Positions -->

	 <!--  User Positions -->
	 <?php if($page['user1'] || $page['user2'] || $page['user3'] || $page['user4']): ?>
		<div id="user-position" class="clearfix">
			<?php if($page['user1']): ?>
				<div id="user-1">
					<div class="user-column-<?php print $user_column; ?>"><div class="user-column-inner">
						<?php print render($page['user1']); ?>
					</div></div>
				</div>
			<?php endif; if($page['user2']): ?>
				<div id="user-2">
					<div class="user-column-<?php print $user_column; ?>"><div class="user-column-inner">
						<?php print render($page['user2']); ?>
					</div></div>
				</div>
			<?php endif; if($page['user3']): ?>
				<div id="user-3">
					<div class="user-column-<?php print $user_column; ?>"><div class="user-column-inner">
						<?php print render($page['user3']); ?>
					</div></div>
				</div>
			<?php endif; if($page['user4']): ?>
				<div id="user-4">
					<div class="user-column-<?php print $user_column; ?>"><div class="user-column-inner">
						<?php print render($page['user4']); ?>
					</div></div>
				</div>
			<?php endif; ?>
		</div>
	 <?php endif; ?> <!--  End User Positions -->
</div>
<?php endif; ?> <!--  End Upper Positions  and User Positions -->
<!-- Content Area -->
<div id="content-wrapper">
 <div id="middle-part-<?php print $switch_column; ?>" class="middle-part clearfix">

    <!-- LEFT SIDEBAR  -->
	<?php if($page['sidebar_left']): ?>
		<div id="sidebar_left">
			<?php print render($page['sidebar_left']); ?>
		</div>
	<?php endif; ?>

<!-- MIDDLE CONTENT -->
<div id="main-content-<?php print $switch_column; ?>" class="main-content clearfix">

	<?php if ($messages): ?>
	    <div id="messages"><div class="section clearfix">
	      <?php print $messages; ?>
	    </div></div> <!-- /.section, /#messages -->
  	<?php endif; ?>

	<?php if ($breadcrumb): ?>
	      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
	<?php endif; ?>

	<?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h2 class="title" id="node-title">
          <?php print $title; ?>
        </h2>
      <?php endif; ?>
      <?php if ($tabs&&$logged_in): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>

	<?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

     <?php print render($page['content']); ?>

      <?php if($page['content_bottom']): ?>
        <div id="content-bottom" class="services clearfix">
          <?php print render($page['content_bottom']); ?>
        </div>
  	<?php endif; ?>
</div>


<!-- RIGHT SIDEBAR  -->
<?php if($page['sidebar_right']): ?>
	<div id="sidebar_right" class="clearfix">
		<?php print render($page['sidebar_right']); ?>
	</div>
<?php endif; ?>
 </div> <!-- End left, right sidebar's and content area -->

</div> <!--  End Content Wrapper -->
<!-- FOOTER -->
<div id="footer">
<!--  Footer Positions -->
	 <?php if($page['footer1'] || $page['footer2'] ): ?>

	 <div class="footertop">
		<div id="footer-position" class="clearfix">
			<?php if($page['footer1']): ?>
				<div id="footer-1">
					<div class="footer-column-<?php print $footer_column; ?>"><div class="footer-column-inner">
						<?php print render($page['footer1']); ?>
					</div></div>
				</div>
			<?php endif; if($page['footer2']): ?>
				<div id="footer-2">
					<div class="footer-column-<?php print $footer_column; ?>"><div class="footer-column-inner">
						<?php print render($page['footer2']); ?>
					</div></div>
				</div>
			<?php endif; ?>
		</div>
	</div>

<div class="footerbottom">
 <div class="footerbottom1"></div></div>



	 <?php endif; ?> <!--  End Footer Positions -->

    <!-- DO NOT REMOVE THIS CREDIT LINK. IF YOU WANT TO REMOVE, PLEASE CONTACT US -->
		<div class="designed">Designed by drupal-themes.adodis.com    <a href="http://www.drupal-themes.adodis.com">Download Drupal Themes</a></div>
	</div> <!-- End Footer -->
</div> <!--  End Wrapper -->
