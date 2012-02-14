<?php
/*
Plugin Name: Gravatar Sign Up Link
Description: Automatically add a sign up link to Gravatar on your WordPress comment area.
Version: 1.1
Author: Aaron Holbrook
Author URI: http://aaronjholbrook.com/
Plugin URI: http://a7web.com/plugins/
Text Domain: gravatar-sign-up-link
Domain Path: /lang


Copyright (C) 2010-2012 Aaron Holbrook (aaron@a7web.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/


/*------------------------------------*\
	Add Admin Option Page
\*------------------------------------*/
add_action('admin_menu', 'gsul_admin_add_page');
function gsul_admin_add_page() {
	add_options_page('Gravatar Sign Up Page', 'Gravatar Sign Up', 'manage_options', 'plugin', 'gsul_options_page');
}

/*------------------------------------*\
	Display the admin options page
\*------------------------------------*/
function gsul_options_page() { ?>
<div>
	<h2>Gravatar Sign Up Link</h2>
	Change the link text
	<form action="options.php" method="post">
		<?php settings_fields('gsul_options'); ?>
		<?php do_settings_sections('gsul'); ?>	

		<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>
</div> <?php 	
}

/*------------------------------------*\
	Add the admin settings and such
\*------------------------------------*/
add_action('admin_init', 'gsul_admin_init');
function gsul_admin_init() {
	register_setting( 'gsul_options', 'gsul_options', 'gsul_options_validate' );
	add_settings_section( 'gsul_main', 'Main Settings', 'gsul_section_text', 'gsul');
	add_settings_field( 'gsul_text_string', 'Gravatar Sign Up Link Text', 'gsul_setting_string', 'gsul', 'gsul_main' );
}

/*------------------------------------*\
	Display the options
\*------------------------------------*/
function gsul_section_text() {
	echo '<p>Main description of this section here.</p>';
}

function gsul_setting_string() {
	$options = get_option('gsul_options');
	echo "<input id='gsul_text_string' name='gsul_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
}

/*------------------------------------*\
	Validate our options
\*------------------------------------*/
function gsul_options_validate($input) {
	$newinput['text_string'] = trim($input['text_string']);
	return $newinput;
}





/*------------------------------------*\
	Add the link
\*------------------------------------*/
add_action ( 'comment_form', 'gsul_echo_link' );
function gsul_echo_link() {
	$custom_text = get_option('gsul_options');
	$custom_text = $custom_text['text_string'];
	if( $custom_text == '') {
		$custom_text = 'Get a Gravatar';
	}
	echo '<a href="http://en.gravatar.com/">'.$custom_text.'</a>';
}

