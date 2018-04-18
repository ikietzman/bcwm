<?php
/*
 Template Name: Who We Are
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
								<div class="intro"><?php the_content(); ?></div>
								<div class="certifications">
									<h2>Certifications That Matter</h2>
									<?php

										// check if the repeater field has rows of data
										if( have_rows('icons') ):

										 	// loop through the rows of data
										    while ( have_rows('icons') ) : the_row();

										        // display a sub field value
														echo '<a href="' . get_sub_field('link') . '" target="_blank"><img src="' . get_sub_field('icon') .'" /></a>';

										    endwhile;

										else :

										    // no rows found

										endif;

										?>
									</div>
							</div>

							<div class="page-content">
								<img id="who-we-are-line-1" src="<?php echo get_template_directory_uri()?>/library/images/who-we-are-line-1.png" />
								<img id="who-we-are-line-2" src="<?php echo get_template_directory_uri()?>/library/images/who-we-are-line-2.png" />
								<div class="team-section">
									<h2 class="team-section-title"><?php the_field('team_section_title'); ?></h2>
									<?php

									// check if the repeater field has rows of data
									if( have_rows('teams') ):
										$i = 1;
										// loop through the rows of data
											while ( have_rows('teams') ) : the_row();

													// display a sub field value
													echo '<div class="bios bios' . $i . '">';
													echo '<h2>' . get_sub_field('team_title') .'</h2>';
													echo '<p>' . get_sub_field('description') .'</p>';
													echo '</div>';


														// check if the repeater field has rows of data
														if( have_rows('bios') ):
															$j = 1;
															// loop through the rows of data
																while ( have_rows('bios') ) : the_row();
																		// display a sub field value
																		$post_object = get_sub_field('bio_page');
																		echo '<div class="bio bio'.$i.'bio'.$j.'"><a href="' . get_permalink($post_object) . '"><div class="img-container"><img src="' . get_sub_field('thumbnail') .'" /></div></a>';
																		echo '<h3>' . get_the_title($post_object);
																		if(get_field('certifications', $post_object)) :
																			echo ', ' . get_field('certifications', $post_object);
																		endif;
																		echo '</h3></div>';
																		$j++;
																endwhile;

														else :

																// no rows found

														endif;
														$i++;


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
