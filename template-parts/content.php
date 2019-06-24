<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Passport_&_Phone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 	<?php wp_theme_passport_and_phone_post_thumbnail(); ?>
	
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
					if ( is_singular() ) {
						wp_theme_passport_and_phone_posted_by();
					}
					wp_theme_passport_and_phone_tag_list();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'passport-and-phone' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'passport-and-phone' ),
				'after'  => '</div>',
			) );
		endif;

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
			if ( is_singular() ) :
				wp_theme_passport_and_phone_entry_footer();
			endif;
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
