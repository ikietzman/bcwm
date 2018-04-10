<?php
/*
 Template Name: Homepage
*/
?>

<?php get_header(); ?>

			<div id="content">
				<img id="home-line-1" src="<?php echo get_template_directory_uri()?>/library/images/home-line.png" />
				<div id="inner-content" class="cf">
						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<div class="home-section-1">
									<h1><?php the_field('slogan'); ?></h1>
									<p><?php the_field('intro')?></p>
									<div class="link-boxes link-boxes__main">
										<?php

											// check if the repeater field has rows of data
											if( have_rows('main_link_boxes') ):

											 	// loop through the rows of data
											    while ( have_rows('main_link_boxes') ) : the_row();

											        // display a sub field value
															echo '<div class="link-box-container"><div class="link-box link-box__main">';
															echo '<a href="' . site_url() . get_sub_field('link') . '">' . get_sub_field('label') .'</a>';
															echo '</div></div>';

											    endwhile;

											else :

											    // no rows found

											endif;

											?>

									</div>
									<div class="team-image" id="team-image">
										<img src="<?php the_field('team_image'); ?>" />
									</div>
								</div>

								<div class="home-section-2">
									<img id="home-line-2" src="<?php echo get_template_directory_uri()?>/library/images/home-line-2.png" />
									<img id="home-line-3" src="<?php echo get_template_directory_uri()?>/library/images/home-line-3.png" />
									<div class="slogan-2" id="slogan-2">
										<?php the_field('slogan_2'); ?>
									</div>
									<h2 class="bottom-heading"><?php the_field('bottom_heading'); ?></h2>
									<div class="link-boxes link-boxes__secondary">
										<?php

											// check if the repeater field has rows of data
											if( have_rows('secondary_link_boxes') ):
													$i = 1;
											 	// loop through the rows of data
											    while ( have_rows('secondary_link_boxes') ) : the_row();

											        // display a sub field value
															echo '<div class="link-box-container"><div class="link-box link-box__secondary link-box__secondary__' . $i . '">';
															echo '<a class="main-link" href="' . site_url() . get_sub_field('link') . '">' . get_sub_field('label') .'</a>';
															echo '<a class="learn-more" href="' . site_url() . '">Learn More</a>';
															echo '</div></div>';
															$i++;
											    endwhile;

											else :

											    // no rows found

											endif;

											?>

									</div>

									<div class="recent-blog">

										<article>
											<h3>Commentary</h3>
											<div class="article-inner">
												<header class="article-header">
													<?php
														$args = array( 'numberposts' => '1' );
														$recent_posts = wp_get_recent_posts( $args );
														foreach( $recent_posts as $recent ){
															echo '<h1 class="h2 entry-title"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h1>';
															echo '<p class="byline entry-meta vcard">';
						                                                                        printf( __( '', 'bonestheme' ).' %1$s %2$s',
						                       								/* the time the post was published */
						                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
						                       								/* the author of the post */
						                       								'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
						                    							);
															echo '</p>';
															echo '<section class="entry-content cf">';
															//echo get_the_content($recent["ID"]);
															$content_post = get_post($recent["ID"]);
															echo wp_trim_words($content_post->post_content, 55);
															echo '</section>';
															echo '<div class="read-more">';
															echo '<a href="';
															the_permalink($recent["ID"]);
															echo '">Read More</a>';
															echo '</div>';
														}

														wp_reset_query();
													?>
												</header>
											</div>
										</article>
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
