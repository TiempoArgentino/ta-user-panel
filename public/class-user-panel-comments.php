<?php

class User_Panel_Comments{

    public function __construct()
    {
        add_action('profile_extra_content',[$this,'get_comments_count']);
    }
     /**
     * comments
     */
    public function get_comments_count()
    {
        $args = [
            'user_id' => wp_get_current_user()->ID,
            'count' => true,
        ]; 
        echo __('Your comments: ','user-panel').' '.get_comments($args);
    }
}

function user_panel_comments()
{
    return new User_Panel_Comments();
}

user_panel_comments();