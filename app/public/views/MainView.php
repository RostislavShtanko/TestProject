<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		<span class="form_title">Регистрация</span>
		<form action="/registration" method="post" id="register">
				<label>Логин:</label><br/>
				<input class="input-text base_input" name="login" type="text" size="25" id="reg_login" /><br/>
				<label>Пароль:</label><br/>
				<input class="input-text base_input" name="password" type="password" size="25" id="reg_pass" /><br/>
				<input type="submit">
		</form>
		<?php
			if(isset($data)){
				if(!empty($data['msg'])){
					echo $data['msg'].'<br/>';
				}
			}
		?>
		<span class="form_title">Авторизация </span>
		<form action="/auth" method="post" id="auth">
				<label>Логин:</label><br/>
				<input class="input-text base_input" name="login" type="text" size="25" id="reg_login" /><br/>
				<label>Пароль:</label><br/>
				<input class="input-text base_input" name="password" type="password" size="25" id="reg_pass" /><br/>
				<input type="submit">
		</form>
		<?php
			if(isset($data)){
				if(!empty($data['auth_msg'])){
					echo $data['auth_msg'].'<br/>';
				}
			}
		?>
	</body>
</html>