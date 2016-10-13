<!-- Begin slideshow -->
<?php query_posts('showposts=4'); ?>
<ul id="portfolio">
<?php while (have_posts()) : the_post(); ?>

<?php
// IMAGES
if ( has_post_thumbnail() ) {

	$originalImage = get_the_post_thumbnail( $post->ID, 'large' );
	
	// Hack to remove the title tag from the image so that the name of the project is shown
	$startpos = strrpos($originalImage, "title=");
	$endpos = strrpos($originalImage, "/></a>");
	$image = substr($originalImage, 0, $startpos) . substr($originalImage, strlen($originalImage) );
	
	echo "<li><a href=\"";
	the_permalink();
	echo "\" title=\"";
	the_title(); 
	echo "\">" . $image . "</a></li>";

} ?>
<?php endwhile; wp_reset_query(); ?>
</ul>