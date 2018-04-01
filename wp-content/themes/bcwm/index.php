<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="page-header">
								<p id="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="http://localhost/bcwm_dev/" rel="v:url" property="v:title">Home</a> &gt; <span rel="v:child" typeof="v:Breadcrumb"><a href="http://localhost/bcwm_dev/news/" rel="v:url" property="v:title">News</a> &gt; <span class="breadcrumb_last">Commentary</span></span></span></span></p>
								<h1>Commentary</h1>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
								<div class="search-boxes-container">
									<div class="search-boxes">
										<h3>Investment Commentary Sign Up</h3>
										<input type="text"><input type="submit" value="Submit">
									</div>

									<div class="search-boxes">
										<h3>Seach BCWM Archives</h3>
										<?php echo get_search_form(); ?>
										<select name="archive-dropdown" 		onchange="document.location.href=this.options[this.selectedIndex].value;">
										  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
										  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
										</select>
									</div>
								</div>
							</div>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
								<div class="article-inner">
									<header class="article-header">

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline entry-meta vcard">
                                                                        <?php printf( __( '', 'bonestheme' ).' %1$s %2$s',
                       								/* the time the post was published */
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
									</p>

								</header>

									<section class="entry-content cf">
									<?php echo wp_trim_words(get_the_content(), 55); ?>
								</section>
								<div class="read-more">
									<a href="<?php the_permalink(); ?>">Read More</a>
								</div>
								</div>
							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

				</div>

			</div>


<?php get_footer(); ?>
