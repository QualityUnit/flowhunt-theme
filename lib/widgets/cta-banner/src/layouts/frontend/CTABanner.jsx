/* global images */
const { TextareaControl } = wp.components;

export default function CTABanner( { attributes, setAttributes } ) {
	const { title, content, buttonTry, buttonExpert } = attributes;
	return (
		<div className="block-cta">
			<div className="block-cta__wrapper">
				<div className="block-cta__content">
					<h2 className="title"><TextareaControl
						autoFocus
						value={ title }
						rows="1"
						onFocus={ ( e ) => e.currentTarget.select() }
						onChange={ ( value ) => setAttributes( { title: value } ) }
					/></h2>
					<p className="subtitle">
						<TextareaControl
							value={ content }
							rows="2"
							onFocus={ ( e ) => e.currentTarget.select() }
							onChange={ ( value ) => setAttributes( { content: value } ) }
						/>
					</p>
					<div className="block-cta__buttons">
						<div className="Button Button--full Button--medium" rel="noreferrer">
							<TextareaControl
								value={ buttonTry }
								rows="1"
								onFocus={ ( e ) => e.currentTarget.select() }
								onChange={ ( value ) => setAttributes( { buttonTry: value } ) }
							/>
						</div>
						<div className="Button Button--outline Button--medium" rel="noreferrer">
							<TextareaControl
								value={ buttonExpert }
								rows="1"
								onFocus={ ( e ) => e.currentTarget.select() }
								onChange={ ( value ) => setAttributes( { buttonExpert: value } ) }
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
}
