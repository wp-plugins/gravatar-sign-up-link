<?php
/*
Plugin Name: Gravatar Sign Up Link
Plugin URI: http://aaronjholbrook.com/plugins
Description: Adds a Gravatar link to your comment area. Help your visitors establish their identity!
Author: Aaron Holbrook
Version: 1.0
Author URI: http://aaronjholbrook.com
License: GPLv2
*/


function gsul_echo_link() {
	echo '<a href="http://en.gravatar.com/">Get a Gravatar</a>';
}

add_action ( 'comment_form', 'gsul_echo_link' );

?>
