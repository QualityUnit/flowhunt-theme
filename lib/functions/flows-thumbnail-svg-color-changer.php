<?php

function get_colored_svg( $color ) {
	$color = !empty($color) ? $color : '#d1d5db';
	return '

        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_46_52)">
							<path d="M-0.410658 -1.70533C-0.410658 -0.990302 -0.990302 -0.410658 -1.70533 -0.410658C-2.42036 -0.410658 -3 -0.990302 -3 -1.70533C-3 -2.42036 -2.42036 -3 -1.70533 -3C-0.990302 -3 -0.410658 -2.42036 -0.410658 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 -1.70533C6.0627 -0.990302 5.48305 -0.410658 4.76802 -0.410658C4.053 -0.410658 3.47335 -0.990302 3.47335 -1.70533C3.47335 -2.42036 4.053 -3 4.76802 -3C5.48305 -3 6.0627 -2.42036 6.0627 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 -1.70533C12.536 -0.990302 11.9564 -0.410658 11.2414 -0.410658C10.5264 -0.410658 9.94671 -0.990302 9.94671 -1.70533C9.94671 -2.42036 10.5264 -3 11.2414 -3C11.9564 -3 12.536 -2.42036 12.536 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 -1.70533C19.0094 -0.990302 18.4298 -0.410658 17.7147 -0.410658C16.9997 -0.410658 16.4201 -0.990302 16.4201 -1.70533C16.4201 -2.42036 16.9997 -3 17.7147 -3C18.4298 -3 19.0094 -2.42036 19.0094 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 -1.70533C25.4828 -0.990302 24.9031 -0.410658 24.1881 -0.410658C23.4731 -0.410658 22.8934 -0.990302 22.8934 -1.70533C22.8934 -2.42036 23.4731 -3 24.1881 -3C24.9031 -3 25.4828 -2.42036 25.4828 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 -1.70533C31.9561 -0.990302 31.3765 -0.410658 30.6614 -0.410658C29.9464 -0.410658 29.3668 -0.990302 29.3668 -1.70533C29.3668 -2.42036 29.9464 -3 30.6614 -3C31.3765 -3 31.9561 -2.42036 31.9561 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 -1.70533C38.4295 -0.990302 37.8498 -0.410658 37.1348 -0.410658C36.4198 -0.410658 35.8401 -0.990302 35.8401 -1.70533C35.8401 -2.42036 36.4198 -3 37.1348 -3C37.8498 -3 38.4295 -2.42036 38.4295 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 -1.70533C44.9028 -0.990302 44.3232 -0.410658 43.6082 -0.410658C42.8931 -0.410658 42.3135 -0.990302 42.3135 -1.70533C42.3135 -2.42036 42.8931 -3 43.6082 -3C44.3232 -3 44.9028 -2.42036 44.9028 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 -1.70533C51.3762 -0.990302 50.7965 -0.410658 50.0815 -0.410658C49.3665 -0.410658 48.7868 -0.990302 48.7868 -1.70533C48.7868 -2.42036 49.3665 -3 50.0815 -3C50.7965 -3 51.3762 -2.42036 51.3762 -1.70533Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 4.76802C-0.410658 5.48305 -0.990302 6.0627 -1.70533 6.0627C-2.42036 6.0627 -3 5.48305 -3 4.76802C-3 4.053 -2.42036 3.47335 -1.70533 3.47335C-0.990302 3.47335 -0.410658 4.053 -0.410658 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 4.76802C6.0627 5.48305 5.48305 6.0627 4.76802 6.0627C4.053 6.0627 3.47335 5.48305 3.47335 4.76802C3.47335 4.053 4.053 3.47335 4.76802 3.47335C5.48305 3.47335 6.0627 4.053 6.0627 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 4.76802C12.536 5.48305 11.9564 6.0627 11.2414 6.0627C10.5264 6.0627 9.94671 5.48305 9.94671 4.76802C9.94671 4.053 10.5264 3.47335 11.2414 3.47335C11.9564 3.47335 12.536 4.053 12.536 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 4.76802C19.0094 5.48305 18.4298 6.0627 17.7147 6.0627C16.9997 6.0627 16.4201 5.48305 16.4201 4.76802C16.4201 4.053 16.9997 3.47335 17.7147 3.47335C18.4298 3.47335 19.0094 4.053 19.0094 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 4.76802C25.4828 5.48305 24.9031 6.0627 24.1881 6.0627C23.4731 6.0627 22.8934 5.48305 22.8934 4.76802C22.8934 4.053 23.4731 3.47335 24.1881 3.47335C24.9031 3.47335 25.4828 4.053 25.4828 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 4.76802C31.9561 5.48305 31.3765 6.0627 30.6614 6.0627C29.9464 6.0627 29.3668 5.48305 29.3668 4.76802C29.3668 4.053 29.9464 3.47335 30.6614 3.47335C31.3765 3.47335 31.9561 4.053 31.9561 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 4.76802C38.4295 5.48305 37.8498 6.0627 37.1348 6.0627C36.4198 6.0627 35.8401 5.48305 35.8401 4.76802C35.8401 4.053 36.4198 3.47335 37.1348 3.47335C37.8498 3.47335 38.4295 4.053 38.4295 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 4.76802C44.9028 5.48305 44.3232 6.0627 43.6082 6.0627C42.8931 6.0627 42.3135 5.48305 42.3135 4.76802C42.3135 4.053 42.8931 3.47335 43.6082 3.47335C44.3232 3.47335 44.9028 4.053 44.9028 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 4.76802C51.3762 5.48305 50.7965 6.0627 50.0815 6.0627C49.3665 6.0627 48.7868 5.48305 48.7868 4.76802C48.7868 4.053 49.3665 3.47335 50.0815 3.47335C50.7965 3.47335 51.3762 4.053 51.3762 4.76802Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 11.2414C-0.410658 11.9564 -0.990302 12.536 -1.70533 12.536C-2.42036 12.536 -3 11.9564 -3 11.2414C-3 10.5264 -2.42036 9.94671 -1.70533 9.94671C-0.990302 9.94671 -0.410658 10.5264 -0.410658 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 11.2414C6.0627 11.9564 5.48305 12.536 4.76802 12.536C4.053 12.536 3.47335 11.9564 3.47335 11.2414C3.47335 10.5264 4.053 9.94671 4.76802 9.94671C5.48305 9.94671 6.0627 10.5264 6.0627 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 11.2414C12.536 11.9564 11.9564 12.536 11.2414 12.536C10.5264 12.536 9.94671 11.9564 9.94671 11.2414C9.94671 10.5264 10.5264 9.94671 11.2414 9.94671C11.9564 9.94671 12.536 10.5264 12.536 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 11.2414C19.0094 11.9564 18.4298 12.536 17.7147 12.536C16.9997 12.536 16.4201 11.9564 16.4201 11.2414C16.4201 10.5264 16.9997 9.94671 17.7147 9.94671C18.4298 9.94671 19.0094 10.5264 19.0094 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 11.2414C25.4828 11.9564 24.9031 12.536 24.1881 12.536C23.4731 12.536 22.8934 11.9564 22.8934 11.2414C22.8934 10.5264 23.4731 9.94671 24.1881 9.94671C24.9031 9.94671 25.4828 10.5264 25.4828 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 11.2414C31.9561 11.9564 31.3765 12.536 30.6614 12.536C29.9464 12.536 29.3668 11.9564 29.3668 11.2414C29.3668 10.5264 29.9464 9.94671 30.6614 9.94671C31.3765 9.94671 31.9561 10.5264 31.9561 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 11.2414C38.4295 11.9564 37.8498 12.536 37.1348 12.536C36.4198 12.536 35.8401 11.9564 35.8401 11.2414C35.8401 10.5264 36.4198 9.94671 37.1348 9.94671C37.8498 9.94671 38.4295 10.5264 38.4295 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 11.2414C44.9028 11.9564 44.3232 12.536 43.6082 12.536C42.8931 12.536 42.3135 11.9564 42.3135 11.2414C42.3135 10.5264 42.8931 9.94671 43.6082 9.94671C44.3232 9.94671 44.9028 10.5264 44.9028 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 11.2414C51.3762 11.9564 50.7965 12.536 50.0815 12.536C49.3665 12.536 48.7868 11.9564 48.7868 11.2414C48.7868 10.5264 49.3665 9.94671 50.0815 9.94671C50.7965 9.94671 51.3762 10.5264 51.3762 11.2414Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 17.7147C-0.410658 18.4298 -0.990302 19.0094 -1.70533 19.0094C-2.42036 19.0094 -3 18.4298 -3 17.7147C-3 16.9997 -2.42036 16.4201 -1.70533 16.4201C-0.990302 16.4201 -0.410658 16.9997 -0.410658 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 17.7147C6.0627 18.4298 5.48305 19.0094 4.76802 19.0094C4.053 19.0094 3.47335 18.4298 3.47335 17.7147C3.47335 16.9997 4.053 16.4201 4.76802 16.4201C5.48305 16.4201 6.0627 16.9997 6.0627 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 17.7147C12.536 18.4298 11.9564 19.0094 11.2414 19.0094C10.5264 19.0094 9.94671 18.4298 9.94671 17.7147C9.94671 16.9997 10.5264 16.4201 11.2414 16.4201C11.9564 16.4201 12.536 16.9997 12.536 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 17.7147C19.0094 18.4298 18.4298 19.0094 17.7147 19.0094C16.9997 19.0094 16.4201 18.4298 16.4201 17.7147C16.4201 16.9997 16.9997 16.4201 17.7147 16.4201C18.4298 16.4201 19.0094 16.9997 19.0094 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 17.7147C25.4828 18.4298 24.9031 19.0094 24.1881 19.0094C23.4731 19.0094 22.8934 18.4298 22.8934 17.7147C22.8934 16.9997 23.4731 16.4201 24.1881 16.4201C24.9031 16.4201 25.4828 16.9997 25.4828 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 17.7147C31.9561 18.4298 31.3765 19.0094 30.6614 19.0094C29.9464 19.0094 29.3668 18.4298 29.3668 17.7147C29.3668 16.9997 29.9464 16.4201 30.6614 16.4201C31.3765 16.4201 31.9561 16.9997 31.9561 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 17.7147C38.4295 18.4298 37.8498 19.0094 37.1348 19.0094C36.4198 19.0094 35.8401 18.4298 35.8401 17.7147C35.8401 16.9997 36.4198 16.4201 37.1348 16.4201C37.8498 16.4201 38.4295 16.9997 38.4295 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 17.7147C44.9028 18.4298 44.3232 19.0094 43.6082 19.0094C42.8931 19.0094 42.3135 18.4298 42.3135 17.7147C42.3135 16.9997 42.8931 16.4201 43.6082 16.4201C44.3232 16.4201 44.9028 16.9997 44.9028 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 17.7147C51.3762 18.4298 50.7965 19.0094 50.0815 19.0094C49.3665 19.0094 48.7868 18.4298 48.7868 17.7147C48.7868 16.9997 49.3665 16.4201 50.0815 16.4201C50.7965 16.4201 51.3762 16.9997 51.3762 17.7147Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 24.1881C-0.410658 24.9031 -0.990302 25.4828 -1.70533 25.4828C-2.42036 25.4828 -3 24.9031 -3 24.1881C-3 23.4731 -2.42036 22.8934 -1.70533 22.8934C-0.990302 22.8934 -0.410658 23.4731 -0.410658 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 24.1881C6.0627 24.9031 5.48305 25.4828 4.76802 25.4828C4.053 25.4828 3.47335 24.9031 3.47335 24.1881C3.47335 23.4731 4.053 22.8934 4.76802 22.8934C5.48305 22.8934 6.0627 23.4731 6.0627 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 24.1881C12.536 24.9031 11.9564 25.4828 11.2414 25.4828C10.5264 25.4828 9.94671 24.9031 9.94671 24.1881C9.94671 23.4731 10.5264 22.8934 11.2414 22.8934C11.9564 22.8934 12.536 23.4731 12.536 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 24.1881C19.0094 24.9031 18.4298 25.4828 17.7147 25.4828C16.9997 25.4828 16.4201 24.9031 16.4201 24.1881C16.4201 23.4731 16.9997 22.8934 17.7147 22.8934C18.4298 22.8934 19.0094 23.4731 19.0094 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 24.1881C25.4828 24.9031 24.9031 25.4828 24.1881 25.4828C23.4731 25.4828 22.8934 24.9031 22.8934 24.1881C22.8934 23.4731 23.4731 22.8934 24.1881 22.8934C24.9031 22.8934 25.4828 23.4731 25.4828 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 24.1881C31.9561 24.9031 31.3765 25.4828 30.6614 25.4828C29.9464 25.4828 29.3668 24.9031 29.3668 24.1881C29.3668 23.4731 29.9464 22.8934 30.6614 22.8934C31.3765 22.8934 31.9561 23.4731 31.9561 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 24.1881C38.4295 24.9031 37.8498 25.4828 37.1348 25.4828C36.4198 25.4828 35.8401 24.9031 35.8401 24.1881C35.8401 23.4731 36.4198 22.8934 37.1348 22.8934C37.8498 22.8934 38.4295 23.4731 38.4295 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 24.1881C44.9028 24.9031 44.3232 25.4828 43.6082 25.4828C42.8931 25.4828 42.3135 24.9031 42.3135 24.1881C42.3135 23.4731 42.8931 22.8934 43.6082 22.8934C44.3232 22.8934 44.9028 23.4731 44.9028 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 24.1881C51.3762 24.9031 50.7965 25.4828 50.0815 25.4828C49.3665 25.4828 48.7868 24.9031 48.7868 24.1881C48.7868 23.4731 49.3665 22.8934 50.0815 22.8934C50.7965 22.8934 51.3762 23.4731 51.3762 24.1881Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 30.6614C-0.410658 31.3765 -0.990302 31.9561 -1.70533 31.9561C-2.42036 31.9561 -3 31.3765 -3 30.6614C-3 29.9464 -2.42036 29.3668 -1.70533 29.3668C-0.990302 29.3668 -0.410658 29.9464 -0.410658 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 30.6614C6.0627 31.3765 5.48305 31.9561 4.76802 31.9561C4.053 31.9561 3.47335 31.3765 3.47335 30.6614C3.47335 29.9464 4.053 29.3668 4.76802 29.3668C5.48305 29.3668 6.0627 29.9464 6.0627 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 30.6614C12.536 31.3765 11.9564 31.9561 11.2414 31.9561C10.5264 31.9561 9.94671 31.3765 9.94671 30.6614C9.94671 29.9464 10.5264 29.3668 11.2414 29.3668C11.9564 29.3668 12.536 29.9464 12.536 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 30.6614C19.0094 31.3765 18.4298 31.9561 17.7147 31.9561C16.9997 31.9561 16.4201 31.3765 16.4201 30.6614C16.4201 29.9464 16.9997 29.3668 17.7147 29.3668C18.4298 29.3668 19.0094 29.9464 19.0094 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 30.6614C25.4828 31.3765 24.9031 31.9561 24.1881 31.9561C23.4731 31.9561 22.8934 31.3765 22.8934 30.6614C22.8934 29.9464 23.4731 29.3668 24.1881 29.3668C24.9031 29.3668 25.4828 29.9464 25.4828 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 30.6614C31.9561 31.3765 31.3765 31.9561 30.6614 31.9561C29.9464 31.9561 29.3668 31.3765 29.3668 30.6614C29.3668 29.9464 29.9464 29.3668 30.6614 29.3668C31.3765 29.3668 31.9561 29.9464 31.9561 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 30.6614C38.4295 31.3765 37.8498 31.9561 37.1348 31.9561C36.4198 31.9561 35.8401 31.3765 35.8401 30.6614C35.8401 29.9464 36.4198 29.3668 37.1348 29.3668C37.8498 29.3668 38.4295 29.9464 38.4295 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 30.6614C44.9028 31.3765 44.3232 31.9561 43.6082 31.9561C42.8931 31.9561 42.3135 31.3765 42.3135 30.6614C42.3135 29.9464 42.8931 29.3668 43.6082 29.3668C44.3232 29.3668 44.9028 29.9464 44.9028 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 30.6614C51.3762 31.3765 50.7965 31.9561 50.0815 31.9561C49.3665 31.9561 48.7868 31.3765 48.7868 30.6614C48.7868 29.9464 49.3665 29.3668 50.0815 29.3668C50.7965 29.3668 51.3762 29.9464 51.3762 30.6614Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 37.1348C-0.410658 37.8498 -0.990302 38.4295 -1.70533 38.4295C-2.42036 38.4295 -3 37.8498 -3 37.1348C-3 36.4198 -2.42036 35.8401 -1.70533 35.8401C-0.990302 35.8401 -0.410658 36.4198 -0.410658 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 37.1348C6.0627 37.8498 5.48305 38.4295 4.76802 38.4295C4.053 38.4295 3.47335 37.8498 3.47335 37.1348C3.47335 36.4198 4.053 35.8401 4.76802 35.8401C5.48305 35.8401 6.0627 36.4198 6.0627 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 37.1348C12.536 37.8498 11.9564 38.4295 11.2414 38.4295C10.5264 38.4295 9.94671 37.8498 9.94671 37.1348C9.94671 36.4198 10.5264 35.8401 11.2414 35.8401C11.9564 35.8401 12.536 36.4198 12.536 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 37.1348C19.0094 37.8498 18.4298 38.4295 17.7147 38.4295C16.9997 38.4295 16.4201 37.8498 16.4201 37.1348C16.4201 36.4198 16.9997 35.8401 17.7147 35.8401C18.4298 35.8401 19.0094 36.4198 19.0094 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 37.1348C25.4828 37.8498 24.9031 38.4295 24.1881 38.4295C23.4731 38.4295 22.8934 37.8498 22.8934 37.1348C22.8934 36.4198 23.4731 35.8401 24.1881 35.8401C24.9031 35.8401 25.4828 36.4198 25.4828 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 37.1348C31.9561 37.8498 31.3765 38.4295 30.6614 38.4295C29.9464 38.4295 29.3668 37.8498 29.3668 37.1348C29.3668 36.4198 29.9464 35.8401 30.6614 35.8401C31.3765 35.8401 31.9561 36.4198 31.9561 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 37.1348C38.4295 37.8498 37.8498 38.4295 37.1348 38.4295C36.4198 38.4295 35.8401 37.8498 35.8401 37.1348C35.8401 36.4198 36.4198 35.8401 37.1348 35.8401C37.8498 35.8401 38.4295 36.4198 38.4295 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 37.1348C44.9028 37.8498 44.3232 38.4295 43.6082 38.4295C42.8931 38.4295 42.3135 37.8498 42.3135 37.1348C42.3135 36.4198 42.8931 35.8401 43.6082 35.8401C44.3232 35.8401 44.9028 36.4198 44.9028 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 37.1348C51.3762 37.8498 50.7965 38.4295 50.0815 38.4295C49.3665 38.4295 48.7868 37.8498 48.7868 37.1348C48.7868 36.4198 49.3665 35.8401 50.0815 35.8401C50.7965 35.8401 51.3762 36.4198 51.3762 37.1348Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M-0.410658 43.6082C-0.410658 44.3232 -0.990302 44.9028 -1.70533 44.9028C-2.42036 44.9028 -3 44.3232 -3 43.6082C-3 42.8931 -2.42036 42.3135 -1.70533 42.3135C-0.990302 42.3135 -0.410658 42.8931 -0.410658 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M6.0627 43.6082C6.0627 44.3232 5.48305 44.9028 4.76802 44.9028C4.053 44.9028 3.47335 44.3232 3.47335 43.6082C3.47335 42.8931 4.053 42.3135 4.76802 42.3135C5.48305 42.3135 6.0627 42.8931 6.0627 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M12.536 43.6082C12.536 44.3232 11.9564 44.9028 11.2414 44.9028C10.5264 44.9028 9.94671 44.3232 9.94671 43.6082C9.94671 42.8931 10.5264 42.3135 11.2414 42.3135C11.9564 42.3135 12.536 42.8931 12.536 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M19.0094 43.6082C19.0094 44.3232 18.4298 44.9028 17.7147 44.9028C16.9997 44.9028 16.4201 44.3232 16.4201 43.6082C16.4201 42.8931 16.9997 42.3135 17.7147 42.3135C18.4298 42.3135 19.0094 42.8931 19.0094 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M25.4828 43.6082C25.4828 44.3232 24.9031 44.9028 24.1881 44.9028C23.4731 44.9028 22.8934 44.3232 22.8934 43.6082C22.8934 42.8931 23.4731 42.3135 24.1881 42.3135C24.9031 42.3135 25.4828 42.8931 25.4828 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M31.9561 43.6082C31.9561 44.3232 31.3765 44.9028 30.6614 44.9028C29.9464 44.9028 29.3668 44.3232 29.3668 43.6082C29.3668 42.8931 29.9464 42.3135 30.6614 42.3135C31.3765 42.3135 31.9561 42.8931 31.9561 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M38.4295 43.6082C38.4295 44.3232 37.8498 44.9028 37.1348 44.9028C36.4198 44.9028 35.8401 44.3232 35.8401 43.6082C35.8401 42.8931 36.4198 42.3135 37.1348 42.3135C37.8498 42.3135 38.4295 42.8931 38.4295 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M44.9028 43.6082C44.9028 44.3232 44.3232 44.9028 43.6082 44.9028C42.8931 44.9028 42.3135 44.3232 42.3135 43.6082C42.3135 42.8931 42.8931 42.3135 43.6082 42.3135C44.3232 42.3135 44.9028 42.8931 44.9028 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M51.3762 43.6082C51.3762 44.3232 50.7965 44.9028 50.0815 44.9028C49.3665 44.9028 48.7868 44.3232 48.7868 43.6082C48.7868 42.8931 49.3665 42.3135 50.0815 42.3135C50.7965 42.3135 51.3762 42.8931 51.3762 43.6082Z" fill="' . esc_attr( $color ) . '" fill-opacity="0.3"/>
							<path d="M15 21C15 17.6863 17.6863 15 21 15H52V50H15V21Z" fill="' . esc_attr( $color ) . '"/>
						</g>
						<defs>
							<clipPath id="clip0_46_52">
								<rect width="46" height="46" fill="none"/>
							</clipPath>
						</defs>
					</svg>
    ';
}
