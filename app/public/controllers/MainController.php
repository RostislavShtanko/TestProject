<?php 
class MainController extends BaseController{
	function index($app = ''){
		echo DB_USER;
    	$app->render('MainView.php');		
	}
}