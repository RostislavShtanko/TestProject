<?php
class AuthController extends BaseController{
	function index( $app = '' ){
		$this->data = $this->get_data($app);
		$this->model = new AuthModel();

		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		if(!empty($this->data['login']) && !empty($this->data['password']) && $link){
				
	        $this->data['login'] = htmlspecialchars(mysqli_real_escape_string($link, $this->data['login']));   

	        $this->data['password'] = md5(htmlspecialchars(mysqli_real_escape_string($link, $this->data['password'] . SALT )));

	        $this->data['auth_res'] = $this->model->addUser($this->data['login'], $this->data['password'], $link);

        } else {
            $this->data['auth_msg'] = "Корректно заполните все поля";
        }

        $this->data['auth_msg'] = $this->data['auth_res']['msg']; 

        if( $this->data['auth_res']['auth'] == 1){
    		$app->render('ProfileView.php', $this->data);
        } else {       	
    		$app->render('MainView.php', $this->data);
        }
	}

	private function get_data($app){
		$data['login'] = $app->request()->post('login');
		$data['password'] = $app->request()->post('password');
		$data['auth_msg'] = "";
		$data['auth_res'] = array();

		return $data;
	}
}