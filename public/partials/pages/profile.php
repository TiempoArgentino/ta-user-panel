<?php do_action('before_profile_page')?>
<div class="content content-active" id="profile">
    <div class="row d-flex align-items-center">
        <div class="col-md-4 col-12 profile-image">
            <img src="<?php echo user_panel_proccess()->profile_image()?>" class="img-fluid">
            <span class="open-form-edit"><img src="<?php echo USER_PANEL_URL . 'public/img/pencil.png'?>" /></span>
            <form method="post" id="image-profile" enctype="multipart/form-data">
                <div class="form-content">
                    <h4><?php echo __('Select a image','user-panel')?></h4>
                    <input type="file" name="profile_imagen" id="profile_image" />
                    <input type="hidden" name="user_id" value="<?php echo wp_get_current_user()->ID?>" />
                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                </div>
            </form>
        </div>
        <div class="col-md-8 col-12 profile-name">
            <h3 class="name-profile"><?php echo wp_get_current_user()->first_name.' '.wp_get_current_user()->last_name?></h3>
            <?php do_action('profile_details')?>
        </div>
    </div>
    <div class="row">
        <?php do_action('profile_extra')?>
    </div>
</div>