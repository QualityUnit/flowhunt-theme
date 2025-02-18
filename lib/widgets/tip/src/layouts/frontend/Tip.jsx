const { TextareaControl } = wp.components;
import TipIcon from '../../../images/tip.svg';

export default function Tip( { attributes, setAttributes } ) {
	const { content } = attributes;
	return (
		<div className="block-tip">
			<div className="block-tip__content">
				<div className="block-tip__content__img">
					<img src={ TipIcon } alt="tip" />
				</div>
				<div className="block-tip__content__text">
					<TextareaControl
						value={ content }
						rows="3"
						onFocus={ ( e ) => e.currentTarget.select() }
						onChange={ ( value ) => setAttributes( { content: value } ) }
					/>
				</div>
			</div>
		</div>
	);
}
