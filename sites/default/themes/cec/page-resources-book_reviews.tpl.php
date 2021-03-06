<?php
// $Id: page.tpl.php,v 1.14.2.6 2009/08/18 16:28:33 jselt Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
	

  <title><?php print $head_title; ?></title>
  <!--[if lte IE 7]> <style>.iehide{display:none;}</style><![endif]-->
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
<div id="skipnav"><a href="#content">Skip to Content</a></div>
  <div id="page"><div id="page-inner">
  
    <a name="top" id="navigation-top"></a>
    <?php if ($primary_links || $secondary_links || $navbar): ?>
      <div id="skip-to-nav"><a href="#navigation"><?php print t('Skip to Navigation'); ?></a></div>
    <?php endif; ?>

    <div id="header" style="background:url(/sites/default/files/images/cec-banners/CEC-banner-<?php print (rand(1,2)) ?>.jpg) top left no-repeat;"><div id="header-inner" class="clear-block">

		<?php if ($logo): ?>
			<div id="logo">
			 <a href="<?php print $base_path; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" id="logo-image" /></a>
			 </div>
 		<?php endif; ?>
 
		<?php if ($jump_menu): ?>
			<div id="jump"><?php print $jump_menu; ?></div>
		<?php endif;?>
			
    </div></div> <!-- /#header-inner, /#header -->
<?php if ($navbar): ?>

  <div id="navbar-cec"><div id="navbar-inner" class="region region-navbar">

    <a name="navigation" id="navigation"></a>

    <?php print $navbar; ?>
 
  </div></div> <!-- /#navbar-inner, /#navbar -->

<?php endif; ?>
    <div id="main"><div id="main-inner" class="clear-block<?php if ($search_box || $primary_links || $secondary_links || $navbar) { print ' with-navbar'; } ?>">
<div id="col-container">
	<div id="left-col"<?php if (!$right): ?> class="no-right-sidebar"<?php endif; ?>>
      <div id="content"><div id="content-inner">

        <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

       

        <?php if ($breadcrumb || $title || $tabs || $help || $messages): ?>
          <div id="content-header">
            
            <?php if ($title): ?>
			<!-- annoying table to vertically center titles in IE 7 and below -->
             <table cellpadding="0" cellspacing="0" border="0" class="page-title">
             	<tr><td valign="middle">
             	<h1 class="title"><?php print $title; ?></h1>
				</td></tr>
            </table>
			<?php endif; ?>
            <?php print $messages; ?>
            <?php if ($tabs): ?>
              <div class="tabs"><?php print $tabs; ?></div>
            <?php endif; ?>
            <?php print $help; ?>
          </div> <!-- /#content-header -->
        <?php endif; ?>
		 <?php if ($content_top): ?>
	          <div id="content-top" class="region region-content_top grey-bak">
	            <?php print $content_top; ?>
	          </div> <!-- /#content-top -->
	        <?php endif; ?>
        <div id="content-area">
          <?php print $content; ?>
        </div>

        <?php if ($feed_icons): ?>
          <div class="feed-icons"><?php print $feed_icons; ?></div>
        <?php endif; ?>

        <?php if ($content_bottom): ?>
          <div id="content-bottom" class="region region-content_bottom">
            <?php print $content_bottom; ?>
          </div> <!-- /#content-bottom -->
        <?php endif; ?>

      </div></div> <!-- /#content-inner, /#content -->

     </div> <!-- /#left_col -->
 <div id="right-col">
            <?php if ($right): ?>
        <div id="sidebar-right"><div id="sidebar-right-inner" class="region region-right">
          <?php print $right; ?>
        </div></div> <!-- /#sidebar-right-inner, /#sidebar-right -->
      <?php endif; ?>
	   </div>
	  <!-- /#right_col -->
<div class="clear"></div>
</div> <!-- /#col_container -->
  </div></div> <!-- /#main-inner, /#main -->
    <div id="footer"><div id="footer-inner" class="region region-footer">
        <div id="footer-left"><?php print $footer; ?> </div>
<div id="footer-right"><?php print $footer_links; ?></div>
      <div class="clear"></div></div></div> <!-- /#footer-inner, /#footer -->
  

  </div></div> <!-- /#page-inner, /#page -->

  <?php if ($closure_region): ?>
    <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
  <?php endif; ?>
<script type="text/javascript">
// make all pages titles vertically centered for ie 6 and 7
var ps = document.getElementsByTagName("h1");
for (var i=0;i<ps.length;i++) {
ps[i].style.marginTop = ps[i].offsetHeight < ps[i].parentNode.offsetHeight ?
parseInt((ps[i].parentNode.offsetHeight - ps[i].offsetHeight) / 2) + "px" : "0";
}
ps = null;
</script>
  <?php print $closure; ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11341938-6");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
