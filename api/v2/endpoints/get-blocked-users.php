<?php
// +------------------------------------------------------------------------+
// | @company Uverus Technologies ltd
// | @company_url 1: https://uverus.com/
// | @company_email: uverustechnologies@gmail.com
// +------------------------------------------------------------------------+
// | Copyright (c) 2024 Uverus Technologies ltd. All rights reserved.
// +------------------------------------------------------------------------+
$blocked_users = Wo_GetBlockedMembers($wo['user']['user_id']);

$users = array();

foreach ($blocked_users as $key => $blocked_user) {
	foreach ($non_allowed as $key => $value) {
	   unset($blocked_user[$value]);
	}
	$blocked_user['gender_text']        = ($blocked_user['gender'] == 'male') ? $wo['lang']['male'] : $wo['lang']['female'];
	$blocked_user['lastseen_time_text'] = Wo_Time_Elapsed_String($blocked_user['lastseen']);
	$users[] = $blocked_user;
}

$response_data = array(
    'api_status' => 200,
    'blocked_users' => $users
);