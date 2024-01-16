<?php
/**
 * The template for displaying single plants
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package appwozupi
 */
 
$dakota_name = get_field('dakota_name');
$scientific_name = get_field('scientific_name');
$alternative_name = get_field('alternative_name');
$height = get_field('height');
$flowers = get_field('flowers');
$fruit = get_field('fruit');
$habitat = get_field('habitat');
$plant_characteristics = get_field('plant_characteristics');
$dakota_cultural_use = get_field('dakota_cultural_use');
$main_photo = get_field('main_photo');
$audio_clip = get_field('audio_clip');

if( !empty($main_photo) ) { 
	// vars
	$main_photo_url = $main_photo['url'];
	$main_photo_title = $main_photo['title'];
	$main_photo_alt = $main_photo['alt'];
	$main_photo_caption = $main_photo['caption'];

	// thumbnail
	$main_photo_size = 'thumbnail';
	$main_photo_thumb = $main_photo['sizes'][ $main_photo_size ];
}

$photo_gallery = get_field('photo_gallery');

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height white-color">
			
			<div class="full-width full-height padding-lrg">
				
				<?php if ( isset($main_photo_url) && $main_photo_url !== "" ) : ?>
				<div id="plant-images" class="float-left  relative" style="background:url('<?php echo $main_photo_url ?>') no-repeat 0% 0%; background-size:cover;">
					
					<?php if( $photo_gallery ): ?>
					<div class="gallery-button absolute">
						<i class="fas fa-images"></i>
					</div>
					<?php endif; ?>
					
					<div class="plant-slider absolute hide">
						<a id="first-image" href="<?php echo $main_photo_url ?>">image</a>
						<?php if( $photo_gallery ): ?>

							<?php foreach( $photo_gallery as $photo ): ?>
								
							<a href="<?php echo $photo['url']; ?>">image</a>
								
							<?php endforeach; ?>

						<?php endif; ?>
						
						<script>
						// Swipe Controls
						jQuery(function() {
						  jQuery("body").swipe( {
							//Generic swipe handler for all directions
							swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
								console.log(direction);
								
								<?php if ( isset($photo_gallery) && count($photo_gallery) > 1 ) : ?>
								// Check if gallery has more than one photo, if it does enable left and right swipe
								if ( direction === "left" ) { 
									// Gallery Controls
									jQuery('img.mfp-img').addClass('move-left');
									setTimeout(function(){
										jQuery('.mfp-arrow-right').trigger("click");
									},500); 
								}
								
								if ( direction === "right" ) { 
									// Gallery Controls
									jQuery('img.mfp-img').addClass('move-right');
									setTimeout(function(){
										jQuery('.mfp-arrow-left').trigger("click");
									},500); 
								}
								<?php endif ?>
								
								// Close gallery with swipe down
								if ( direction === "down" ) { 
									// Gallery Controls
									jQuery('img.mfp-img').addClass('move-down');
									setTimeout(function(){
										jQuery('.mfp-close').trigger("click");
									},500); 
									
								} 
							}
						  });

						  //Set some options later
						  jQuery(".mfp-wrap").swipe( {fingers:2} );
						});
						</script>
						
					</div>
					
					<div class="popup hide faded">
						<div class="display-table full-height full-width">
							<div class="vertical-middle">	
								
							</div>
						</div>
					</div>
					
				</div>
				<?php endif ?>
				
				<div id="plant-details" class="float-left">
					
					<div id="general-details" class="detail-section padding-lrg">
						<div class="section-header drk-grey-color uppercase font-bold pointer transition250">
							<div class="button-border display-table full-height full-width text-center">
								<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250">General Details</div>
							</div>
						</div>
						
						<div class="section-content drk-grey-bg">
							<h3 class="text-center drk-grey-bg full-width padding-sml uppercase">General Details</h3>
							
							<?php if ( $dakota_name !== "" ) : ?>
							<div class="plant-row full-width relative">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Dakota Name:</span></div> 
								<span class="row-content"><?php echo $dakota_name; ?></span>
								<?php if ( isset($audio_clip) && $audio_clip !== "" ) : ?>
								<div class="speaker-wrap"><div class="speaker"></div></div>
								<audio controls id="player">
									<source src="<?php echo $audio_clip['url'] ?>" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
								<?php endif ?>
							</div>
							<?php endif; ?>
							
							<?php if ( $scientific_name !== "" ) : ?>
							<div class="plant-row full-width">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Scientific Name:</span></div>
								<span class="row-content"><?php echo $scientific_name; ?></span>
							</div>
							<?php endif; ?>
							
							<?php if ( $alternative_name !== "" ) : ?>
							<div class="plant-row full-width">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Alternate Names:</span></div>
								<span class="row-content"><?php echo $alternative_name; ?></span>
							</div>
							<?php endif; ?>
							
							<?php if ( $height !== "" ) : ?>
							<div class="plant-row full-width">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Height:</span></div>
								<span class="row-content"><?php echo $height; ?></span>
							</div>
							<?php endif; ?>
							
							<?php if ( $flowers !== "" ) : ?>
							<div class="plant-row full-width">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Flowers:</span></div>
								<span class="row-content"><?php echo $flowers; ?></span>
							</div>
							<?php endif; ?>
							
							<?php if ( $fruit !== "" ) : ?>
							<div class="plant-row full-width">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Fruit:</span></div>
								<span class="row-content"><?php echo $fruit; ?></span>
							</div>
							<?php endif; ?>
							
							<?php if ( $habitat !== "" ) : ?>
							<div class="plant-row full-width">
								<div class="plant-row-title full-width overflow-hidden font-sml"><span class="padding-sml white-bg black-color float-left">Habitat:</span></div>
								<span class="row-content"><?php echo $habitat; ?></span>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( $plant_characteristics !== "" ) : ?>
					<div id="plant-characteristics" class="detail-section padding-lrg">
						<div class="section-header drk-grey-color uppercase font-bold pointer transition250"> <?php /* lt-grey-bg  */ ?>
							<div class="button-border display-table full-height full-width text-center">
								<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250">Plant Characteristics</div>
							</div>
						</div>
						
						<div class="section-content drk-grey-bg">
							<h3 class="text-center drk-grey-bg full-width padding-sml uppercase">Plant Characteristics</h3>
							<div class="content-wrap"><?php echo $plant_characteristics; ?></div>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( $dakota_cultural_use !== "" ) : ?>
					<div id="dakota-cultural-use" class="detail-section padding-lrg">
						<div class="section-header drk-grey-color uppercase font-bold pointer transition250">
							<div class="button-border display-table full-height full-width text-center">
								<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250">Dakota Cultural Use</div>
							</div>
						</div>
						
						<div class="section-content drk-grey-bg">
							<h3 class="text-center drk-grey-bg full-width padding-sml uppercase">Dakota Cultural Use</h3>
							<div class="content-wrap"><?php echo $dakota_cultural_use; ?></div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				
				<div id="plant-popup" class="faded padding-lrg transition500">
					<div id="plant-popup-inner" class="relative drk-grey-bg padding-med full-height full-width">
						<div id="plant-popup-content" class="apple-scroll white-color">
							
						</div>
						<div class="hide popup-buttons full-width lt-grey-bg text-center font-lrg">
							<div id="scroll-up" class="popup-button one-third-width float-left">
								<i class="fa fa-arrow-circle-up transition500" aria-hidden="true"></i>
							</div>
							<div id="scroll-down" class="popup-button one-third-width float-left">
								<i class="fa fa-arrow-circle-down transition500" aria-hidden="true"></i>
							</div>
							<div id="close-popup" class="popup-button one-third-width float-left">
								<i class="fa fa-times-circle transition500" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
				
				<script>
				
					jQuery(document).ready(function(){
					
						jQuery( "#general-details .section-header" ).click(function() {
							jQuery('.section-header').removeClass( "active" );
							jQuery(this).addClass( "active" );
							
							setTimeout(function(){
								jQuery('#plant-popup').addClass( "show" );
								
								var my_var = jQuery('#general-details .section-content').html();
								jQuery('#plant-popup-content').html(my_var);
								canScroll();
							},500);
						});
						
						jQuery( "#plant-characteristics .section-header" ).click(function() {
							jQuery('.section-header').removeClass( "active" );
							jQuery(this).addClass( "active" );
							
							setTimeout(function(){
								jQuery('#plant-popup').addClass( "show" );
								
								var my_var = jQuery('#plant-characteristics .section-content').html();
								jQuery('#plant-popup-content').html(my_var);
								canScroll();
							},500); 
						});
						
						jQuery( "#dakota-cultural-use .section-header" ).click(function() {
							jQuery('.section-header').removeClass( "active" );
							jQuery(this).addClass( "active" );
							
							setTimeout(function(){
								jQuery('#plant-popup').addClass( "show" );
								
								var my_var = jQuery('#dakota-cultural-use .section-content').html();
								jQuery('#plant-popup-content').html(my_var);
								canScroll();
							},500);
						});
						
						jQuery("#close-popup").click(function() { 
							jQuery('#plant-popup').addClass('slide-down');
							//jQuery('.section-header').removeClass( "active" );
							setTimeout(function(){
								jQuery('#plant-popup').removeClass('show');
								jQuery('#plant-popup').removeClass('slide-down');
							},300);
							setTimeout(function(){
								jQuery('.section-header').removeClass( "active" );
							},700);
						});
						
						jQuery('#scroll-up').on({
							'mousedown touchstart': function () {
								jQuery("#plant-popup-inner").animate({scrollTop: 0}, 2000);
							},
							'mouseup touchend': function () {
								jQuery("#plant-popup-inner").stop(true);
							}
						});

						jQuery('#scroll-down').on({
							'mousedown touchstart': function () {
								
								jQuery("#plant-popup-inner").animate({
									scrollTop: jQuery("#plant-popup-inner")[0].scrollHeight
								}, 2000);
								
							},
							'mouseup touchend': function () {
								jQuery("#plant-popup-inner").stop(true);
							}
						});	
						
						// Detect if popup can scroll
						function canScroll() { 
							setTimeout(function(){
								jQuery("#scroll-up").removeClass('can-scroll');
								jQuery("#scroll-down").removeClass('can-scroll');
								jQuery('#plant-popup-content').each(function(){
									if (jQuery(this)[0].scrollHeight > jQuery(this).parent().height()) {
										jQuery("#scroll-down").addClass('can-scroll');
										//alert(jQuery(this).height());
									}
								});
							},100); 
						}			

						jQuery('#plant-popup-inner').scroll(function() {
							var posTop = jQuery('#plant-popup-inner').scrollTop();
							if (posTop == 0) {
								jQuery("#scroll-up").removeClass('can-scroll');
							}
						});
						
						jQuery(function($) {
							$('#plant-popup-inner').on('scroll', function() {
								if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
									jQuery("#scroll-down").removeClass('can-scroll');
								} else { 
									jQuery("#scroll-down").addClass('can-scroll');
								}
								
								var atStart = jQuery("#plant-popup-inner").scrollTop();
								if ( atStart > 0 ) { 
									jQuery("#scroll-up").addClass('can-scroll');
								}
							})
						});

					});
					
				var getaudio = jQuery('#player')[0];
				/* Get the audio from the player (using the player's ID), the [0] is necessary */
				var mouseovertimer;
				/* Global variable for a timer. When the mouse is hovered over the speaker it will start playing after hovering for 1 second, if less than 1 second it won't play (incase you accidentally hover over the speaker) */
				var audiostatus = 'off';
				/* Global variable for the audio's status (off or on). It's a bit crude but it works for determining the status. */

				jQuery(document).on('mouseenter', '.speaker', function() {
				 /* Bonus feature, if the mouse hovers over the speaker image for more than 1 second the audio will start playing */
				 if (!mouseovertimer) {
				   mouseovertimer = window.setTimeout(function() {
					 mouseovertimer = null;
					 if (!jQuery('.speaker').hasClass("speakerplay")) {
					   getaudio.load();
					   /* Loads the audio */
					   getaudio.play();
					   /* Play the audio (starting at the beginning of the track) */
					   jQuery('.speaker').addClass('speakerplay');
					   return false;
					 }
				   }, 1000);
				 }
				});

				jQuery(document).on('mouseleave', '.speaker', function() {
				 /* If the mouse stops hovering on the image (leaves the image) clear the timer, reset back to 0 */
				 if (mouseovertimer) {
				   window.clearTimeout(mouseovertimer);
				   mouseovertimer = null;
				 }
				});

				jQuery(document).on('click touchend', '.speaker', function() {
				 /* Touchend is necessary for mobile devices, click alone won't work */
				 if (!jQuery('.speaker').hasClass("speakerplay")) {
				   if (audiostatus == 'off') {
					 jQuery('.speaker').addClass('speakerplay');
					 getaudio.load();
					 getaudio.play();
					 window.clearTimeout(mouseovertimer);
					 audiostatus = 'on';
					 return false;
				   } else if (audiostatus == 'on') {
					 jQuery('.speaker').addClass('speakerplay');
					 getaudio.play()
				   }
				 } else if (jQuery('.speaker').hasClass("speakerplay")) {
				   getaudio.pause();
				   jQuery('.speaker').removeClass('speakerplay');
				   window.clearTimeout(mouseovertimer);
				   audiostatus = 'on';
				 }
				});

				jQuery('#player').on('ended', function() {
				 jQuery('.speaker').removeClass('speakerplay');
				 /*When the audio has finished playing, remove the class speakerplay*/
				 audiostatus = 'off';
				 /*Set the status back to off*/
				});

				</script>
				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
