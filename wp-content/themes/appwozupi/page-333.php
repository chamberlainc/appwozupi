<?php
/**
 * The template for Plant List
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package appwozupi
 */

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height">
			
			<div class="all-plants-list full-height">
			
				<div id="switch-group" class="green-header full-width display-table text-center white-color" style="display:none;">
				
					<div class="switch-left full-height vertical-middle text-right">
						<span class="med-vw-font">GRID VIEW</span>
					</div>
					
					
					<div class="switch-center full-height vertical-middle">
					<?php /* https://codepen.io/mburnette/pen/LxNxNg */ ?>
					<input type="checkbox" id="switch" checked/><label id="switch_label" for="switch">Toggle</label>
					</div>
					
					<div class="switch-right full-height vertical-middle text-left">
						<span class="med-vw-font">LIST VIEW</span>
					</div>
				
				</div>
				
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
	
				<div class="grid-view list-view full-width match-height apple-scroll" style="height:100%;">
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
					
					$audio_clip = get_field('audio_clip');
					//var_dump($audio_clip);
					$dakota_name = get_field('dakota_name');
					?>

					<div class="plant-btn one-fifth-width tablet-lrg-third float-left padding-med match-item">

							<div class="plant-name-btn float-left padding-med drk-grey-bg full-height" style="text-align:left;">
								<div class="float-left half-width tablet-full">
								<span class="white-color" style="font-size:20px;"><?php echo the_title(); ?><br/>Dakota Name: <?php echo $dakota_name ?><?php if ( isset($audio_clip) && $audio_clip !== "" ) : ?></br>Filename: <?php echo $audio_clip["filename"] ?><?php endif; ?></span>
								</div>
								<div class="float-left half-width tablet-full">
								<?php if ( isset($audio_clip) && $audio_clip !== "" ) : ?>
								<audio controls style="float:right">
									<source src="<?php echo $audio_clip['url'] ?>" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
								<?php endif; ?>
								</div>
							</div>

					</div>

					
					
				<?php endwhile; ?>
				
				</div>
				
				<?php wp_reset_query(); ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
