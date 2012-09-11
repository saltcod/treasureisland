<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     

      
     <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
 

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
                <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
         
    </footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->