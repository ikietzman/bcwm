<?php
/*
 Template Name: Contact
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div class="page-header" style="background-image:url('<?php the_field('header_image'); ?>')">

									<?php
										if ( function_exists('yoast_breadcrumb') ) {
											yoast_breadcrumb('
											<p id="breadcrumbs">','</p>
											');
										}
									?>
									<h1 class="page-title"><?php the_title(); ?></h1>
									<h3 class="first-h3">Boyer Corporon Wealth Management</h3>
									<p><a href="<?php the_field('address_link', 'option'); ?>" target="_blank"><?php the_field('address_1', 'option'); ?>, <?php the_field('address_2', 'option'); ?></a></p>
									<p><a href="<?php the_field('address_link', 'option'); ?>" target="_blank"><?php the_field('address_3', 'option'); ?></a></p>
									<h3>Phone</h3>
									<p><?php the_field('phone', 'option'); ?></p>
									<h3>Toll Free</h3>
									<p><?php the_field('toll_free_phone', 'option'); ?></p>
									<h3>Fax</h3>
									<p><?php the_field('fax', 'option'); ?></p>
									<h3>Email</h3>
									<p><?php the_field('email', 'option'); ?></p>
									<h3>Follow Us!</h3>
									<?php

										// check if the repeater field has rows of data
										if( have_rows('social_media') ):

										 	// loop through the rows of data
										    while ( have_rows('social_media') ) : the_row();

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

							<div class="page-content">
								<div class="page-content-container">
									<img id="contact-line" src="<?php echo get_template_directory_uri()?>/library/images/contact-line.png" />
									<div class="page-content-inner">
										<h2><?php the_field('form_title'); ?></h2>
										<?php the_content(); ?>
									</div>
								</div>
							</div>



							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
