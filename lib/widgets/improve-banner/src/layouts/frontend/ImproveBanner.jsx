/* global images */
const { TextareaControl } = wp.components;

export default function ImproveBanner( { attributes, setAttributes } ) {
	const { title, content, button } = attributes;
	return (
		<div className="block-improve">
			<div className="block-improve__wrapper">
				<div className="block-improve__content">
					<h2><TextareaControl
						autoFocus
						value={ title }
						rows="1"
						onFocus={ ( e ) => e.currentTarget.select() }
						onChange={ ( value ) => setAttributes( { title: value } ) }
					/></h2>
					<p>
						<TextareaControl
							value={ content }
							rows="3"
							onFocus={ ( e ) => e.currentTarget.select() }
							onChange={ ( value ) => setAttributes( { content: value } ) }
						/>
					</p>
					<div className="block-improve__buttons">
						<a href="https://calendly.com/liveagentsession/flowhunt-chatbot-demo" target="_blank" className="Button Button--white Button--medium" rel="noreferrer">
							<TextareaControl
								value={ button }
								rows="1"
								onFocus={ ( e ) => e.currentTarget.select() }
								onChange={ ( value ) => setAttributes( { button: value } ) }
							/>
						</a>
					</div>
				</div>

				<img
					className="block-improve__img"
					src={ `${ images.url }/block-improve-right-img.png` }
					alt="Improve your website"
				/>
			</div>
		</div>
	);
}
