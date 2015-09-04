<?php

class AuthModel extends BaseModel{
	function addUser($login, $password, $link){
		$data = array();
	    if (!$link){
	        return 'CONNECTION ERROR';
	    } else {	       

	        if($this->check_login($login, $password, $link)) {
	          	$data['auth'] = 1;
	            $data['msg'] = 'Привет, ' . $login; 
	        } else {
	          	$data['auth'] = 0;
	            $data['msg'] = 'Неверный логин или пароль';                        	
	        }
	       
	    }
	    return $data;
	}

	private function check_login($login, $password, $link){
		$query = 'SELECT * FROM users WHERE login="' . $login . '"';
	    $res = mysqli_query($link, $query);
	    $row = mysqli_fetch_assoc($res);
	    if($row['password'] == $password) {
	    	return true;
	    }

	    return false;
	}
}