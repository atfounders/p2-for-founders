<?php
/**
 * Author template.
 *
 * @package P2
 */
?>
<?php get_header(); ?>

<div class="sleeve_main">
	<?php if ( p2_user_can_post() && !is_archive() ) : ?>
		<?php locate_template( array( 'post-form.php' ), true ); ?>
	<?php endif; ?>
	<div id="main">
		
		<div id="p2-author-profile">
			
			<div id="p2-author-avatar">
				<?php echo get_avatar( get_the_author_email(), '80' ); ?>	
			</div>
			
			<div id="p2-author-card">
			
				<h2><?php the_author(); ?></h2>
				
				<dl>
					<?php 
					echo '<dt>Website</dt>';
					if ( get_the_author_meta( 'user_url'  ) ) :
						echo '<dd><a href="' . get_the_author_meta( 'user_url' ) . '">' . get_the_author_meta( 'user_url' ) . '</a></dd>';
					else :
						echo '<dd>None available.</dd>';
					endif;
					
					echo '<dt>Bio</dt>';
					if ( get_the_author_meta( 'description'  ) ) :
						echo '<dd>' . get_the_author_meta( 'description' ) . '</dd>';
					else :
						echo '<dd>None available.</dd>';
					endif; 
					
					?>
				</dl>
					
			</div>
		
			<div id="p2-author-badges">
				<h3>Badges:</h3>
				<?php simplebadges_user(); ?>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>

		<h2>
			<?php printf( _x( 'Updates from %s', 'Author name', 'p2' ), p2_get_archive_author() ); ?>

			<span class="controls">
				<a href="#" id="togglecomments"> <?php _e( 'Toggle Comment Threads', 'p2' ); ?></a> | <a href="#directions" id="directions-keyboard"><?php _e( 'Keyboard Shortcuts', 'p2' ); ?></a>
			</span>
		</h2>

		<ul id="postlist">
			<?php while ( have_posts() ) : the_post(); ?>
	    		<?php p2_load_entry(); ?>
			<?php endwhile; ?>
		</ul>

		<?php else : ?>

		<h2><?php _e( 'Not Found', 'p2' ); ?></h2>
		<p><?php _e( 'Apologies, but the page you requested could not be found.', 'p2' ); ?></p>

		<?php endif; // end have_posts() ?>

		<div class="navigation">
			<p class="nav-older"><?php next_posts_link( __( '&larr; Older posts', 'p2' ) ); ?></p>
			<p class="nav-newer"><?php previous_posts_link( __( 'Newer posts &rarr;', 'p2' ) ); ?></p>
		</div>

	</div> <!-- main -->

</div> <!-- sleeve -->

<?php get_footer(); ?>