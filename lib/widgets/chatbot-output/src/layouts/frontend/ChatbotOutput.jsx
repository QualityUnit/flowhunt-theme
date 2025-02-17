const { TextareaControl } = wp.components;
const { RichText } = wp.blockEditor;

export default function ChatbotOutput( { attributes, setAttributes } ) {
	const { title, content, timeReading, countWords, pointReadabilityGradeLevel, pointReadabilityScore } = attributes;
	return (
		<div className="block-chatbot">
			<div className="block-chatbot__header">
				<div className="title">
					<RichText
						tagName="span"
						value={ title }
						onChange={ ( value ) => setAttributes( { title: value } ) }
					/></div>
				<div className="info">
					<div className="info__time-read">
						<RichText
							tagName="span"
							value={ timeReading }
							onChange={ ( value ) => setAttributes( { timeReading: value } ) }
						/>
					</div>
					<div className="info__count-words">
						<RichText
							tagName="span"
							value={ countWords }
							onChange={ ( value ) => setAttributes( { countWords: value } ) }
						/>
					</div>
					<div className="info__points-readability">
						<RichText
							tagName="span"
							value={ pointReadabilityGradeLevel }
							onChange={ ( value ) => setAttributes( { pointReadabilityGradeLevel: value } ) }
						/>
						<span> (</span><RichText
							tagName="span"
							value={ pointReadabilityScore }
							onChange={ ( value ) => setAttributes( { pointReadabilityScore: value } ) }
						/> points<span>)</span>
						<div className="tooltip">
							<span>Flesch-Kincaid Grade Level: <RichText
								tagName="span"
								value={ pointReadabilityGradeLevel }
								onChange={ ( value ) => setAttributes( { pointReadabilityGradeLevel: value } ) }
							/></span>
							<span>Flesch-Kincaid Score: <RichText
								tagName="span"
								value={ pointReadabilityScore }
								onChange={ ( value ) => setAttributes( { pointReadabilityScore: value } ) }
							/></span>
						</div>
					</div>
				</div>
			</div>
			<div className="block-chatbot__content"><TextareaControl
				value={ content }
				rows="4"
				onFocus={ ( e ) => e.currentTarget.select() }
				onChange={ ( value ) => setAttributes( { content: value } ) }
			/></div>
		</div>
	);
}
