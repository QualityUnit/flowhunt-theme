const { RichText } = wp.blockEditor;
const { TextareaControl } = wp.components;
import TimelineItemIcon from '../../../images/chevron-right.svg';

export default function TimelineItem( { attributes, setAttributes } ) {
	const { content, time } = attributes;
	return (
		<div className="block-timeline-item">
			<div className="block-timeline-item__header">
				<div className="block-timeline-item__header__img">
					<img src={ TimelineItemIcon } alt="timeline-item" />
				</div>
				<div className="block-timeline-item__header__time">
					<RichText
						tagName="span"
						value={ time }
						onChange={ ( value ) => setAttributes( { time: value } ) }
					/>
				</div>
			</div>
			<div className="block-timeline-item__content"><TextareaControl
				value={ content }
				rows="4"
				onFocus={ ( e ) => e.currentTarget.select() }
				onChange={ ( value ) => setAttributes( { content: value } ) }
			/></div>
		</div>
	);
}
