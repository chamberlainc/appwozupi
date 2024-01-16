<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appwozupi
 */

?>

	</div><!-- #content -->

	
	
	</div>
	
	</div><!--  #content-inner -->
	
	<footer id="colophon" class="site-footer">
	
		<div id="footer-nav" class="white-color fixed full-width text-center display-table transition500">
			
			<div class="vertical-middle one-third-width">
				<?php /* /choose-tour-method/ */ ?>
				<a href="javascript:;" id="nav-btn-main" class="footer-nav-1 display-table inherit-height full-width hover-glow black-bg">
					<div class="footer-btn full-width inherit-height vertical-middle">
						<div class="footer-btn-inner full-width padding-med">
							<i class="fa fa-bars font-lrg"></i> 
						</div>
					</div>
				</a>
			</div>
			
			<div class="vertical-middle one-third-width">
				<?php /* /scan-qr-code-new/ */ ?>
				<a href="javascript:;" id="nav-btn-qr" class="footer-nav-1 display-table inherit-height full-width hover-glow black-bg">
					<div class="footer-btn full-width inherit-height vertical-middle">
						<div class="footer-btn-inner full-width padding-med">
							<i class="fa fa-qrcode font-lrg"></i><br/>
						</div>
					</div>
				</a>
			</div>
			
			<?php /* 
			<div class="vertical-middle one-qtr-width">
				<a href="/choose-tour-method/" class="transition-link footer-nav-1 display-table inherit-height full-width hover-glow black-bg">
					<div class="footer-btn full-width inherit-height vertical-middle">
						<div class="footer-btn-inner full-width padding-med">
							<i class="fas fa-map font-lrg"></i>
						</div>
					</div>
				</a>
			</div>
			*/ ?>
			
			<div class="vertical-middle one-third-width">
				<?php /* /plant-list/ */ ?>
				<a href="javascript:;" id="nav-btn-list" class="footer-nav-1 display-table inherit-height full-width hover-glow black-bg">
					<div class="footer-btn full-width inherit-height vertical-middle">
						<div class="footer-btn-inner full-width padding-med">
							<i class="fa fa-list-alt font-lrg"></i>
						</div>
					</div>
				</a>
			</div>
			
		</div>
		
		<div id="nav-menu-main" class="nav-menu nav-menu-0 nav-menu-hide transition500 drk-grey-bg full-width">
				
			<div class="nav-menu-inner drk-grey-bg overflow-hidden padding-med">
				<ul class="font-xlrg orange-color no-underline uppercase">
					<li><a id="main-nav-start" class="padding-med transition250" href="https://app.wozupi.com/" target="_self">Start Over</a></li>
					<?php /* 
					<li><a class="padding-med transition250" href="/">About</a></li>
					*/ ?>
					<li><a id="main-nav-list" class="padding-med transition250" href="javascript:;">Plant List</a></li>
					<li><a id="main-nav-qr" class="padding-med transition250" href="javascript:;">QR Code Scanner</a></li>
					<?php /* 
					<li><a class="padding-med transition250" href="/">Contact Support</a></li>
					*/ ?>
				</ul>
			</div>
			
		</div>
		
		<div id="nav-menu-qr" class="nav-menu nav-menu-1 nav-menu-hide transition500 drk-grey-bg">
				
			<div class="nav-menu-inner drk-grey-bg overflow-hidden padding-med">
			
				
				<div class="float-left half-width padding-med">
					<div class="scan-button section-header drk-grey-color uppercase font-bold pointer transition250" style="height:auto">
						<div class="button-border display-table full-height full-width text-center">
							<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250">
								<i class="fas fa-qrcode" style="font-size:40px;margin-bottom:10px;"></i><br/>
								<span class="">SCAN</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="float-left half-width padding-med">
					<a href="<?php echo esc_url( get_permalink(34) ); ?>" class="transition-link no-underline">
					<div class="section-header drk-grey-color uppercase font-bold pointer transition250" style="height:auto">
						<div class="button-border display-table full-height full-width text-center">
							<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250">
								<i class="fas fa-question-circle" style="font-size:40px;margin-bottom:10px;"></i><br/>
								<span class="">HELP</span>
							</div>
						</div>
					</div>
					</a>
				</div>
				
				<!--
				<div class="float-left half-width padding-med">
					<div class="scan-button action-button overflow-hidden pointer">
						<div class="display-table full-width full-height">
							<div class="vertical-middle">
								<i class="fas fa-qrcode"></i><br/>
								<span class="">SCAN QR CODE</span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="float-left half-width padding-med">		
					<a href="<?php echo esc_url( get_permalink(34) ); ?>" class="transition-link">
					<div class="how-button green-button action-button overflow-hidden pointer">
						<div class="display-table full-width full-height">
							<div class="vertical-middle">
								<i class="fas fa-question-circle"></i>
								<span class="">HELP</span>
							</div>
						</div>
					</div>
					</a>
				</div>
				-->
			</div>
			
			<div class="hide">
				<input type=text size=16 placeholder="Tracking Code" class=qrcode-text><label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1></label> 
				<input type=button value="Go" disabled>
			</div>
			
		</div>
		
		<div id="nav-menu-list" class="nav-menu nav-menu-2 nav-menu-hide transition500 drk-grey-bg">
			<div class="nav-menu-inner drk-grey-bg overflow-hidden full-height padding-med">
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
			</div>
		</div>
		
	</footer><!-- #colophon -->
	
	<div class="loading hide faded">
		<div class="display-table full-height full-width">
			<div class="vertical-middle">
				<div class="spinner">
					<div class="bounce1"></div>
					<div class="bounce2"></div>
					<div class="bounce3"></div>
				</div>
			</div>
		</div>
	</div>
	
	
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
