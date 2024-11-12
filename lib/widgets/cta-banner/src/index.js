import { useBlockProps } from '@wordpress/block-editor';

import CTABanner from './layouts/frontend/CTABanner.jsx';
import './scss/editor.scss';
import './scss/style.scss';

const { registerBlockType } = wp.blocks;

registerBlockType( 'qu/ctabanner', {
	apiVersion: 2,
	title: 'CTA Banner',
	icon: 'tickets',
	category: 'widgets',
	attributes: {
		title: {
			type: 'string',
			default: 'Get started with your first flow',
		},
		content: {
			type: 'string',
			default: 'Flowhunt has a team of AI flow engineers ready to help you with AI Automation.',
		},
		buttonTry: {
			type: 'string',
			default: 'Try Flowhunt',
		},
		buttonTryUrl: {
			type: 'string',
			default: 'https://app.flowhunt.io/',
		},
		buttonExpert: {
			type: 'string',
			default: 'Talk to an Expert',
		},
		buttonExpertUrl: {
			type: 'string',
			default: 'https://calendly.com/liveagentsession/flowhunt-chatbot-demo',
		},
	},

	edit: ( props ) => {
		const blockProps = useBlockProps();   //eslint-disable-line
		return (
			<div { ...blockProps }>
				<CTABanner { ...props } />
			</div>
		);
	},

	save: () => {
		return null;
	},
} );
