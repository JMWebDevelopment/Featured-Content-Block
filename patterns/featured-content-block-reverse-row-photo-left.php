<?php
/**
 * The Featured Content - Row with Left Photo and Reverse Background pattern.
 *
 * @since 1.0
 *
 * @version 1.0
 *
 * @package Featured Content Block
 */

register_block_pattern(
	'featured-content-block-patterns/featured-content-block-reverse-row-photo-left',
	array(
		'title'         => esc_html__( 'Featured Content - Row with Left Photo and Reverse Background', 'featured-content-block' ),
		'viewportWidth' => 1200,
		'categories'    => array( 'featured-content-block-patterns' ),
		'description'   => 'A Featured Content Block in a row layout with the featured photo on the left and a reverse background',
		'content'       => '<!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"black","textColor":"white","className":"featured-content-block-reverse-row-photo-left","layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide featured-content-block-reverse-row-photo-left has-white-color has-black-background-color has-text-color has-background has-link-color"><!-- wp:featured-content-block/featured-content-block {"postId":1837,"align":"wide"} -->
		<!-- wp:columns -->
		<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-featured-image {"style":{"spacing":{"margin":{"bottom":"0px"}}}} /--></div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"15px","right":"15px","bottom":"15px","left":"15px"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:post-title /-->

		<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read This Post', 'featured-content-block' ) . '"} /--></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		<!-- /wp:featured-content-block/featured-content-block --></div>
		<!-- /wp:group -->',
	)
);

