<?php
/*
 Template Name: Publications List
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
								<div class="page-content-left" id="page-content-left">
									<div class="page-content-left-inner">
										<h2>Financial<br>Planning</h2>
											<ul class="publications-nav">
												<li id="education"><a href="#education-section">Education Planning</a></li>
												<li id="retirement"><a href="#retirement-section">Retirement Planning</a></li>
												<li id="insurance"><a href="#insurance-section">Insurance Planning</a></li>
												<li id="tax"><a href="#tax-section">Tax Planning</a></li>
												<li id="estate"><a href="#estate-section">Estate Planning</a></li>
												<li id="philanthropic"><a href="#philanthropic-section">Philanthropic Planning</a></li>
											</ul>
										<h2>Portfolio<br>Management</h2>
										<ul class="publications-nav">
											<li id="securities"><a href="#securities-section">Securities</a></li>
											<li id="economics"><a href="#economics-section">Economics</a></li>
											<li id="behavioral"><a href="#behavioral-section">Behavioral Finance</a></li>
										</ul>
									</div>
								</div>
								<div class="page-content-right" id="page-content-right">
									<div class="page-content-right-inner">

										<a name="education-section"></a>
										<div class="publication-category open" id="publication-category-education">
											<h3>Education Planning</h3>
											<?php
												$args = array( 'category_name' => 'Education Planning', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="retirement-section"></a>
										<div class="publication-category" id="publication-category-retirement">
											<h3>Retirement Planning</h3>
											<?php
												$args = array( 'category_name' => 'Retirement Planning', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="insurance-section"></a>
										<div class="publication-category" id="publication-category-insurance">
											<h3>Insurance Planning</h3>
											<?php
												$args = array( 'category_name' => 'Insurance Planning', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="tax-section"></a>
										<div class="publication-category" id="publication-category-tax">
											<h3>Tax Planning</h3>
											<?php
												$args = array( 'category_name' => 'Tax Planning', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="estate-section"></a>
										<div class="publication-category" id="publication-category-estate">
											<h3>Estate Planning</h3>
											<?php
												$args = array( 'category_name' => 'Estate Planning', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="philanthropic-section"></a>
										<div class="publication-category" id="publication-category-philanthropic">
											<h3>Philanthropic Planning</h3>
											<?php
												$args = array( 'category_name' => 'Philanthropic Planning', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="securities-section"></a>
										<div class="publication-category" id="publication-category-securities">
											<h3>Securities</h3>
											<?php
												$args = array( 'category_name' => 'Securities', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="economics-section"></a>
										<div class="publication-category" id="publication-category-economics">
											<h3>Economics</h3>
											<?php
												$args = array( 'category_name' => 'Economics', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
										</div>

										<a name="behavioral-section"></a>
										<div class="publication-category" id="publication-category-behavioral">
											<h3>Behavioral Finance</h3>
											<?php
												$args = array( 'category_name' => 'Behavioral Finance', 'post_type' =>  'acme_product' );
												$postslist = get_posts( $args );
												foreach ($postslist as $post) :  setup_postdata($post);
												?>
												<h2><?php the_title(); ?></h2>
												<div class="post-content"><?php the_content(); ?></div>
												<?php endforeach; ?>
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
