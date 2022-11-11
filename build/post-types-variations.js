const postTypes = featuredContentBlock.postTypes;
console.log(Array.from( postTypes ));
for (var i = 0; i < postTypes.length; i++){
	wp.blocks.registerBlockVariation( 'featured-content-block/featured-content-block', {
		name: postTypes[i].title,
		title: 'Featured Content Block - ' + postTypes[i].title,
		attributes: { postType: postTypes[i].slug },
	} );
}
