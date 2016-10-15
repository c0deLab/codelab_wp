<?php get_header(); ?>

<?php if (have_posts()) : ?>


<h2>Recent Projects</h2>
<div class="clearfix">
<?php 
// PROJECTS
$i = 0;
$posts = get_posts('category=4&order=DESC&orderby=post_date&numberposts=6');
foreach ($posts as $post) : setup_postdata($post);

	get_thumbnail($i); 
	$i++;

?>
<?php endforeach; ?>
</div>

<h2>Recent Work In Progress</h2>
<div class="clearfix">	
<?php 
// Work in progress
$i = 0;
$posts = get_posts('category=11&order=DESC&orderby=post_date&numberposts=6');
foreach ($posts as $post) : setup_postdata($post);

	get_thumbnail($i); 
	$i++;

?>
<?php endforeach; ?>
</div>

<h2 class="next">Recent News</h2>		
<div class="clearfix">
<?php 
// NEWS
$i = 0;
$posts = get_posts('category=5&order=DESC&orderby=post_date&numberposts=6');
foreach ($posts as $post) : setup_postdata($post);

	get_thumbnail($i); 
	$i++;

?>
<?php endforeach; ?>
</div>




<?php else : ?>

<h2>Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

<?php get_footer(); ?>
