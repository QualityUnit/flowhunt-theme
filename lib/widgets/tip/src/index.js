import { useBlockProps } from '@wordpress/block-editor';

import Tip from './layouts/frontend/Tip.jsx';
import './scss/editor.scss';
import './scss/style.scss';

const { registerBlockType } = wp.blocks;

registerBlockType( 'qu/tip', {
	apiVersion: 2,
	title: 'Tip',
	icon: 'sticky',
	category: 'widgets',
	attributes: {
		title: {
			type: 'string',
			default: 'Tip',
		},
		content: {
			type: 'string',
			default: 'Content of tip',
		},
	},

	edit: ( props ) => {
		const blockProps = useBlockProps();   //eslint-disable-line
		return (
			<div { ...blockProps }>
				<Tip { ...props } />
			</div>
		);
	},

	save: () => {
		return null;
	},
} );
