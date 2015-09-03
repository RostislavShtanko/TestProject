<?php

class RegistrationModel extends BaseModel{
	function addUser($login, $password, $link){
	    if (!$link){
	        return 'CONNECTION ERROR';
	    } else {	       

	        if($this->check_login($login, $link)) {
	          	$query = 'INSERT INTO users (login, password)
	        			VALUES ("' . $login . '", "' . $password . '")';
	            if ($res = mysqli_query($link, $query)) {
	                return 'Вы успешно зарегистрированы';
	            } else {
	                return 'Ошибка отправки данных';
	            }
	        } else {
	            return 'Данный логин занят';                        	
	        }
	       
	    }
	}

	private function check_login($login, $link){
		 $query = 'SELECT * FROM users WHERE login="' . $login . '"';
	     $res = mysqli_query($link, $query);
	     $row = mysqli_fetch_assoc($res);

	    if(empty($row['login'])) {
	    	return true;
	    }

	    return false;
	}
}