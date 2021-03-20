<?php

class User_Panel_Templates
{
    public function __construct()
    {
        add_filter('template_include', [$this, 'panel_template'], 99);
     }
     /**
     * You must create a folder called "user-panel" into your main theme and copy the php file to override then
     */
    public function profile_load_template($filename = '')
    {
        if (!empty($filename)) {
            if (locate_template('user-panel/' . $filename)) {
                /**
                 * Folder in theme for subscriptions templates, this folder must be created into your theme.
                 */
                $template = locate_template('user-panel/' . $filename);
            } else {
                /**
                 * Default folder of templates
                 */
                $template = dirname(__FILE__) . '/partials/' . $filename;
            }
        }
        return $template;
    }

    /**
     * panel template
     */
    public function panel_template($template)
    {
        if (is_page(get_option('user_panel_page')))
            $template = $this->profile_load_template('pages/user-panel-page.php');
        return $template;
    }

}


function user_panel_templates()
{
    return new User_Panel_Templates();
}

user_panel_templates();
