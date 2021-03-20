<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://genosha.com.ar
 * @since      1.0.0
 *
 * @package    User_Panel
 * @subpackage User_Panel/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    User_Panel
 * @subpackage User_Panel/includes
 * @author     Juan Iriart <juan.e@genosha.com.ar>
 */
class User_Panel_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		self::delete_pages();
	}

	public static function delete_pages()
	{
		if(get_option('user_panel_page')) {
			wp_delete_post(get_option('user_panel_page'));
			delete_option('user_panel_page');
		}
	}
}
