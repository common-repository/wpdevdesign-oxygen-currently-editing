<?php
/*
Plugin Name:	WPDevDesign - Oxygen - Currently Editing
Plugin URI:		https://www.facebook.com/groups/1626639680763454/permalink/2531330123627734/
Description:	Adds the name of Template/Page currently being edited in the Oxygen editor.
Version:		1.0.1
Author:			Sridhar Katakam
Author URI:		https://wpdevdesign.com
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'oxygen_enqueue_ui_scripts', 'wpdd_oxygen_editor_currently_editing' );
/**
 * Adds the name of the entry (Template/Page etc.) currently being edited in the Oxygen editor.
 */
function wpdd_oxygen_editor_currently_editing() {
	if ( ! function_exists( 'oxygen_vsb_current_user_can_access' ) ) {
		return;
	}
	
	wp_enqueue_style( 'oxygen-editor-currently-editing', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );

	wp_enqueue_script( 'oxygen-editor-currently-editing', plugin_dir_url( __FILE__ ) . 'assets/js/main.js', [], '1.0.0', true );

	wp_add_inline_script( 'oxygen-editor-currently-editing', 'const current_entry = ' . json_encode( array(
		'name' => get_the_title(),
	) ), 'before' );
}