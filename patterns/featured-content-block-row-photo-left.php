<?php
/**
 * The Featured Content - Row with Left Photo pattern.
 *
 * @since 1.0
 *
 * @version 1.0
 *
 * @package Featured Content Block
 */

register_block_pattern(
	'featured-content-block-patterns/featured-content-block-row-photo-left',
	array(
		'title'         => esc_html__( 'Featured Content - Row with Left Photo', 'featured-content-block' ),
		'viewportWidth' => 1200,
		'categories'    => array( 'featured-content-block-patterns' ),
		'description'   => 'A Featured Content Block in a row layout with the featured photo on the left',
		'content'       => '<!-- wp:group {"align":"wide","className":"featured-content-block-row-photo-left","layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide featured-content-block-row-photo-left"><!-- wp:featured-content-block/featured-content-block {"postId":1,"align":"wide"} -->
		<!-- wp:columns -->
		<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-featured-image /--></div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-title /-->

		<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read This Post', 'featured-content-block' ) . '"} /--></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		<!-- /wp:featured-content-block/featured-content-block --></div>
		<!-- /wp:group -->',
	)
);

