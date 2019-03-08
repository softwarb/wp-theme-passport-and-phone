<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passport_&_Phone
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<!-- <div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-theme-passport-and-phone' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'wp-theme-passport-and-phone' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'wp-theme-passport-and-phone' ), 'wp-theme-passport-and-phone', '<a href="http://softwarb.com">Softwarb Limited</a>' );
				?>
		</div>.site-info -->
		<div class="site-social">
			<a href="https://www.facebook.com/passportandphone/" target="_blank"><img src="/wp-content/themes/wp-theme-passport-and-phone/assets/social/facebook.svg" alt="Facebook"></a>
			<a href="https://www.instagram.com/passportphone/" target="_blank"><img src="/wp-content/themes/wp-theme-passport-and-phone/assets/social/instagram.svg" alt="Instagram"></a>
			<a href="https://twitter.com/passport_phone" target="_blank"><img src="/wp-content/themes/wp-theme-passport-and-phone/assets/social/twitter.svg" alt="Twitter"></a>
			<a href="https://www.pinterest.com/passportandphone/" target="_blank"><img src="/wp-content/themes/wp-theme-passport-and-phone/assets/social/pinterest.svg" alt="Pinterest"></a>
		</div>
		<div class="site-copyright">
			<span>Copyright © 2019 Passport &amp; Phone.</span> <span>All rights reserved.</span>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
