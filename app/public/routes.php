<?php

$app->get('/', function() use ($app){
	require 'controllers/MainController.php';
	$controller = new MainController;
	$controller -> index($app);
});

$app->post('/registration', function() use ($app){
	require 'controllers/RegistrationController.php';
	require 'models/RegistrationModel.php';
	$controller = new RegistrationController;
	$controller -> index($app);
});