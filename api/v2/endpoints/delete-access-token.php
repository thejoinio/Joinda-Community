<?php
// +------------------------------------------------------------------------+
// | @company Uverus Technologies ltd
// | @company_url 1: https://uverus.com/
// | @company_email: uverustechnologies@gmail.com
// +------------------------------------------------------------------------+
// | Copyright (c) 2024 Uverus Technologies ltd. All rights reserved.
// +------------------------------------------------------------------------+
$response_data       = array(
    'api_status' => 400
);
$access_token        = Wo_Secure($_GET['access_token']);
$user_id             = $wo['user']['user_id'];
$remove_access_token = mysqli_query($sqlConnect, "DELETE FROM " . T_APP_SESSIONS . " WHERE `session_id` = '{$access_token}'");
if ($remove_access_token) {
    //$update = mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET `device_id` = '' WHERE `user_id` = '{$user_id}'");
    $update  = mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET `android_m_device_id` = '' , `ios_m_device_id` = '' , `android_n_device_id` = '' , `ios_n_device_id` = '' WHERE `user_id` = '{$user_id}'");
    if ($update) {
        cache($user_id, 'users', 'delete');
        $response_data = array(
            'api_status' => 200
        );
    }
}