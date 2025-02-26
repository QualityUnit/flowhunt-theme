import { useBlockProps } from '@wordpress/block-editor';

import ChatbotOutput from './layouts/frontend/ChatbotOutput.jsx';
import './scss/editor.scss';
import './scss/style.scss';

const { registerBlockType } = wp.blocks;

registerBlockType( 'qu/chatbotoutput', {
	apiVersion: 2,
	title: 'Chatbot Output',
	icon: 'text',
	category: 'widgets',
	attributes: {
		title: {
			type: 'string',
			default: 'Chatbot Output',
		},
		content: {
			type: 'string',
			default: 'Content of chatbot',
		},
		timeReading: {
			type: 'string',
			default: '37 seconds',
		},
		countWords: {
			type: 'string',
			default: '576 words',
		},
		pointReadabilityGradeLevel: {
			type: 'string',
			default: '13.7',
		},
		pointReadabilityScore: {
			type: 'string',
			default: '37.2',
		},
	},

	edit: ( props ) => {
		const blockProps = useBlockProps();   //eslint-disable-line
		return (
			<div { ...blockProps }>
				<ChatbotOutput { ...props } />
			</div>
		);
	},

	save: () => {
		return null;
	},
} );
