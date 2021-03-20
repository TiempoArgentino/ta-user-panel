<?php

class User_Panel_Settings
{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'settings_menu']);
        $this->save_panel_settings();
    }

    public function settings_menu()
    {
        add_submenu_page(
            'users.php',
            __('User Panel Settings', 'user-panel'),
            __('User Panel Settings', 'user-panel'),
            'manage_options',
            'user-panel-settings',
            [$this, 'user_panel_settings']
        );
    }
    /**
     * pages
     */
    public function get_pages()
    {
        $args = [
            'post_type' => 'page',
            'status'    => 'publish',
            'numberposts' => -1
        ];
        $pages = get_posts($args);

        return $pages;
    }
    /**
     * profile page select
     */
    public function page_profile_input()
    {
        $page_slug = get_option('user_panel_page');
        $pages = $this->get_pages();

        $select = '<select name="user_panel_page">';
        $select .= '<option value=""> -- select a page -- </option>';
        foreach ($pages as $p) {
            $select .= '<option value="' . $p->ID . '" ' . selected($page_slug, $p->ID, false) . '>' . $p->post_title . '</option>';
        }
        $select .= '</select>';
        echo $select;
    }
    /**
     * Login page
     */
    public function page_login_input()
    {
        $page_slug = get_option('user_login_page');
        $pages = $this->get_pages();

        $select = '<select name="user_login_page">';
        $select .= '<option value=""> -- select a page -- </option>';
        foreach ($pages as $p) {
            $select .= '<option value="' . $p->ID . '" ' . selected($page_slug, $p->ID, false) . '>' . $p->post_title . '</option>';
        }
        $select .= '</select>';
        echo $select;
    }
    /**
     * view
     */
    public function user_panel_settings()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/user-panel-admin-display.php';
    }
    /**
     * save options
     */
    public function save_panel_settings()
    {
        if (isset($_POST['user_panel_page'])) {
            update_option('user_panel_page', sanitize_text_field($_POST['user_panel_page']), true);
        }

        if(isset($_POST['user_login_page'])) {
            update_option('user_login_page', sanitize_text_field($_POST['user_login_page']), true);
        }
    }
}

function user_panel_settings()
{
    return new User_Panel_Settings();
}

user_panel_settings();
