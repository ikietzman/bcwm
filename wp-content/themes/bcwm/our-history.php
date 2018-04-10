<?php
/*
 Template Name: Our History
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">


						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div class="page-header">
								<?php
									if ( function_exists('yoast_breadcrumb') ) {
										yoast_breadcrumb('
										<p id="breadcrumbs">','</p>
										');
									}
								?>

								<div class="header-content">
									<h1 class="page-title"><?php the_field('header_title'); ?></h1>
									<?php the_content(); ?>
								</div>
								<img src="<?php the_field('header_image'); ?>" />
							</div>

							<div class="page-content">
								<img id="our-history-line" src="<?php echo get_template_directory_uri()?>/library/images/our-history-line.png" />
								<div class="page-content-inner">
									<?php

										// check if the repeater field has rows of data
										if( have_rows('content_sections') ):

											// loop through the rows of data
												while ( have_rows('content_sections') ) : the_row();

														// display a sub field value
														echo '<h2>'. get_sub_field('title') . '</h2>';
														echo get_sub_field('content');


												endwhile;

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
