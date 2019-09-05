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

	<footer class="site-footer">

  	<div class="site-social">
			<?php
				$assets_directory = get_template_directory_uri() . "/assets/social/";
			  $social_menu = wp_get_nav_menu_items( get_nav_menu_locations()['menu-social'], array(
					'theme_location' => 'menu-social',
					'container' => 'div',
					'container_id' => '',
					'container_class' => 'nav-footer',
					'items_wrap' => '<ul>%3$s</ul>',
				));

				foreach ($social_menu as $social_media) {
					$title = strtolower($social_media->title);
					if ( in_array($title, ['facebook', 'instagram', 'pinterest', 'twitter']) ) {
						$url = $social_media->url;
  					echo '<a href="' . $url . '" target="_blank"><img src="' . $assets_directory . $title . '.svg" alt="' . $title . '" width="44" height="44"></a>';
					}
				}
			?>
		</div>

		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-footer',
				'container' => 'div',
				'container_id' => '',
				'container_class' => 'nav-footer',
				'items_wrap' => '<ul>%3$s</ul>',
			) );
		?>

		<div class="site-copyright">
			<span>Copyright © 2019 Passport &amp; Phone.</span>
		</div>

	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
