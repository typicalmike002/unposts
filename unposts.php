<?php
/**
 * @package Unposts.php
 */
/*
Plugin Name: Unposts
Plugin URI: https://github.com/typicalmike002/unposts
Description: A simple method for disabling posts by default on a 
WordPress site.  Useful for when only a simple website is necessary.
Version: 1.0
Author: typicalmike002
Author URI: https://github.com/typicalmike002/
License: MIT
Text Domain: unposts
*/




if ( is_admin() ) {

	/**
	 * Removes the entire posts and comments section from
	 * the WordPress admin.  This is only necessary if we 
	 * are loading the admin section of WordPress.
	 */
	function remove_from_menu() {
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php');
	}
	add_action( 'admin_menu', 'remove_from_menu' );
}


/**
 * Removes the add post and customize post from the 
 * admin bar's options.
 */
function remove_from_admin_bar() {

	global $wp_admin_bar;

	$wp_admin_bar->remove_node( 'new-post' );
	$wp_admin_bar->remove_menu( 'customize' );
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_options' );

