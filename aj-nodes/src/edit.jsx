/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { InspectorControls, InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { Panel, PanelBody, PanelRow, RadioControl } from '@wordpress/components';
import Media from './components/Media.jsx';
import Popup from './components/Popup.jsx';
import DesignOption from './components/DesignOption.jsx';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';
/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @param  props
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

export default function Edit( props ) {
	const {
		attributes,
		setAttributes,
	} = props;
	const { bgDesignType, bgWidth, ctnShape, className } = attributes;

	const myCustomClassName = className ? className : undefined;
	const myCustomWidthClass = bgWidth ? 'content-width-border editor-' + bgWidth : undefined;
	const myCustomDesignClass = bgDesignType ? 'editor-' + bgDesignType : undefined;
	const myCustomShape = ctnShape ? 'editor-' + ctnShape : undefined;
	const classes = [ myCustomWidthClass, myCustomDesignClass, myCustomClassName, myCustomShape ];
	const blockProps = useBlockProps( {
		className: classes.join( ' ' ),
	} );
	return (

		<div { ...blockProps }>

			<InspectorControls>
				<Panel>
					<PanelBody title={ __( 'Container Width' ) } initialOpen={ true }>

						<PanelRow>
							<RadioControl
								help={ __( 'Please choose container width.' ) }
								selected={ bgWidth }
								options={ [

									{ label: 'Width 1358px (Default)', value: 'ctn' },
									{ label: 'Width 1488px', value: 'ctn-1488' },
									{ label: 'Width 1080px', value: 'ctn-1080' },
									{ label: 'Width 1060px', value: 'ctn-1060' },
									{ label: 'Width 980px', value: 'ctn-980' },
									{ label: 'Width 840px', value: 'ctn-840' },
									{ label: 'Width 720px', value: 'ctn-720' },
									{ label: 'Full Width Container', value: 'full-width-ctn' },
								]
								}
								onChange={ ( value ) => setAttributes( {
									bgWidth: value,
								} ) }
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody
						title={ __( 'Container Design' ) }
						className="dc-design-component"
						initialOpen={ true }
					>
						<DesignOption
							props={ props }
							value={ bgDesignType }
							DesignKey="bgDesignType"
							help="Click to select value"
							options={ [
								{ label: 'Container Black', value: 'ctn-black', display: '#171615' },

							] }
						/>
					</PanelBody>
				</Panel>

			</InspectorControls>
			<section
				className={
					[ bgDesignType, bgWidth ].join( ' ' )
				}
			>
				<InnerBlocks />
			</section>
		</div>
	);
}
