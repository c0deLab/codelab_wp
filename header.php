<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if ( is_single() || is_category() || is_page() ) { ?> <?php wp_title("", true); ?> | <?php } ?><?php bloginfo('name'); ?> </title>

<!-- Styles  -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/style.css?v=20161103_1018" type="text/css">
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

<div class="header title-bar">
	<div class="row">
		<div class="columns">
			<a href="<?php echo home_url(); ?>" rel="home">
				<img class="header__logo" src="<?php echo bloginfo('template_url'); ?>/images/logo.svg" width="140" height="140">
			</a>
			<div class="row column">
				<div class="menu-hamburger hide-for-large" data-responsive-toggle="menu-primary-menu">
					<button class="menu-icon" type="button"></button>
					<div class="title-bar-title">Menu</div>
				</div>
			</div>
			<?php wp_nav_menu(array(
				'menu_class' => 'menu'
			)); ?>
		</div>
	</div>
</div>

<div class="row">

<!-- Main Column -->
<div class="columns" id="main">