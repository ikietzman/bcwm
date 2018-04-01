<?php
/*
 Template Name: Bio
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
								<div class="bio-left">
									<h1 class="page-title"><?php the_title(); ?></h1>
									<h3><?php the_field('certifications'); ?></h3>
									<h2><?php the_field('title'); ?></h2>
									<?php the_content(); ?>
								</div>
								<div class="bio-right">
									<img src="<?php the_field('image'); ?>" />
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
