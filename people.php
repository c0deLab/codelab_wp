<?php
/*
Template Name: People
*/
?>

<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="text--mandy"><?php the_title(); ?></h2>
			<?php the_content(); ?>
			
			<?php 
			/*
			
				http://www.mattvarone.com/wordpress/list-users/
				
				First we set how we'll want to sort the user list.
			
				You could sort them by:
				------------------------
			
				* ID - User ID number.
				* user_login - User Login name.
				* user_nicename - User Nice name ( nice version of login name ).
				* user_email - User Email Address.
				* user_url - User Website URL.
				* user_registered - User Registration date.
			*/
			
			$szSort = "user_nicename";
			
			// Custom query to get the ID of the users.
			$aUsersID = $wpdb->get_col( $wpdb->prepare("SELECT $wpdb->users.ID FROM $wpdb->users ORDER BY %s ASC", $szSort ));
			
			// Store each set of people
			$faculty = array();
			$phd = array();
			$master = array();
			$assistant = array();
			$visitor = array();
			$alumni = array();
			
			//Once we have the IDs we loop through them with a Foreach statement.			
			
			foreach ( $aUsersID as $iUserID ) :
				
				// Get the user data for each author
				$curauth = get_userdata( $iUserID );
				//$curauth = get_userdatabylogin($authors[$i]);

				$trim_yim = trim($curauth->yim);
				$lower_yim = mb_strtolower($trim_yim);

				// Divide the people up into categories				
				if($lower_yim == "faculty") {

					$facultyCount++;
					$faculty[] = $curauth;
				
				} else if($lower_yim == "phd") {
				
					$phdCount++;
					$phd[] = $curauth;
					
				} else if($lower_yim == "master") {
					$masterCount++;
					$master[] = $curauth;

				} else if($lower_yim == "assistant") {
					$assistantCount++;
					$assistant[] = $curauth;
				
				} else if($lower_yim == "visitor") {
					$visitorCount++;
					$visitor[] = $curauth;
				
				} else if($lower_yim == "alumni") {
					$alumniCount++;
					$alumni[] = $curauth;
				}
						
			endforeach; // end the users loop.
			
			function showBio($author) { ?>
				<div class="small-6 medium-3 large-2 columns">
					<a class="person" href="<?= get_author_link(false, $author->ID, $author->user_nicename); ?>">
						<?= get_avatar( $author->ID, 300 ); ?>
						<h4 class="person__name">
							<?= $author->first_name . ' ' . $author->last_name; ?>
						</h4>
					</a>
				</div>
			<?php
			}
			
			// FACULTY
			if($facultyCount > 0) { ?>
				<div class="row" data-people-container>
				<h3 class="columns">Faculty</h3>
				<?php foreach ($faculty as $f) showBio($f); ?>
				</div>
				<hr><?php
			}
			
			// PHD			
			if($phdCount > 0) { ?>
				<div class="row" data-people-container>
				<h3 class="columns">PhD Students</h3>
				<?php foreach ($phd as $p) showBio($p); ?>
				</div>
				<hr><?php	
			}
			
			// MASTER			
			if($masterCount > 0) { ?>
				<div class="row" data-people-container>
				<h3 class="columns">Masters Students</h3>
				<?php foreach ($master as $m) showBio($m); ?>
				</div>
				<hr><?php	
			}

			// Assistant		
			if ($assistantCount > 0) { ?>
				<div class="row" data-people-container>
				<h3 class="columns">Lab Manager</h3>
				<?php foreach ($assistant as $m) showBio($m); ?>
				</div>
				<hr><?php	
			}
			
			// VISITOR
			/* if($visitorCount > 0) {
				echo "<div class=\"people\">\n";			
				echo "<h3>Visitors</h3>\n";
				for ($i = 0; $i < $visitorCount; $i++) {
					showBio($visitor[$i]);
				}	
				echo "</div>\n\n";	
				echo "<hr>";	
			} */					

			// ALUMNI
			if($alumniCount > 0) { ?>
				<div class="row" data-people-container>
				<h3 class="columns">Alumni</h3>
				<?php foreach ($alumni as $m) showBio($m); ?>
				</div><?php	
			}	
			
			?>

			

			
		</div>
		<?php endwhile; endif; ?>


<?php get_footer(); ?>