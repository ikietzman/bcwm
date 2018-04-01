<?php
/*
 Template Name: What We Care About
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">


						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div class="page-header">
								<div class="page-header-inner">
									<?php
										if ( function_exists('yoast_breadcrumb') ) {
											yoast_breadcrumb('
											<p id="breadcrumbs">','</p>
											');
										}
									?>
									<h1 class="page-title"><?php the_title(); ?></h1>
									<div class="intro"><?php the_content(); ?></div>
								</div>
							</div>

							<div class="page-content">
									<?php

										// check if the repeater field has rows of data
										if( have_rows('causes') ):

											// loop through the rows of data
												while ( have_rows('causes') ) : the_row();

														// display a sub field value
														echo '<div class="cause">';
														echo '<a target="_blank" href="' . get_sub_field('link') . '"><img src="' . get_sub_field('image') .'" /></a>';
														echo '<a target="_blank" href="' . get_sub_field('link') . '"><h2>'. get_sub_field('title') . '</h2></a>';
														echo get_sub_field('content');
														echo '</div>';


												endwhile;

										else :

												// no rows found

										endif;

										?>

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
