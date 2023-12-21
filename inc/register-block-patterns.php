<?php

/**
 * Block patterns
 *
 * @package baryte
 * @since 1.0.0
 */

/**
 * Registers block patterns and block pattern categories.
 *
 * @since 1.0.0
 *
 * @return void
 */
function baryte_register_block_patterns()
{

	/**
	 * Register an example block pattern category.
	 *
	 * @since 1.0.0
	 */
	register_block_pattern_category(
		'theme',
		array('label' => esc_html__('Theme patterns', 'baryte'))
	);
}
add_action('init', 'baryte_register_block_patterns', 9);

/**
 * This is an example of how to unregister a core block pattern and a block pattern category.
 * Must be called after the patterns and pattern categories that you want to unregister have been added.
 *
 * @see https://developer.wordpress.org/reference/functions/unregister_block_pattern/
 * @see https://developer.wordpress.org/reference/functions/unregister_block_pattern_category/
 *
 * @since 1.0.0
 *
 * @return void
 */
function baryte_unregister_patterns()
{
	unregister_block_pattern('core/query-small-posts');
	unregister_block_pattern('core/query-large-title-posts');
	unregister_block_pattern('core/query-offset-posts');
	unregister_block_pattern_category('featured');
}
add_action('init', 'baryte_unregister_patterns', 10);
