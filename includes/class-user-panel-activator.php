<?php

/**
 * Fired during plugin activation
 *
 * @link       https://genosha.com.ar
 * @since      1.0.0
 *
 * @package    User_Panel
 * @subpackage User_Panel/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    User_Panel
 * @subpackage User_Panel/includes
 * @author     Juan Iriart <juan.e@genosha.com.ar>
 */
class User_Panel_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		self::create_default_pages();
	}
	/**
	 * page exist
	 */
	public static function page_exists($page_slug)
	{
		global $wpdb;
		$post_title = wp_unslash(sanitize_post_field('post_name', $page_slug, 0, 'db'));

		$query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
		$args  = array();

		if (!empty($page_slug)) {
			$query .= ' AND post_name = %s';
			$args[] = $post_title;
		}

		if (!empty($args)) {
			return (int) $wpdb->get_var($wpdb->prepare($query, $args));
		}

		return 0;
	}

	/**
	 * Create pages
	 */
	public static function create_default_pages()
	{
		if (self::page_exists(get_option('user_panel_page', 'user-panel')) === 0) {
			$page = self::create_panel_user_page();
			update_option('user_panel_page', $page);
		}
	}
	/**
	 * Subscriptions loop
	 */
	public static function create_panel_user_page()
	{
		$args = [
			'post_title' => __('Profile', 'subscriptions'),
			'post_status'   => 'publish',
			'post_type'     => 'page',
			'post_content'  => 'This page is for the subscription template, please modify the content in your-theme/user-panel/pages/user-panel-page.php',
			'post_author'   => 1,
		];

		$page = wp_insert_post($args);
		return $page;
	}
}
