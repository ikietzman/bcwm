<?php
/*
 Template Name: Personal Wealth Management
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
										<div class="breadcrumbs>"<p id="breadcrumbs">','</p></div>
										');
									}
								?>
								<h1 class="page-title"><?php the_title(); ?></h1>
							</div>

							<div class="page-content">
								<img id="icm-line" src="<?php echo get_template_directory_uri()?>/library/images/icm-line.png" />
								<div class="page-content-inner">
									<h2><?php the_field('headline'); ?></h2>
									<?php the_content(); ?>
									<div class="ticker">
										<?php

											// check if the repeater field has rows of data
											if( have_rows('ticker') ):

											 	// loop through the rows of data
											    while ( have_rows('ticker') ) : the_row();

											        // display a sub field value
															echo '<div class="ticker-item">"' . get_sub_field('item') . '"</div>';

											    endwhile;

											else :

											    // no rows found

											endif;

											?>
									</div>
									<?php the_field('content_section_2'); ?>
									<h3>PWM Services</h3>
									<?php

										// check if the repeater field has rows of data
										if( have_rows('pwm_services') ):
											echo '<div class="services-container">';
											// loop through the rows of data
												while ( have_rows('pwm_services') ) : the_row();

														// display a sub field value
														echo '<div class="services-item"><a href="' . site_url() . '/news/publications-list/#' . get_sub_field('link') . '">' . get_sub_field('item') . '</a></div>';

												endwhile;
											echo '</div>';
										else :

												// no rows found

										endif;

										?>
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
