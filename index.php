<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); 
get_sidebar();
?>

<?php if( is_archive() ): ?>
<header class="page-header">
	<h1 class="page-title">
		 <?php the_tags( 'Tag:', '', '' ); ?> 
	</h1>
</header>
<?php elseif( is_search() ): ?>
<header class="page-header">
	<h1 class="page-title">
		 <?php echo "Search / " . get_search_query(); ?> 
	</h1>
</header>

<?php elseif( is_404() ): ?>
<header class="page-header">
	<h1 class="page-title"> No sign of that around these parts. </h1> 
</header>

<?php endif; ?>


		<div id="primary" class="sevencol last">
			<div id="content" role="main">

			<p id="toggle-thumbnails"><a href="#">Show Thumbnails</a></p>
				<a id="toTop" style="display: none; "><img class="text-logo" src="<?php bloginfo('template_url'); ?>/img/scrollup.png" alt="scrollup"></a>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() );?>
				
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