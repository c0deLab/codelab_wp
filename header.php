<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if ( is_single() || is_category() || is_page() ) { ?> <?php wp_title("", true); ?> | <?php } ?><?php bloginfo('name'); ?> </title>

<!-- Styles  -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

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
<div class="container">
<div class="container-inner">

<!-- Top Image -->
<img src="http://code.arc.cmu.edu/wp/wp-content/themes/codelab/masthead/rotate.php" width="950" height="250" alt="Computational Design Lab" />


<!-- Navigation -->
<div id="masthead">
	<div id="navcontainer">
		<ul id="navlist">
			<!-- <li><a href="<?php echo get_settings('home'); ?>/">Home</a></li>-->
			<!-- <li><a href="<?php echo get_settings('home'); ?>/news/">News</a></li>-->
			<!-- <li><a href="<?php echo get_settings('home'); ?>/projects/">Projects</a></li>-->
			<!-- <li><a href="<?php echo get_settings('home'); ?>/workinprogess/">Work In Progress</a></li>	-->		
			<?php 
				// Remove the 'title=' and 'class=' tags
				$clean_page_list = wp_list_pages('title_li=&echo=0&depth=1'); 
		    	$clean_page_list = preg_replace('/ title=\"(.*?)\"/','', $clean_page_list);
		    	$clean_page_list = preg_replace('/ class=\"(.*?)\"/','', $clean_page_list);
			    echo $clean_page_list;
			?> 
		</ul>
	</div>
</div>

<!-- Main Column -->
<div id="main">