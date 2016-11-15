<?php
/*
Template Name: People
*/
get_header(); 
the_post();

// Custom query to get the ID of the users.
$user_query = new WP_User_Query(array(
	'total_users' => -1
));

$years = [];
if ( !empty( $user_query->results ) ) {
	foreach ($user_query->results as $user) {
		$year = get_field('graduation_year', 'user_' . $user->ID);
		if ( intval($year) > 0 && !in_array($year, $years) ) {
			$years[] = $year;
		}
		// var_dump($user);
		$name = $user->first_name . ' ' . $user->last_name;
		$name = strtolower($name);
		$name = str_replace("'", "", $name);
		$name = str_replace(".", "", $name);
		$name = str_replace(" ", "", $name);
		$name = str_replace(",", "", $name);
		$name = str_replace("-", "", $name);
		
		if ( !get_field('photo', 'user_' . $user->ID) ) {
			$id = wp_insert_post(array(
				'post_title' => $name,
				'post_name' => $name,
				'post_status' => 'publish',
				'post_type' => 'attachment', 
				'guid' => 'http://localhost/codelab/wp-content/uploads/2016/11/' . $name . '.jpg',
				'post_mime_type' => 'image/jpeg'
			));
			// update_field('photo', $id, 'user_' . $user->ID);
			update_user_meta($user->ID, 'photo', $id);
			update_user_meta($user->ID, '_photo', 'field_582b3ce39f7c4');
			update_post_meta(get_field('photo', 'user_' . $user->ID), '_wp_attached_file', '2016/11/' . $name . '.jpg');
		}
	}
}
asort($years);
?>

<div class="post" id="post-<?php the_ID(); ?>">
	
	<div class="row columns">
		<h2 class="text--mandy"><?php the_title(); ?></h2>
	</div>

	<div class="row">
		<div class="medium-4 columns">
			<p>Role:</p>
			<select class="inline" data-select="role">
				<option value="">VIEW ALL</option>
				<option value="" disabled>-----</option>
				<option value="student">Student</option>
				<option value="faculty">Faculty</option>
				<option value="alumni">Alumni</option>
			</select>
		</div>
		<div class="medium-4 columns">
			<p>Programs:</p>
			<select class="inline" data-select="program">
				<option value="">VIEW ALL</option>
				<option value="" disabled>-----</option>
				<option value="mscd">MSCD</option>
				<option value="mtid">MTID</option>
				<option value="em2">EM2</option>
			</select>
		</div>
		<div class="medium-4 columns">
			<p>Graduation Year:</p>
			<select class="inline" data-select="year">
				<option value="">VIEW ALL</option>
				<option value="" disabled>-----</option>
				<?php foreach ($years as $year) { ?>
					<option value="<?= $year; ?>"><?= $year; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	<?php 
	function showBio($author) { 
		$name = $author->first_name . ' ' . $author->last_name;
		$link = get_author_link(false, $author->ID, $author->user_nicename);
		$program = join('|', get_field('program', 'user_' . $author->ID));
		$year = get_field('graduation_year', 'user_' . $author->ID);
		$role = get_field('type', 'user_' . $author->ID);

		?>
		<div class="small-6 medium-3 large-2 columns">
			<a class="person" href="<?= $link; ?>" data-program="<?= $program; ?>" data-year="<?= $year; ?>" data-role="<?= $role; ?>">
				<img src="<?php the_field('photo', 'user_' . $author->ID); ?>" alt="<?= $name; ?>">
				<h4 class="person__name text text--size20">
					<?= $name; ?>
				</h4>
			</a>
		</div>
	<?php
	}

	if ( !empty( $user_query->results ) ) { ?>
		<div class="row" data-people-container>
			<?php foreach ( $user_query->results as $user ) showBio($user); ?>
		</div>
	<?php
	} else {
		echo 'No users found.';
	}
	
	?>

</div>

<?php get_footer(); ?>