<?php
/**
 * Plugin Name:       Featured Content Block
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       featured-content-block
 *
 * @package           featured-content-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function featured_content_block_featured_content_block_block_init() {
	register_block_type(
		__DIR__ . '/build',
		array(
			'render_callback' => 'featured_content_block_featured_content_block_render_callback',
		)
	);
}
add_action( 'init', 'featured_content_block_featured_content_block_block_init' );

/**
 * Render callback function.
 *
 * @param array    $attributes The block attributes.
 * @param string   $content    The block content.
 * @param WP_Block $block      Block instance.
 *
 * @return string The rendered output.
 */
function featured_content_block_featured_content_block_render_callback( $attributes, $content, $block ) {
	ob_start();
	require plugin_dir_path( __FILE__ ) . 'build/template.php';
	return ob_get_clean();
}
