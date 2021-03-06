<?php get_header(); 
/**
 * Template Name: People page 2 columns
 * Description: A template for displaying people
 *
 */ ?>
<?php get_template_part( 'parts/page-header-2col'); ?> 

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<section class="entry-content">
							<div class="row">
							<?php the_content(); ?>
							
							<?php if( have_rows('persoon') ): ?>

							

									<?php

									$i = 0;		

									while( have_rows('persoon') ): the_row(); 

									// vars
									$type = get_sub_field('uu_people_type');
									$thumb = wp_get_attachment_image_src(get_sub_field('uu_people_image'), 'thumbnail');
									
									$naam = get_sub_field('uu_people_name');
									$omschrijving = get_sub_field('uu_people_desc');
									$rol = get_sub_field('uu_people_title');
									$email = get_sub_field('uu_people_email');
									$url = get_sub_field('uu_people_website');
									$titel = get_sub_field('uu_people_title_heading');	

								
									if($type == 'Kop') {
									$i = 0;	
										?>
									

									
									<h2 class="people-heading col-sm-12"><?php echo $titel; ?></h2>
									
									<?php 

									}  else {
									$i++;			
										?>
												
											<div class="people-item col-sm-6 <?php if($i & 1) { echo 'block-left';}; ?>">

												<div class="people-item-image col-sm-4">
													<img class="img-responsive" src="<?php echo $thumb[0]; ?>" alt="<?php echo get_the_title(get_field('uu_people_image')) ?>" />
												</div>

												<div class="people-item-content col-sm-8">	

												    	<div class="people-item-content-naam"><?php echo $naam; ?></div>
												    <?php if( $rol ): ?>	
												    	<div class="people-item-content-rol"><?php echo $rol; ?> </div>
												    <?php endif; ?>		
												    <?php if( $omschrijving ): ?>
														<div class="people-item-content-omschrijving">
																<?php
																if( get_field('uu_options_trim_people_description_fields', 'option') ) { 
																	$trim = wp_trim_words( $omschrijving, 20, '...');  
																	echo $trim;
																} else {
																echo $omschrijving;
																}
																?>
														</div>	
													<?php endif; ?>	
													<?php if( $url ): ?>
														<div class="people-item-content-url">
																<a href="<?php echo $url; ?>"><?php _e('Read more','uu2014'); ?></a>
														</div>		
													<?php endif; ?>
												    <?php if( $email ): ?>
														<div class="people-item-content-mail">
																<a href="mailto:<?php echo $email; ?>"><?php _e('Mail','uu2014'); ?></a>
														</div>	
													<?php endif; ?>
											

														
												</div>

											</div>

								

										<?php 
									}
									
								?>
								<?php
									endwhile;

								?>

							

				<?php endif; ?>
							</div>		
						</section>

						<footer class="article-footer">

							<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

						</footer>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

					</article>

				

				

			<?php endwhile; ?>				

			<?php else : ?>

			<?php get_template_part('includes/template','error'); // WordPress template error message ?>

			<?php endif; ?>

<?php get_template_part( 'parts/page-footer-2col'); ?> 

<?php get_footer();