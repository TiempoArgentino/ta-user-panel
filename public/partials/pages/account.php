<?php do_action('before_account_page') ?>
<div class="content-panel" id="account">
    <div class="row mt-3">
        <div class="col-12">
            <h3 class="text-center"><?php echo __('Your personal data', 'user-panel') ?></h3>
        </div>
    </div>
    <form method="post" class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for=""><?php echo __('Name', 'user-panel') ?></label>
                <input type="text" class="form-control" name="first_name_account" id="first_name_account" value="<?php echo wp_get_current_user()->first_name ?>" required />
            </div>
            <div class="form-group">
                <label for=""><?php echo __('Last Name', 'user-panel') ?></label>
                <input type="text" class="form-control" name="last_name_account" id="last_name_account" value="<?php echo wp_get_current_user()->last_name ?>" required />
            </div>
            <div class="form-group">
                <label for=""><?php echo __('Country', 'user-panel') ?></label>
                <input type="text" class="form-control" name="country_name" id="country_name" value="<?php echo user_panel_proccess()->get_user_country(wp_get_current_user()->ID) ?>"  />
            </div>
            <div class="form-group">
                <label for=""><?php echo __('State', 'user-panel') ?></label>
                <input type="text" class="form-control" name="state_name" id="state_name" value="<?php echo user_panel_proccess()->get_user_state(wp_get_current_user()->ID) ?>" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for=""><?php echo __('Phone', 'user-panel') ?></label>
                <input type="text" class="form-control" name="user_phone" id="user_phone" value="<?php echo user_panel_proccess()->get_user_phone(wp_get_current_user()->ID) ?>"  />
            </div>
            <div class="form-group">
                <label for=""><?php echo __('Email', 'user-panel') ?></label>
                <input type="email" disabled class="form-control" name="user_email_account" id="user_email_account" value="<?php echo wp_get_current_user()->user_email ?>" />
                <p class="small"><?php echo __('The email can\'t be change', 'user-panel') ?></p>
            </div>
            <div class="form-group">
                <label for=""><?php echo __('Password', 'user-panel') ?></label>
                <input type="text" class="form-control" name="user_password" id="user_password" value="" />
                <p class="small"><?php echo __('Leave blank to not change', 'user-panel') ?></p>
            </div>
            <input type="hidden" name="user_id" value="<?php echo wp_get_current_user()->ID ?>">
        </div>
        <div class="col-12 text-center">
            <input type="submit" name="update_profile" name="update_profile" class="btn btn-primary" value="<?php echo __('Update data', 'user-update') ?>">
        </div>
    </form>
    <?php do_action('account_extra_content')?>
</div>