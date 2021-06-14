<?php do_action('before_panel_user') ?>
<?php get_header() ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2><?php echo __('Welcome to your profile', 'panel-user') ?></h2>
        </div>
        <div class="col-12 tabs" id="tabs">
            <?php do_action('panel_user_tabs') ?>
        </div>
        <div class="col-12" id="content-coso">
            <?php do_action('panel_user_content') ?>
        </div>
    </div>
</div>

<?php do_action('after_panel_user') ?>
<?php get_footer() ?>