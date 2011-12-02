<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>
 

	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'toolbox' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'toolbox' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<aside><?php wp_loginout(); ?></aside>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	

	<h3>Tags</h3>
	<li id="tags">	
		<div id="tag-list">
		<?php
			$tags = get_tags( array('orderby' => 'name', 'order' => 'ASC') );
				foreach ( (array) $tags as $tag ) {
			?>
			<div class="tags">
			<?php echo '<a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a>';	?>
			</div>
			<?php		}
			?>				
		</div> <!-- tag-list -->
		 
	</ul>	
 
	
</li> <!-- End All tags box in sidebar -->
	

	 <?php get_search_form( $echo ); ?>
	 
</div><!-- #secondary .widget-area -->