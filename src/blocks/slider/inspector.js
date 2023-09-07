/**
 * Internal dependencies
 */

/**
 * Inspector controls
 */

const { __ } = wp.i18n;

const {
	PanelBody,
	SelectControl,
	RangeControl,
	RadioControl,
} = wp.components;

const {
	InspectorControls,
} = wp.blockEditor || wp.editor;

const { Component, Fragment } = wp.element;

export default class Inspector extends Component {
	render() {
		const {
			attributes: {
				category_id,
				filter_type,
				number_products,
				widget_effect,
				slider_auto_scroll,
				effect_delay,
				effect_timeout,
				effect_speed,
				image_size,
			},
			setAttributes,
		} = this.props;

		const filterList = [
			{ label: __( 'Newest' ), value: 'recent' },
			{ label: __( 'Featured' ), value: 'featured' },
			{ label: __( 'On Sale' ), value: 'onsale' },
		];

		const widgetEffects = [
			...JSON.parse( pslider_block_editor.widgetEffects ),
		];
		
		const catList = [
			{ label: __( 'Select a Category' ), value: '' },
			...JSON.parse( pslider_block_editor.catList ),
		];

		const imageSizes = [
			...JSON.parse( pslider_block_editor.imageSizes ),
		];

		return (
			<InspectorControls>
				<PanelBody title={ __( 'Source Settings' ) }>
					<SelectControl
						label={ __( 'Category' ) }
						value={ category_id ? category_id : '' }
						onChange={ value => setAttributes( { category_id: value } ) }
						options={ catList }
					/>
					<SelectControl
						label={ __( 'Select Filter' ) }
						value={ filter_type ? filter_type : 'recent' }
						onChange={ value => setAttributes( { filter_type: value } ) }
						options={ filterList }
					/>
					<RangeControl
						label={ __( 'Number of products' ) }
						help={ __( 'Important! Set -1 to show all products. Warning - Setting large numbers (unlimited) could / will have an  impact on page load speed on some sites.' ) }
						value={ number_products }
						onChange={ ( value ) =>
							setAttributes( { number_products: value } )
						}
						min={ -1 }
					/>
				</PanelBody>
				<PanelBody title={ __( 'Slider Settings' ) }>
					<SelectControl
						label={ __( 'Widget Effect' ) }
						value={ widget_effect ? widget_effect : 'fade' }
						onChange={ value => setAttributes( { widget_effect: value } ) }
						options={ widgetEffects }
					/>
				</PanelBody>
				<PanelBody title={ __( 'Transition Settings' ) }>
					<RadioControl
						label={ __( 'Transition Method' ) }
						options={ [
							{ value: 'no', label: __( 'MANUAL' ) },
							{ value: 'yes', label: __( 'AUTO' ) },
						] }
						selected={ slider_auto_scroll }
						onChange={ value => setAttributes( { slider_auto_scroll: value } ) }
					/>
					{ 'yes' === slider_auto_scroll && (
						<RangeControl
							label={ __( 'Auto Start Delay' ) }
							help={ __( 'seconds' ) }
							value={ effect_delay }
							onChange={ ( value ) =>
								setAttributes( { effect_delay: value } )
							}
							min={ 1 }
						/>
					) }
					<RangeControl
						label={ __( 'Time Between Transitions' ) }
						help={ __( 'seconds' ) }
						value={ effect_timeout }
						onChange={ ( value ) =>
							setAttributes( { effect_timeout: value } )
						}
						min={ 1 }
					/>
					<RangeControl
						label={ __( 'Transition Effect Speed' ) }
						help={ __( 'seconds' ) }
						value={ effect_speed }
						onChange={ ( value ) =>
							setAttributes( { effect_speed: value } )
						}
						min={ 1 }
					/>
					<SelectControl
						label={ __( 'Thumbnail Size' ) }
						value={ image_size ? image_size : '' }
						onChange={ value => setAttributes( { image_size: value } ) }
						options={ imageSizes }
					/>
				</PanelBody>
			</InspectorControls>
	 	);
	}
}