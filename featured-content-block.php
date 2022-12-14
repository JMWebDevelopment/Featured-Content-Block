<?php
/**
 * Plugin Name:       Featured Content Block
 * Plugin URI:        https://jacobmartella.com/downloads/featured-content-block/
 * Description:       Easily show a specific post or other custom post type on a page and customize how it looks.
 * Author:            Jacob Martella Web Development
 * Author URI:        https://jacobmartella.com
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       featured-content-block
 * Domain Path:       /languages
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
function featured_content_block_init() {
	register_block_type(
		__DIR__ . '/build',
		array(
			'render_callback' => 'featured_content_block_render_callback',
		)
	);
}
add_action( 'init', 'featured_content_block_init' );

/**
 * Render callback function.
 *
 * @param array    $attributes The block attributes.
 * @param string   $content    The block content.
 * @param WP_Block $block      Block instance.
 *
 * @return string The rendered output.
 */
function featured_content_block_render_callback( $attributes, $content, $block ) {
	ob_start();
	require plugin_dir_path( __FILE__ ) . 'build/template.php';
	return ob_get_clean();
}

function featured_content_block_get_post_types_list() {
	$post_types_args  = array(
		'public'             => true,
		'show_in_rest'       => true,
	);
	$post_types       = get_post_types( $post_types_args, 'objects' );
	$post_types_array = array();

	if ( $post_types ) {
		foreach ( $post_types as $post_type ) {
			if ( 'post' === $post_type->name || 'attachment' === $post_type->name ) {
				continue;
			}
			$post_type_array = array(
				'slug'  => $post_type->name,
				'title' => $post_type->labels->singular_name,
			);
			array_push( $post_types_array, $post_type_array );
		}
	}

	return $post_types_array;
}

function featured_content_block_enqueue_scripts() {

	wp_enqueue_script(
		'featured-content-block-post-type-variations',
		plugins_url( 'build/post-types-variations.js',  __FILE__ ),
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		'1.0.0',
		true
	);

	wp_localize_script(
		'featured-content-block-post-type-variations',
		'featuredContentBlock',
		array(
			'postTypes' => featured_content_block_get_post_types_list(),
		)
	);

}
add_action( 'enqueue_block_editor_assets', 'featured_content_block_enqueue_scripts' );

function featured_content_block_register_pattern_categories() {
	register_block_pattern_category(
		'featured-content-block-patterns',
    	array( 'label' => esc_html__( 'Featured Content Block', 'featured-content-block' ) )
	);
}
add_action( 'init', 'featured_content_block_register_pattern_categories' );

function featured_content_block_load_textdomain( $mofile, $domain ) {
	if ( 'my-domain' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
		$locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
		$mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
	}
	return $mofile;
}
add_filter( 'load_textdomain_mofile', 'featured_content_block_load_textdomain', 10, 2 );

// Load the block patterns
require_once plugin_dir_path( __FILE__ ) . 'patterns/patterns.php';
