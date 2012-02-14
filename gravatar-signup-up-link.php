<?php
/*
Plugin Name: Gravatar Sign Up Link
Description: Automatically add a sign up link to Gravatar on your WordPress comment area.
Version: 0.1
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

function gsul_echo_link() {
	echo '<a href="http://en.gravatar.com/">Get a Gravatar</a>';
}

add_action ( 'comment_form', 'gsul_echo_link' );

?>