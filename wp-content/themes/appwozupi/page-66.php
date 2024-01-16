<?php
/**
 * The template for the Main Tour Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package appwozupi
 */

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height">
			
			<div class="display-table full-width full-height">			
				<div class="vertical-middle content-padding">
			
					<div class="float-left half-height landscape-half-width landscape-full-height padding-med">
						<div class="scan-button section-header drk-grey-color uppercase font-bold pointer transition250">
							<div class="button-border display-table full-height full-width text-center">
								<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250 font-xlrg">
									<i class="fas fa-qrcode font-xxlrg"></i><br/>
									<span class="button-text">USE QR CODES</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="float-left half-height landscape-half-width landscape-full-height padding-med">
						<div id="main-btn-list" class="section-header drk-grey-color uppercase font-bold pointer transition250">
							<div class="button-border display-table full-height full-width text-center">
								<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250 font-xlrg">
									<i class="far fa-list-alt font-xxlrg"></i><br/>
									<span class="button-text">USE PLANT LIST</span>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
