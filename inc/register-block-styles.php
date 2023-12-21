<?php

/**
 * Block styles.
 *
 * @package baryte
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function baryte_register_block_styles()
{

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'baryte-flat-button',
			'label' => __('Flat button', 'baryte'),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/list',
		array(
			'name'  => 'baryte-list-underline',
			'label' => __('Underlined list items', 'baryte'),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/group',
		array(
			'name'  => 'baryte-box-shadow',
			'label' => __('Box shadow', 'baryte'),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'  => 'baryte-box-shadow',
			'label' => __('Box shadow', 'baryte'),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'  => 'baryte-box-shadow',
			'label' => __('Box shadow', 'baryte'),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/details',
		array(
			'name'  => 'baryte-plus',
			'label' => __('Plus & minus', 'baryte'),
		)
	);
}
add_action('init', 'baryte_register_block_styles');

/**
 * This is an example of how to unregister a core block style.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 * @see https://github.com/WordPress/gutenberg/pull/37580
 *
 * @since 1.0.0
 *
 * @return void
 */
function baryte_unregister_block_style()
{
	wp_enqueue_script(
		'baryte-unregister',
		get_stylesheet_directory_uri() . '/assets/js/unregister.js',
		array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
		BARYTE_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'baryte_unregister_block_style');
