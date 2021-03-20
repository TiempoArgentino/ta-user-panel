<?php

class User_Panel_Proccess
{
    public function __construct()
    {
        add_action('before_panel_user', [$this, 'verify_user_login']);

        add_action('panel_user_tabs', [$this, 'user_profile_tab'], 3);
        add_action('panel_user_content', [$this, 'user_profile_content']);

        add_action('before_profile_page', [$this,'profile_image_upload']);
    }
    /**
     * verify user
     */
    public function verify_user_login()
    {
        if (!is_user_logged_in()) {
            wp_redirect(get_permalink(get_option('user_login_page')) . '?login=unauthorized');
            exit();
        }
    }
    /**
     * tab profile
     */
    public function user_profile_tab()
    {
        echo '<span class="tab-select tab-active" data-content="#profile">' . __('Profile', 'panel-user') . '</span> ';
    }
    /**
     * content profile
     */
    public function user_profile_content()
    {
        if (locate_template('user-panel/pages/page.php')) {
            /**
             * Create a folder in your theme called "user-panel", into that create other folder called page with file called page.php
             */
            require_once get_template_directory() . '/user-panel/pages/profile.php';
        } else {
            /**
             * Default profile template
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'public/partials/pages/profile.php';
        }
    }
    /**
     * Image profile, show default image
     */
    public function default_image($url = null)
    {
        if ($url !== null) {
            return $url;
        } else {
            return esc_url(plugin_dir_url(__FILE__) . 'img/default.jpg');
        }
    }
    /**
     * Image profile meta user
     */
    public function profile_image()
    {
        $profile_image = get_user_meta(wp_get_current_user()->ID, '_profile_picture', true);
        if ($profile_image) {
            return $profile_image;
        } else {
            return $this->default_image();
        }
    }
    /**
     * Image profile upload
     */
    public function profile_image_upload()
    {
        if (isset($_FILES['profile_imagen'])) {
            require_once ABSPATH . 'wp-admin/includes/image.php';
            include_once ABSPATH . 'wp-admin/includes/media.php';
            include_once ABSPATH . 'wp-admin/includes/file.php';

            if (!function_exists('wp_get_current_user')) {
                include(ABSPATH . "wp-includes/pluggable.php");
            }

            $_FILES['profile_imagen']['name'] = uniqid( 'file' ) . '.' . pathinfo( $_FILES['profile_imagen']['name'] ) ['extension'];

            $size = $_FILES['profile_imagen']['size'];

            $mimetype= mime_content_type($_FILES['profile_imagen']['tmp_name']);

            if(!in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))){
                echo $this->error_message(__('File must be a image','user-panel'));
                return;
            }

            if($size > 500000){
                echo $this->error_message(__('File is to big','user-panel'));
                return;
             }

            $upload_overrides = array(
                'test_form' => false
            );
            $attachment_id = wp_handle_upload($_FILES['profile_imagen'], $upload_overrides);

            if ($attachment_id && !isset($attachment_id['error'])) {
                update_user_meta($_POST['user_id'], '_profile_picture', $attachment_id['url']);
                wp_redirect(get_permalink(get_option('user_panel_page')));
                die();
            }
        }
    }
    /**
     * Error msg
     */
    public function error_message($error)
    {
        return '<div class="error-upload-profile">'.$error.'</div>';
    }
}

function user_panel_proccess()
{
    return new User_Panel_Proccess();
}

user_panel_proccess();
