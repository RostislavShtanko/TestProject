<?php
class RegistrationController extends BaseController{
	function index( $app = '' ){
		$this->data = array();
		$this->data['login'] = $app->request()->post('login');
		$this->data['password'] = $app->request()->post('password');
		$this->data['msg'] = "";
		if(!empty($this->data['login']) && !empty($this->data['password'])){
			$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
                if (!$link){
                    echo 'CONNECTION ERROR';
                } else {
                    $check = true;
                	if( isset($this->data['login']) ) {
                    	$this->data['login'] = htmlspecialchars(mysqli_real_escape_string($link, $this->data['login']));                        
                    } else {
                        $check = false;
                    }

                    if( isset($this->data['password']) ) {                        
                        $this->data['password'] = md5(htmlspecialchars(mysqli_real_escape_string($link, $this->data['password'] . SALT )));
                    } else {
                        $check = false;
                    }

                    if($check) {
                        $query = 'SELECT * FROM users WHERE login="' . $this->data['login'] . '"';
                        $res = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($res);

                        if(empty($row['login'])) {
                        	$query = 'INSERT INTO users (login, password)
                                    VALUES ("' . $this->data['login'] . '", "' . $this->data['password'] . '")';
                            if ($res = mysqli_query($link, $query)) {
                                $this->data['msg'] = "Вы успешно зарегистрированы";
                                $this->data['is_reg'] = 1;
                            } else {
                                echo 'Ошибка отправки данных';
                            }
                        } else {
                            $this->data['msg'] = 'Данный логин занят';                        	
                        }
                    }
                }
            } else {
                $this->data['msg'] = "Корректно заполните все поля";
            }
    	$app->render('RegistrationView.php', $this->data);
	}
}