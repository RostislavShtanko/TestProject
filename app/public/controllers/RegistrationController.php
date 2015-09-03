<?php
class RegistrationController extends BaseController{
	function index( $app = '' ){
		$this->data = $this->get_data($app);
		$this->model = new RegistrationModel();

		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		if(!empty($this->data['login']) && !empty($this->data['password']) && $link){
				
	        $this->data['login'] = htmlspecialchars(mysqli_real_escape_string($link, $this->data['login']));   

	        $this->data['password'] = md5(htmlspecialchars(mysqli_real_escape_string($link, $this->data['password'] . SALT )));

	        $this->data['msg'] = $this->model->addUser($this->data['login'], $this->data['password'], $link);

        } else {
            $this->data['msg'] = "Корректно заполните все поля";
        }
    	$app->render('RegistrationView.php', $this->data);
	}

	private function get_data($app){
		$data['login'] = $app->request()->post('login');
		$data['password'] = $app->request()->post('password');
		$data['msg'] = "";

		return $data;
	}
}