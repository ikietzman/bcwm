<?php
/*
 Template Name: Publications
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
								<h1 class="page-title"><?php the_title(); ?></h1>
							</div>

							<div class="page-content">
								<div class="page-content-inner">

									<h2>Financial Planning</h2>
									<div class="link-boxes link-boxes__main">

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Education Planning</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Retirement Planning</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Insurance Planning</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Tax Planning</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Estate Planning</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Philanthropic Planning</a>
											</div>
										</div>
									</div>

									<h2>Portfolio Management</h2>
									<div class="link-boxes link-boxes__main">

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Securities</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Economics</a>
											</div>
										</div>

										<div class="link-box-container">
											<div class="link-box link-box__main">
												<a href="<?php echo site_url(); ?>/publications-list">Behavioral Finance</a>
											</div>
										</div>

									</div>
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
