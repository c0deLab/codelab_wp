<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<h2>Search Results</h2>

	<div class="navigation">
		<div><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
<div class="span-8<?php if ($i == 3) { ?> last<?php $i = 0; } ?>">
<div class="post-<?php the_ID(); ?>">
<h6 class="archive-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
<?php
	$values = get_post_custom_values("thumbnail");
	if (isset($values[0])) {						
?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php $values = get_post_custom_values("thumbnail"); echo $values[0]; ?>" alt="" /></a>
<?php } ?>
<?php the_excerpt(); ?>
<p class="postmetadata alt quiet"><?php the_time('M d, Y') ?> @ <?php the_time() ?> | <?php comments_popup_link('Have your say &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
</div>
</div>
<?php endwhile; ?>

<div class="clear"></div>

	<div class="navigation">
		<div><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

<?php else : ?>

	<h2>No posts found. Try a different search?</h2>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php endif; ?>

<?php get_footer(); ?>