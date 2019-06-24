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
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'passport-and-phone' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'passport-and-phone' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'passport-and-phone' ), 'passport-and-phone', '<a href="http://softwarb.com">Softwarb Limited</a>' );
				?>
		</div>.site-info -->

		<!-- todo, delete nav. at the bottom temporaily -->
		<nav id="site-navigation" class="main-navigation"><div class="menu-menu-container"><ul id="primary-menu" class="menu">
			<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="/travel-tips/" style="color:white;">Travel Tips</a></li>
			<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="/travel-blog/" style="color:white;">Travel Blog</a></li>
		</ul></div></nav>
		
		<div class="site-social">
			<a href="https://www.facebook.com/passportandphone/" target="_blank"><img src="/wp-content/themes/passport-and-phone/assets/social/facebook.svg" alt="Facebook" width="44" height="44"></a>
			<a href="https://www.instagram.com/passportphone/" target="_blank"><img src="/wp-content/themes/passport-and-phone/assets/social/instagram.svg" alt="Instagram" width="44" height="44"></a>
			<a href="https://twitter.com/passport_phone" target="_blank"><img src="/wp-content/themes/passport-and-phone/assets/social/twitter.svg" alt="Twitter" width="44" height="44"></a>
			<a href="https://www.pinterest.com/passportandphone/" target="_blank"><img src="/wp-content/themes/passport-and-phone/assets/social/pinterest.svg" alt="Pinterest" width="44" height="44"></a>
		</div>
		<div class="site-copyright">
			<span>Copyright © 2019 Passport &amp; Phone.</span> <span>All rights reserved.</span>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
