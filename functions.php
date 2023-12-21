<?php
define('BARYTE_VERSION', wp_get_theme()->get('Version'));

function baryte_setup()
{
	add_editor_style('./assets/css/style-shared.min.css');

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = ['button', 'quote', 'navigation', 'search'];
	foreach ($styled_blocks as $block_name) {
		$args = array(
			'handle' => "baryte-$block_name",
			'src'    => get_theme_file_uri("assets/css/blocks/$block_name.min.css"),
			'path'   => get_theme_file_path("assets/css/blocks/$block_name.min.css"),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style("core/$block_name", $args);
	}
}
add_action('after_setup_theme', 'baryte_setup');

function baryte_wp_overrides()
{
	wp_register_style('wp_overrides', get_theme_file_uri() . '/assets/css/wp-overrides.css');
	wp_enqueue_style('wp_overrides');
}
add_action('wp_enqueue_scripts', 'baryte_wp_overrides', PHP_INT_MAX);

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function baryte_styles()
{
	wp_enqueue_style(
		'baryte-style',
		get_stylesheet_uri(),
		[],
		BARYTE_VERSION
	);
	wp_enqueue_style(
		'baryte-shared-styles',
		get_theme_file_uri('assets/css/style-shared.min.css'),
		[],
		BARYTE_VERSION
	);
}
add_action('wp_enqueue_scripts', 'baryte_styles');

// Filters.
require_once get_theme_file_path('inc/filters.php');
require_once get_theme_file_path('inc/register-block-variations.php');
require_once get_theme_file_path('inc/register-block-styles.php');
require_once get_theme_file_path('inc/register-block-patterns.php');
