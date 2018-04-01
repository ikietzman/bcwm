			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<div class="footer-top">
						<div class="footer-logo">
							<img src="<?php the_field('logo_footer', 'option'); ?>" />
						</div>
						<div class="footer-contact">
							<div class="footer-address">
								<p><?php the_field('address_1', 'option'); ?></p>
								<p><?php the_field('address_2', 'option'); ?></p>
								<p><?php the_field('address_3', 'option'); ?></p>
							</div>
							<div class="footer-phone">
								<p>Phone: <?php the_field('phone', 'option'); ?></p>
								<p>Toll free: <?php the_field('toll_free_phone', 'option'); ?></p>
								<p>Fax: <?php the_field('fax', 'option'); ?></p>
							</div>
						</div>
					</div>

					<div class="footer-bottom">
						<div class="footer-bottom__left">
							<nav role="navigation">
								<?php wp_nav_menu(array(
		    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
		    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
		    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
		    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
		    					'theme_location' => 'footer-links',             // where it's located in the theme
		    					'before' => '',                                 // before the menu
		    					'after' => '',                                  // after the menu
		    					'link_before' => '',                            // before each link
		    					'link_after' => '',                             // after each link
		    					'depth' => 0,                                   // limit the depth of the nav
		    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
								)); ?>
							</nav>

							<p class="source-org copyright copyright_desktop">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>, LLC</p>
						</div>

						<div class="footer-bottom__right">
							<?php

								// check if the repeater field has rows of data
								if( have_rows('social_media', 'option') ):

								 	// loop through the rows of data
								    while ( have_rows('social_media', 'option') ) : the_row();

								        // display a sub field value
												echo '<div class="social_media__icon">';
												echo '<a href="' . get_sub_field('link') . '"><img src="';
								        echo get_sub_field('icon');
												echo '" /></a></div>';

								    endwhile;

								else :

								    // no rows found

								endif;

								?>
						</div>

						<p class="source-org copyright copyright_mobile">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>, LLC</p>
					</div>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
