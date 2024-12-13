<?php 
function whatcontent( $attr ) {
		return '
			<div class="WhatBlock">
				<h3>' . esc_html( $attr['header'] ) . '</h3>
				<p>' . esc_html( $attr['content'] ) . '</p>
			</div>
		';
}
