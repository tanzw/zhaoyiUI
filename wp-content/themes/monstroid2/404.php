<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Monstroid2
 */
?>

<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '404', 'monstroid2-lite' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<h4><?php esc_html_e( 'The page not found.', 'monstroid2-lite' ); ?></h4>
		<p><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Visit home page', 'monstroid2-lite' ); ?></a></p>
		<p><?php esc_html_e( 'Unfortunately the page you were looking for could not be found. Maybe search can help.', 'monstroid2-lite' ); ?></p>

		<?php get_search_form(); ?>

	</div><!-- .page-content -->
</section><!-- .error-404 -->
