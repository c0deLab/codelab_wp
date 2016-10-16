<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if ( is_single() || is_category() || is_page() ) { ?> <?php wp_title("", true); ?> | <?php } ?><?php bloginfo('name'); ?> </title>

<!-- Styles  -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/style.css" type="text/css">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.png">

<?php wp_head(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18887660-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

<div class="row column">

<!-- Top Image -->
<a href="<?php echo home_url(); ?>" rel="home" style="display: block; position: relative;">
	<img src="<?php echo bloginfo('template_url'); ?>/masthead/header-01.jpg" style="position: absolute; top: 0; left: 0;">

	<img src="<?php echo bloginfo('template_url'); ?>/masthead/header-overlay.png" style="position: relative;">
</a>

</div>

<!-- Navigation -->
<div class="row column">
	<div class="title-bar">
		<div class="menu-hamburger hide-for-large" data-responsive-toggle="menu-primary-menu">
			<button class="menu-icon" type="button"></button>
			<div class="title-bar-title">Menu</div>
		</div>
		<?php wp_nav_menu(array(
			'menu_class' => 'menu vertical large-horizontal'
		)); ?>
	</div>
</div><!-- .row -->

<div class="row">

<?php // var_dump($wp_query); ?>

<!-- Main Column -->
<div class="medium-8 columns" id="main">