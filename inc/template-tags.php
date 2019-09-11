<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Passport_&_Phone
 */

if ( ! function_exists( 'wp_theme_passport_and_phone_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wp_theme_passport_and_phone_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'passport-and-phone' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'wp_theme_passport_and_phone_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wp_theme_passport_and_phone_posted_by() {
		if (strcasecmp('passportandphone', get_the_author_meta('user_login')) == 0) {
			echo ''; // hide author for username=passportandphone
		} else {
			$byline = sprintf(
				/* translators: %s: post author. */
				esc_html_x( 'Written by %s', 'post author', 'passport-and-phone' ),
				get_the_author_meta('display_name')
			);
			echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
		}
		// $byline = sprintf(
		// 	/* translators: %s: post author. */
		// 	esc_html_x( 'by %s', 'post author', 'passport-and-phone' ),
		// 	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		// );

		// echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'wp_theme_passport_and_phone_tag_list' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wp_theme_passport_and_phone_tag_list() {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'passport-and-phone' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links"> ' . esc_html__( '%1$s', 'passport-and-phone' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}

		// edit_post_link(
		// 	sprintf(
		// 		wp_kses(
		// 			/* translators: %s: Name of current post. Only visible to screen readers */
		// 			__( 'Edit <span class="screen-reader-text">%s</span>', 'passport-and-phone' ),
		// 			array(
		// 				'span' => array(
		// 					'class' => array(),
		// 				),
		// 			)
		// 		),
		// 		get_the_title()
		// 	),
		// 	'<span class="edit-link">',
		// 	'</span>'
		// );
	}
endif;

if ( ! function_exists( 'wp_theme_passport_and_phone_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wp_theme_passport_and_phone_entry_footer() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'passport-and-phone' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'wp_theme_passport_and_phone_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wp_theme_passport_and_phone_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('large'); ?>
			</div>
		  <?php 
		} else {
			?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'medium_large', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
				?>
			</a>
		  <?php
		}
	}
}
