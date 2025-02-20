import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

import './scss/editor.scss';
import './scss/style.scss';

const { registerBlockType } = wp.blocks;
const TEMPLATE = [ [ 'qu/timelineitem' ] ];

registerBlockType( 'qu/timeline', {
	apiVersion: 2,
	title: 'Timeline',
	icon: 'clock',
	category: 'widgets',

	edit: () => {
		const blockProps = useBlockProps();   //eslint-disable-line
		return (
			<div { ...blockProps }>
				<InnerBlocks
					template={ TEMPLATE }
					renderAppender={ InnerBlocks.ButtonBlockAppender }
				/>
			</div>
		);
	},

	save: () => {
		return (
			<InnerBlocks.Content />
		);
	},
} );
