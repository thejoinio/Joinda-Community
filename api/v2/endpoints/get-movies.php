<?php
// +------------------------------------------------------------------------+
// | @company Uverus Technologies ltd
// | @company_url 1: https://uverus.com/
// | @company_email: uverustechnologies@gmail.com
// +------------------------------------------------------------------------+
// | Copyright (c) 2024 Uverus Technologies ltd. All rights reserved.
// +------------------------------------------------------------------------+
$products = array();

$options['limit'] = (!empty($_POST['limit'])) ? (int) $_POST['limit'] : 35;
$options['id'] = (!empty($_POST['id'])) ? (int) $_POST['id'] : 0;
$options['offset'] = (!empty($_POST['offset'])) ? (int) $_POST['offset'] : false;
$options['genre'] = (!empty($_POST['genre'])) ? $_POST['genre'] : false;
$options['country'] = (!empty($_POST['country'])) ? $_POST['country'] : false;

$movies = Wo_GetMovies($options);

$response_data = array(
    'api_status' => 200,
    'movies' => $movies
);