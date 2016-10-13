<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $attachment_link = wp_get_attachment_image($post->ID, 'large'); ?>

		<h2><?php the_title() ?></h2>
		<?php echo $attachment_link; ?>


	<?php endwhile; else: ?>

		<p>Sorry, nothing came through.</p>

<?php endif; ?>

<?php 
	get_footer(); 
?>