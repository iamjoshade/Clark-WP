<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package clark
 */

get_header();
?>

	

			<section class="ftco-section error-404 not-found">
				<div class="container">
        			<div class="row">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'clark-wp' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content heading-block text-center mb-3">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. try search for something else', 'clark-wp' ); ?></p>

					<?php get_search_form();?>

				</div><!-- .page-content -->
			</div>
		</div>

			</section><!-- .error-404 -->

		

<?php
get_footer();
