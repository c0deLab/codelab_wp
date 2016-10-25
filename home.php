<?php get_header(); ?>

<div class="row module">
	<div class="large-9 columns text--mandy">
		<h2>Computational &amp; Tangible<br>Interaction Design Laboratory</h2>
		<p class="lead">The CodeLab at Carnegie Mellon University is a multidisciplinary collaborative formed to address complex issues at the intersection of art, design, architecture, and engineering.</p>
	</div>
</div>

<?php if (have_posts()) : ?>

<div class="row module">
<h2 class="text--mandy columns">
	<a class="link--arrow" href="<?= home_url(); ?>/projects">Featured Projects</a>
</h2>

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

<?php
/* No news for now

<div class="row">
	<h2 class="columns next">Recent News</h2>
</div>

<div class="row">
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
*/
?>



<?php else : ?>

<h2>Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

<?php get_footer(); ?>
