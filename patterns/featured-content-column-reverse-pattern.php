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
	'featured-content-block-patterns/featured-content-column-reverse-pattern',
	array(
		'title'         => esc_html__( 'Featured Content - Column with Reverse Background', 'featured-content-block' ),
		'viewportWidth' => 370,
		'categories'    => array( 'featured-content-block-patterns' ),
		'description'   => 'A Featured Content Block in a column layout with a reverse color scheme',
		'content'       => '<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"black","textColor":"white","className":"featured-content-column-reverse-pattern","layout":{"type":"constrained"}} -->
		<div class="wp-block-group featured-content-column-reverse-pattern has-white-color has-black-background-color has-text-color has-background has-link-color"><!-- wp:featured-content-block/featured-content-block {"postId":1} -->
		<!-- wp:post-featured-image /-->

		<!-- wp:post-title /-->

		<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read This Post', 'featured-content-block' ) . '"} /-->
		<!-- /wp:featured-content-block/featured-content-block --></div>
		<!-- /wp:group -->',
	)
);

