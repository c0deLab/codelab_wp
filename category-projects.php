<?php get_header(); rewind_posts(); ?>
<div class="archive">
	
<?php 
query_posts($query_string.'&posts_per_page=24');
if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<?php /* If this is a category archive */ if (is_category()) { ?>
<h2><?php single_cat_title(); ?></h2>

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


<div class="clearfix">

<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>

<?php 	
		
	// When on the author page, don't show news entries
	if(is_author()){
		$newsCategory = false;
		$categories = get_the_category(get_the_ID());
		foreach((get_the_category()) as $category) { 
			if($category->cat_ID == 5) {
				$newsCategory = true;
				break;
			}
		}
	}
?>

<?php if(!$newsCategory) { get_thumbnail($i); } ?>

<?php endwhile; ?>

</div>

<div class="clear"></div>

<div class="nav-interior">
			<div class="prev"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
<div class="clear"></div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
</div>

<?php get_footer(); ?>