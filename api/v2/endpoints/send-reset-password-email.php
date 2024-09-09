<?php
// +------------------------------------------------------------------------+
// | @company Uverus Technologies ltd
// | @company_url 1: https://uverus.com/
// | @company_email: uverustechnologies@gmail.com
// +------------------------------------------------------------------------+
// | Copyright (c) 2024 Uverus Technologies ltd. All rights reserved.
// +------------------------------------------------------------------------+
$response_data = array(
    'api_status' => 400,
);
if (empty($_POST['email'])) {
    $error_code    = 3;
    $error_message = 'email (POST) is missing';
}
if (empty($error_code)) {
    if (Wo_EmailExists($_POST['email']) === false) {
        $error_code    = 6;
        $error_message = 'Email not found';
    } else {
    	$user_recover_data         = Wo_UserData(Wo_UserIdFromEmail($_POST['email']));
        $subject                   = $config['siteName'] . ' ' . $wo['lang']['password_rest_request'];
        $user_recover_data['link'] = Wo_Link('index.php?link1=reset-password&code=' . $user_recover_data['user_id'] . '_' . $user_recover_data['password']);
        $wo['recover']             = $user_recover_data;
        $body                      = Wo_LoadPage('emails/recover');
        $send_message_data         = array(
            'from_email' => $wo['config']['siteEmail'],
            'from_name' => $wo['config']['siteName'],
            'to_email' => $_POST['email'],
            'to_name' => '',
            'subject' => $subject,
            'charSet' => 'utf-8',
            'message_body' => $body,
            'is_html' => true
        );
        $send                      = Wo_SendMessage($send_message_data);
        if ($send) {
        	$response_data = array(
			    'api_status' => 200,
			);
        } else {
        	$error_code    = 7;
            $error_message = 'Failed to send the email, please check your server email settings.';
        }
    }
}