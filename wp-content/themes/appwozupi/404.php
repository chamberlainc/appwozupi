<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package appwozupi
 */

get_header(); ?>

	<div id="primary" class="content-area full-height">
		<main id="main" class="site-main full-height">
		
			<div class="display-table full-width full-height">			
				<div class="vertical-middle content-padding">
				
					<div class="float-left half-height landscape-half-width landscape-full-height padding-med">
						<div class="display-table full-width full-height">			
							<div class="vertical-middle padding-lrg text-center">
								<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'That page can&rsquo;t be found.', 'appwozupi' ); ?></h1>
								</header><!-- .page-header -->
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Try using the plant list.', 'appwozupi' ); ?></p>
							</div>
						</div>
					</div>
					
					<div class="float-left half-height landscape-half-width landscape-full-height padding-med">
						<div id="main-btn-list" class="section-header drk-grey-color uppercase font-bold pointer transition250">
							<div class="button-border display-table full-height full-width text-center">
								<div class="button-inner vertical-middle padding-lrg button-text border-rad-10 transition250 font-xlrg">
									<i class="far fa-list-alt font-xxlrg"></i><br/>
									<span class="button-text">PLANT LIST</span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
