<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); 
get_sidebar();
?>

				 

		<div id="primary" class="sevencol last">
			<div id="content" role="main">

				<a id="toTop" style="display: none; "><img class="text-logo" src="<?php bloginfo('template_url'); ?>/img/scrollup.png" alt="scrollup"></a>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					

						<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
						<div class="entry-summary">
							<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
						</div><!-- .entry-summary -->
						<?php else : ?>
						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
						<?php endif; ?>


						<footer class="entry-meta">

							<?php echo get_the_date(); ?>   

								<?php
									$tags_list = get_the_tag_list( '', ', ' );
									if ( $tags_list ):
								?>
									<span class="tag-links">
										<?php printf( __( '<span class="%1$s">Folded neatly in:</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
									</span>
									<?php endif; ?>
									<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

						</footer><!-- #entry-meta -->
					</article><!-- #post-<?php the_ID(); ?> -->
				<?php endwhile; ?>
				
				<?php /* Display navigation to next/previous pages when applicable */ ?>
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					<nav id="nav-below">
						<h1 class="section-heading"><?php _e( 'Post navigation', 'toolbox' ); ?></h1>
						<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'toolbox' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?></div>
					</nav><!-- #nav-below -->
				<?php endif; ?>				

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>