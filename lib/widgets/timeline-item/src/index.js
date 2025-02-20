import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import TimelineItem from './layouts/frontend/TimelineItem.jsx';
import './scss/editor.scss';
import './scss/style.scss';

const { registerBlockType } = wp.blocks;

registerBlockType( 'qu/timelineitem', {
	apiVersion: 2,
	title: 'Timeline Item',
	icon: 'performance',
	category: 'widgets',
	parent: [ 'qu/timeline' ],
	attributes: {
		content: {
			type: 'string',
			default: 'Content of timeline',
		},
		time: {
			type: 'string',
			default: '0:06',
		},
	},
	edit: ( props ) => {
		const blockProps = useBlockProps(); // eslint-disable-line

		return (
			<div { ...blockProps }>
				<TimelineItem { ...props } />
				<InnerBlocks />
			</div>
		);
	},
	save: () => {
		const blockProps = useBlockProps.save(); // eslint-disable-line

		return (
			<div { ...blockProps }>
				<TimelineItem attributes={ attributes } />
				<InnerBlocks.Content />
			</div>
		);
	},
}
);
