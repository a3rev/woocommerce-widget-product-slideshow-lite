import Inspector from './inspector';

/**
 * WordPress dependencies
 */
const {
	BlockControls,
	useBlockProps,
} = wp.blockEditor || wp.editor;
const { __ } = wp.i18n;

const {
	Fragment
} = wp.element;
const { Placeholder } = wp.components;

export default function DGalleryEdit( props ) {
	const { attributes } = props;

	const { category_id } = attributes;

	const blockProps = useBlockProps();

	const containerElement = (
		<div { ...blockProps }>
			{ '' === category_id ? (
				<Placeholder label={ __( 'Source' ) }>
					{ __( 'Select a category to show product images from that.' ) }
				</Placeholder>
			) : (
				<img
					src={ pslider_block_editor.preview }
				/>
			) }
		</div>
	);

	return (
		<Fragment>
			<Inspector { ...{ ...props } } />
			<BlockControls group="block" />
			{ containerElement }
		</Fragment>
	);
}
