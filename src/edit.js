/**
 * WordPress dependencies
 */
 import { __ } from '@wordpress/i18n';
 import {
	 useBlockProps,
	 InspectorControls,
	 InnerBlocks,
 } from '@wordpress/block-editor';
 import {
	 SelectControl,
	 PanelBody,
	 ComboboxControl,
 } from '@wordpress/components';
 import { useSelect } from '@wordpress/data';
 import {
	 useState,
 } from '@wordpress/element';

 /**
  * Internal dependencies
  */
 import './editor.scss';

 /**
  * The edit function describes the structure of your block in the context of the
  * editor. This represents what the editor will render when the block is used.
  *
  * @param {Object} props All props passed to this function.
  * @return {WPElement}   Element to render.
  */
 export default function Edit( props ) {
	 const {
		 attributes,
	 } = props;

	 const {
		 postId,
		 postType,
	 } = attributes;

	 function getPosts() {
		 let options = [];
		 const posts = wp.data.select( 'core' ).getEntityRecords( 'postType', postType, { per_page: -1 } );
		 if ( null === posts ) {
			 return options;
		 }
		 posts.forEach( ( post ) => {
			 options.push( { value: post.id, label: post.title.rendered } );
		 } );
		 return options;
	 }

	 const [ filteredOptions, setFilteredOptions ] = useState( getPosts() );

	 const inspectorControls = (
		 <>
			 <InspectorControls>
				 <PanelBody title={ __( 'Featured Content Settings', 'featured-cotent-block' ) }>
					 <ComboboxControl
						 label={ __( 'Select Post', 'featured-cotent-block' ) }
						 value={ postId }
						 onChange={ ( id ) => props.setAttributes( { postId: parseInt( id ) } ) }
						 options={ getPosts() }
						 onFilterValueChange={ ( inputValue ) =>
							 setFilteredOptions(
								 getPosts().filter( ( option ) =>
									 option.label
										 .toLowerCase()
										 .startsWith( inputValue.toLowerCase() )
								 )
							 )
						 }
					 />
				 </PanelBody>
			 </InspectorControls>
		 </>
	 );

	 if ( 0 === postId ) {
		 return (
			 <>
				 { inspectorControls }
				 <p { ...useBlockProps() }>
					 { __(
						 'Please select a post from the right side',
						 'featured-cotent-block'
					 )
					 }
				 </p>
			 </>
		 );
	 }

	 return (
		 <>
			 { inspectorControls }
			 <div { ...useBlockProps() }>
				 <InnerBlocks />
			 </div>
		 </>
	 );
 }
