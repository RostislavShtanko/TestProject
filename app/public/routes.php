<?php

$app->get('/', function() use ($app){
	require 'controllers/MainController.php';
	$controller = new MainController;
	$controller -> index($app);
});

$app->post('/registration', function() use ($app){
	require 'controllers/RegistrationController.php';
	$controller = new RegistrationController;
	$controller -> index($app);
});