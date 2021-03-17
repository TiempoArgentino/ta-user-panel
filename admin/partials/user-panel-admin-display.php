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
        <?php
        echo '<table class="form-table">
        <tbody>
            <tr>
                <th scope="row">' . __('Default page', 'panel-user') . '</th>
                <td>' . user_panel_settings()->panel_input() . '</td>
            </tr>
        </tbody>
    </table>
    <p class="submit"><input type="submit" name="submit" class="button button-primary" value="'.__('Save','user-panel').'" /></p>
    </div>';
        ?>
    </form>
</div>