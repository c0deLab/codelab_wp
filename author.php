<?php get_header(); ?>

<div class="archive">
	  
<?php
if (isset($_GET['author_name'])) :
	$curauth = get_user_by('slug', $author_name);
else :
	$curauth = get_userdata(intval($author));
endif;
?>

<h2><?php echo $curauth->first_name . ' ' . $curauth->last_name ?></h2>

<div class="row module">
	<div class="small-4 columns">
		<?php echo get_avatar( $curauth->ID, 300 ); ?>
	</div>
	<div class="small-8 columns">
	<?php
	if($curauth->user_url != "") { ?>
	<p>
		<a class="link--arrow" href="<?= $curauth->user_url; ?>">Website</a>
	</p>
	<?php } ?>
		<?php echo $curauth->description; ?>
	</div>
</div>

<?php if ( count_user_posts($curauth->ID) > 0 ) { ?>
<div class="module">

	<h3>Work</h3>

	<div class="row">
	<?php while (have_posts()) : the_post();
		foreach ((get_the_category()) as $category) { 
			if ($category->cat_ID == 5) break;
			get_thumbnail($i);
		}
	endwhile;
	?>
	</div>
</div>
<?php } ?>

<div class="row">
	<div class="large-12 columns">
		<div class="text-left"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="text-right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>
</div>

<?php get_footer(); ?>