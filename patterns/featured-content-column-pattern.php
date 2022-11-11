<?php
/**
 * The Featured Content - Column pattern.
 *
 * @since 1.0
 *
 * @version 1.0
 *
 * @package Featured Content Block
 */

register_block_pattern(
	'featured-content-block-patterns/featured-content-column-pattern',
	array(
		'title'         => esc_html__( 'Featured Content - Column', 'featured-content-block' ),
		'viewportWidth' => 370,
		'categories'    => array( 'featured-content-block-patterns' ),
		'description'   => 'A Featured Content Block in a column layout',
		'content'       => '<!-- wp:group {"className":"featured-content-column-pattern","layout":{"type":"constrained"}} -->
		<div class="wp-block-group featured-content-column-pattern"><!-- wp:featured-content-block/featured-content-block {"postId":1} -->
		<!-- wp:post-featured-image /-->

		<!-- wp:post-title /-->

		<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read This Post', 'featured-content-block' ) . '"} /-->
		<!-- /wp:featured-content-block/featured-content-block --></div>
		<!-- /wp:group -->',
	)
);

