featuredContentBlock.postTypes.foreach( function( postType, index, arr ) {
	wp.blocks.registerBlockVariation( 'featured-content-block/featured-content-block', {
		name: postType['title'],
		attributes: { postType: postType['slug'] },
	} );
} );
