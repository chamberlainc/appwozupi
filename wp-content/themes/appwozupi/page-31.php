<?php
/**
 * The template for the QR Reader
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package appwozupi
 */

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height padding-med">
			
			<div class="scan-button action-button half-width tablet-full full-height tablet-half-height-top overflow-hidden pointer float-left">
				<div class="display-table full-width full-height">
					<div class="vertical-middle">
						<i class="fas fa-qrcode"></i><br/>
						<span class="">SCAN QR CODE</span>
					</div>
				</div>
			</div>
				
			<div class="how-button action-button half-width tablet-full full-height tablet-half-height-top overflow-hidden pointer float-left">
				<div class="display-table full-width full-height">
					<div class="vertical-middle">
						<i class="fas fa-question-circle"></i>
						<span class="">How does this work?</span>
					</div>
				</div>
			</div>
			
			<div class="hide">
			<input type=text size=16 placeholder="Tracking Code" class=qrcode-text><label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1></label> 
			<input type=button value="Go" disabled>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
