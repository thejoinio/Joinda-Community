<?php
// +------------------------------------------------------------------------+
// | @company Uverus Technologies ltd
// | @company_url 1: https://uverus.com/
// | @company_email: uverustechnologies@gmail.com
// +------------------------------------------------------------------------+
// | Copyright (c) 2024 Uverus Technologies ltd. All rights reserved.
// +------------------------------------------------------------------------+-+
$response_data = array(
    'api_status' => 400,
);
if (empty($_POST['group_id'])) {
    $error_code    = 3;
    $error_message = 'group_id (POST) is missing';
}

if (empty($error_code)) {
    $group_id   = Wo_Secure($_POST['group_id']);
    $group_data = Wo_GroupData($group_id);
    if (empty($group_data)) {
        $error_code    = 6;
        $error_message = 'Group not found';
    } else {
        $response_data = array('api_status' => 200);
        
        foreach ($non_allowed as $key => $value) {
            unset($group_data[$value]);
        }
        $group_data['post_count'] = Wo_CountGroupPosts($group_data['group_id']);
        //$group_data['is_joined'] = Wo_IsGroupJoined($group_data['group_id']);
        $group_data['is_owner'] = Wo_IsGroupOnwer($group_data['group_id']);

        $response_data['group_data'] = $group_data;
    }
}