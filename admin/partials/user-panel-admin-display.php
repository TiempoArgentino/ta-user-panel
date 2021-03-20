<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://genosha.com.ar
 * @since      1.0.0
 *
 * @package    User_Panel
 * @subpackage User_Panel/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h1><?php echo __('Panel settings', 'user-panel'); ?></h1>
    <form method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><?php echo __('Profile page', 'panel-user')?></th>
                    <td><?php user_panel_settings()->page_profile_input()?></td>
                </tr>
                <tr>
                    <th scope="row"><?php echo __('Login page', 'panel-user')?></th>
                    <td><?php user_panel_settings()->page_login_input()?></td>
                </tr>
            </tbody>
        </table>
        <p class="submit"><input type="submit" name="submit" class="button button-primary" value="<?php echo __('Save','user-panel')?>" /></p>
       
    </form>
</div>