<?php
/*
Template Name: People
*/
?>

<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
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
			
			
			$facultyCount = 0;
			$phdCount = 0;
			$masterCount = 0;
			$assistantCount = 0;
			$visitorCount = 0;
			$alumniCount = 0;
			
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
					
					//echo $curauth->first_name . ' ';
					
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
				
				//echo $i . ': ' . $curauth->display_name . ' <br />';
				//echo $authors[$i] . ' <br />';
				
				/*
				// http://codex.wordpress.org/Author_Templates
				echo $curauth->aim;
				echo $curauth->description;
				echo $curauth->display_name;
				echo $curauth->first_name;
				echo $curauth->ID;
				echo $curauth->jabber;
				echo $curauth->last_name;
				echo $curauth->nickname;
				echo $curauth->user_email;
				echo $curauth->user_login;
				echo $curauth->user_nicename;
				echo $curauth->user_registered;
				echo $curauth->user_url;
				echo $curauth->yim;
				
				<?php echo get_avatar( $curauth->ID , 80 ); ?>
				
				*/
						
			endforeach; // end the users loop.

			
			function showBio($author) { ?>
				<div class="media-object">
					<div class="row">
						<div class="small-4 columns">
							<?php echo get_avatar( $author->ID, 300 ); ?>
						</div>
						<div class="small-8 columns">
						<?php
						// Only link to the author page if they have posts
						$postCount = count_user_posts($author->ID);
						if($postCount > 0) {
							echo "<h4><a href=\"" . get_author_link(false, $author->ID, $author->user_nicename) . "\">" . $author->first_name . ' ' . $author->last_name . "</a></h4>\n";
						} else {
							echo "<h4>" . $author->first_name . ' ' . $author->last_name . "</h4>\n";
						}
						if($author->user_url != "") {
							echo "<a href=\"" . $author->user_url . "\" target=\"_blank\">" . $author->user_url . "</a><br />\n";
						}
						echo $author->description; ?>
						</div>
					</div>
				</div>
			<?php
			}
			
			// FACULTY
			if($facultyCount > 0) {
				echo "<div class=\"people\">\n\n";
				echo "<h3>Faculty</h3>\n";
				for ($i = 0; $i < $facultyCount; $i++) {
					showBio($faculty[$i]);
				}			
				echo "</div>\n\n";
				echo "<hr>";
			}
			
			// PHD			
			if($phdCount > 0) {
				echo "<div class=\"people\">\n";			
				echo "<h3>PhD Students</h3>\n";
				for ($i = 0; $i < $phdCount; $i++) {
					showBio($phd[$i]);
				}	
				echo "</div>\n\n";
				echo "<hr>";	
			}
			
			// MASTER			
			if($masterCount > 0) {
				echo "<div class=\"people\">\n";			
				echo "<h3>Masters Students</h3>\n";
				for ($i = 0; $i < $masterCount; $i++) {
					showBio($master[$i]);
				}			
				echo "</div>\n\n";
				echo "<hr>";
			}

			// Assistant		
			if($assistantCount > 0) {
				echo "<div class=\"people\">\n";			
				echo "<h3>Lab Manager</h3>\n";
				for ($i = 0; $i < $assistantCount; $i++) {
					showBio($assistant[$i]);
				}			
				echo "</div>\n\n";
				echo "<hr>";
			}
			
			// VISITOR
			if($visitorCount > 0) {
				echo "<div class=\"people\">\n";			
				echo "<h3>Visitors</h3>\n";
				for ($i = 0; $i < $visitorCount; $i++) {
					showBio($visitor[$i]);
				}	
				echo "</div>\n\n";	
				echo "<hr>";	
			}						

			// ALUMNI
			if($alumniCount > 0) {
				echo "<div class=\"people\">\n";			
				echo "<h3>Alumni</h3>\n";
				for ($i = 0; $i < $alumniCount; $i++) {
					showBio($alumni[$i]);
				}	
				echo "</div>\n\n";		
			}	
			
			?>

			

			
		</div>
		<?php endwhile; endif; ?>


<?php get_footer(); ?>