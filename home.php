<?php get_header(); ?>

<?php if (have_posts()) : ?>


<h2>Recent Projects</h2>		
<?php 
// PROJECTS
$i = 0;
$posts = get_posts('category=4&order=DESC&orderby=post_date&numberposts=6');
foreach ($posts as $post) : setup_postdata($post);

	get_thumbnail($i); 
	$i++;

?>
<?php if ($i == 2) { ?><div class="archive-stack clear"></div><?php $i = 0; } ?>
<?php endforeach; ?>
<div class="clear"></div>

<h2>Recent Work In Progress</h2>		
<?php 
// Work in progress
$i = 0;
$posts = get_posts('category=11&order=DESC&orderby=post_date&numberposts=6');
foreach ($posts as $post) : setup_postdata($post);

	get_thumbnail($i); 
	$i++;

?>
<?php if ($i == 2) { ?><div class="archive-stack clear"></div><?php $i = 0; } ?>
<?php endforeach; ?>
<div class="clear"></div>

<h2 class="next">Recent News</h2>		
<?php 
// NEWS
$i = 0;
$posts = get_posts('category=5&order=DESC&orderby=post_date&numberposts=6');
foreach ($posts as $post) : setup_postdata($post);

	get_thumbnail($i); 
	$i++;

?>
<?php if ($i == 2) { ?><div class="archive-stack clear"></div><?php $i = 0; } ?>
<?php endforeach; ?>
<div class="clear"></div>




<?php else : ?>

<h2>Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

<?php get_footer(); ?>
