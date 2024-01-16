<?php
/**
 * The template for the Plant List
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package appwozupi
 */

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height">
			
			<div class="all-plants-list full-height">
			
				
				
				<script>
				 
				jQuery('#switch').click(function() {
					if ( jQuery('#switch').prop('checked') == true ) { 
						console.log("switch to list view");
						jQuery('.all-plants-list .grid-view').addClass('list-view');
					} else { 
						console.log("switch to grid view");
						jQuery('.all-plants-list .grid-view').removeClass('list-view');
						setTimeout(function(){
							gridResize();
						},100);
					}
				});
				
				</script>
				
				<?php 
					$query = new WP_Query(array(
					'post_type' => 'plants',
					'posts_per_page' => -1,
					'orderby'   => 'title',
					'order' => 'ASC',
					'post_status' => 'publish'
				));
				?>
	
				<div class="grid-view list-view full-width match-height apple-scroll padding-med">
				<?php while ($query->have_posts()) : ?>
					<?php 
					$query->the_post();
					$post_id = get_the_ID();
					
					$image = get_field('main_photo');

					if( !empty($image) ) { 

						// vars
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];

						// thumbnail
						$size = 'tile-image';
						$thumb = $image['sizes'][ $size ];
										
					}
					
					?>
					<a href="<?php the_permalink(); ?>" class="transition-link no-underline" title="<?php echo the_title(); ?>">
					<div class="plant-btn one-fifth-width tablet-lrg-third float-left padding-med match-item">
						
							<div class="plant-btn-inner full-width full-height text-center drk-grey-bg" style="<?php if ( $thumb != "" ) : ?>background:url('<?php echo $thumb ?>') no-repeat 50% 50%; background-size:cover;<?php endif; ?>">
								<?php /* 
								<div class="btn-text display-table full-width full-height">
									<div class="vertical-middle">
									<div class="plant-number white-color font-xlrg"><?php echo $post_id; //the_title(); ?></div>
									</div>
								</div>
								*/ ?>
							</div>
							<div class="plant-name-btn float-left padding-med drk-grey-bg full-height">
								<span class="white-color"><?php echo the_title(); ?></span>
							</div>
						
					</div>
					</a>
					
					
				<?php endwhile; ?>
				
				</div>
				
				<?php wp_reset_query(); ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
