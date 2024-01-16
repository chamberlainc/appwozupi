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
		<main id="main" class="site-main full-height">
			
			<div class="display-table full-width full-height">			
				<div class="content-padding vertical-middle">

					<div class="full-width landscape-tablet-half float-left">
						<ol class="list-numbered">
							<li>Press the <strong>SCAN</strong> ( <i class="fas fa-qrcode"></i> ) button to open your devices camera.</li>
							<li>Hold your device over a QR Code so that it’s clearly visible within your screen.</li>
							<li>If necessary, press the button. (Some devices will automatically scan the code)</li>
							<li>Once the code is processed, you will navigate to the specific page.</li>
						</ol>
					</div>
					
					<div class="full-width landscape-tablet-half float-left padding-lrg">
						<div class="scan-button section-header full-width drk-grey-color uppercase font-bold pointer transition250" style="height:auto">
							<div class="button-border full-height half-width landscape-tablet-full margin-center text-center">
								<div class="button-inner full-width display-block padding-lrg button-text border-rad-10 transition250">
									<i class="fas fa-qrcode" style="font-size:40px;margin-bottom:10px;"></i><br/>
									<span class="">SCAN</span>
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
