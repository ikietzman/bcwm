<?php
/*
 Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('
							<p id="breadcrumbs">','</p>
							');
						}
					?>

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div class="page-header">
									<h1><?php the_title(); ?></h1>


							</div>
							<div class="page-content">
								<?php the_content(); ?>
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
