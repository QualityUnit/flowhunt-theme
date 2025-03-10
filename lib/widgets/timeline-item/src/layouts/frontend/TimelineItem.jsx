const { RichText } = wp.blockEditor;
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
			<div className="block-timeline-item__content">
				<RichText
					tagName="div"
					value={ content }
					onChange={ ( value ) => setAttributes( { content: value } ) }
					style={ { minHeight: '120px', width: '100%' } }
				/>
			</div>
		</div>
	);
}
