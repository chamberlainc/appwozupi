<?php
/**
 * The template for the Front Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package appwozupi
 */

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height">
		
			<div class="display-table full-width full-height">			
				<div class="vertical-middle padding-xlrg">
				
					<div class="front-page-logo">
						<img src="https://www.wozupi.com/wp-content/themes/wozupi15/images/logo_wozupi.svg" alt="Wozupi Tribal Garden" style="">
					</div>
					
					<?php /* 
					<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare eu mauris a dapibus.</p>
					*/ ?>
					
					<a href="<?php echo esc_url( get_permalink(66) ); ?>" class="transition-link no-underline">
					<div class="section-header drk-grey-color uppercase font-bold pointer transition250 margin-bottom" style="height:auto">
						<div class="button-border three-qtr-width margin-center text-center margin-center">
							<div class="button-inner padding-lrg button-text border-rad-10 transition250">
								<span class="">Get Started</span>
							</div>
						</div>
					</div>
					</a>
					
					<p class="font-xsml text-center">© <?php echo date("Y"); ?> Shakopee Mdewakanton Sioux Community. All Rights Reserved.</p>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
