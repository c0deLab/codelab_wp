<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h2><?php the_title(); ?></h2>

<div class="postmeta">
<?php the_date('F Y'); ?><br>
Author: <a href="<?php echo get_author_link(false, $authordata->ID, $authordata->user_nicename) ?>"> <?php the_author_meta('first_name'); echo ' '; the_author_meta('last_name'); ?></a>
<?php if (get_field('program', 'user_' . $authordata->ID)) {
	echo ', ' . get_field('program', 'user_' . $authordata->ID);
	if (get_field('graduation_year', 'user_' . $authordata->ID)) {
		echo ' ' . get_field('graduation_year', 'user_' . $authordata->ID);
	}
} ?>
</div>

<?php the_content(); ?>

<div class="clear"></div>

<?php endwhile; else : ?>

	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>


<?php get_footer(); ?>