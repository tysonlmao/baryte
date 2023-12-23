<?php


define('BARYTE_VERSION', wp_get_theme()->get('Version'));
/**
 * baryte theme functions
 * @package baryte
 * @since 1.0.0
 */

if (!function_exists('baryte_setup')) :

	/**
	 * baryte setup
	 * @since 1.0.0
	 */
	function baryte_setup()
	{
		/**
		 * Add page excerpt support
		 * @since 1.0.0 
		 */
		add_post_type_support('page', 'excerpt');

		/**
		 * Add block styles support
		 * @since 1.0.0
		 */

		add_theme_support('wp-block-styles');
		/**
		 * Enqueue editor styles
		 * @since 1.0.0
		 */
		add_editor_style('./assets/css/style-shared.min.css');

		require_once get_theme_file_path('inc/register-block-styles.php');
	}
endif;

add_action('after_setup_theme', 'baryte_setup');


/**
 * baryte global style overrides
 * @since 1.0.0 
 */
if (!function_exists('baryte_wp_overrides')) :
	function baryte_wp_overrides()
	{
		wp_register_style('wp_overrides', get_theme_file_uri() . '/assets/css/wp-overrides.css');
		wp_enqueue_style('wp_overrides');
	}
endif;
add_action('wp_enqueue_scripts', 'baryte_wp_overrides', PHP_INT_MAX);

/**
 * baryte theme styles
 * @since 1.0.0 
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
