<?php get_header();

// get data
if (have_posts()) :

$people = [];

while (have_posts()) : the_post();

// When on the author page, don't show news entries
$categories = get_the_category(get_the_ID());
foreach ((get_the_category()) as $category) { 
	if ($category->cat_ID == 5) break;
	if (!in_array(get_the_author(), $people)) {
		$people[] = get_the_author();
	}
}

endwhile; 
sort($people, SORT_NATURAL | SORT_FLAG_CASE);
?>

<div class="archive">

<?php /* If this is a category archive */ if (is_category()) { ?>
<h2><?php single_cat_title(); ?></h2>
<?php if (is_category('projects')) { ?>
	<p>View by people:</p>
	<div class="row">
		<div class="medium-6 columns">
			<select class="inline" id="people-select">
				<option value="">VIEW ALL</option>
				<option value="" disabled>-----</option>
				<?php foreach ($people as $person) { ?>
				<option value="<?php echo $person; ?>"><?php echo $person; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
<?php } ?>

<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2>Archive for <?php the_time('F, Y'); ?></h2>

<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2>Archive for <?php the_time('Y'); ?></h2>

<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	  
<?php
if(isset($_GET['author_name'])) :
	$curauth = get_user_by('slug', $author_name);
else :
	$curauth = get_userdata(intval($author));
endif;
?>
<h2><?php echo $curauth->first_name . ' ' . $curauth->last_name ?></h2>

<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2>Blog Archives</h2>
<?php } ?>


<div class="row">

<?php
while (have_posts()) : the_post();
	foreach ((get_the_category()) as $category) { 
		if ($category->cat_ID == 5) break;
		get_thumbnail($i);
	}
endwhile;
?>

</div>

<div class="row">
	<div class="large-12 columns">
		<div class="text-left"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="text-right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>
</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
</div>

<?php get_footer(); ?>