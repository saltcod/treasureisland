<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>
  

	<div id="secondary" class="widget-area fourcol" role="complementary">

	<header id="branding" role="banner">
				<hgroup>
	 				<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>
				 
		</header><!-- #branding -->


		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			  

		<?php endif; // end sidebar widget area ?>

	<h3 class="tags">Tags</h3>
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
		</div><!-- #secondary .widget-area -->


		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
