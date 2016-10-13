<?php

add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 310, 200, true );
//add_image_size('home', 310, 175); // for front page thumbnails


// Set the length of the excerpt text to display on images
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');


function get_thumbnail($i) {
?>
<div class="span-8 post-<?php the_ID(); ?><?php if ($i == 3) { ?> last<?php  } ?>">
	<div class="imgteaser">
		<a href="<?php the_permalink() ?>">
		
			<img src="<?php get_the_post_thumbnail_url_changed('thumbnail'); ?>" alt="<?php the_title() ?>" />
		
			<span class="title"><?php the_title() ?></span>
			<span class="excerpt">
				<strong><?php the_title() ?></strong>
				<?php 
					// Remove the <p> tag so we can be compliant XHTML
					$excerpt = strip_tags(get_the_excerpt());
        			echo $excerpt;
        		?>
			</span>
		</a>
	</div>
</div>

<?php


}

/* Get the url from the post thumbnail */
function get_the_post_thumbnail_url_changed($size=thumbnail) {

/*
	$image = get_the_post_thumbnail( $post->ID, 'thumbnail' );
	$start = strpos($image, 'src="') + 5;
	$end = strpos($image, '" ', $start);
	echo substr($image, $start, $end - $start);
*/

	// This is faster perhaps?
	$thumbnail_id=get_the_post_thumbnail($post->ID, $size);
	preg_match ('/src="(.*)" class/',$thumbnail_id,$link);
	echo $link[1];
	
}



if ( function_exists('register_sidebar') )
{
    register_sidebar
    (   array
        (
          'name' => 'Left',
          'before_widget' => '<div class="widgetleft">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );  
    register_sidebar
    (   array
        (
          'name' => 'Middle',
          'before_widget' => '<div class="widgetmiddle">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );   
 register_sidebar
    (   array
        (
          'name' => 'Right',
          'before_widget' => '<div class="widgetright">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );   
}
?>