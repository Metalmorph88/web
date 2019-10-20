<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>

<?php 
	require 'db.php';

	$data = $_POST;


	//если кликнули на button
	if ( isset($data['do_signup']) )
	{
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно!';
		}

		//проверка на существование одинакового логина
		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
    

		if ( empty($errors) )
		{
			//ошибок нет, теперь регистрируем
			$user = R::dispense('user');
			$user->login = $data['login'];
			$user->name = $data['name'];
			$user->surname = $data['surname'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); //пароль нельзя хранить в открытом виде, мы его шифруем при помощи функции password_hash для php > 5.6
			R::store($user);
			echo '<div style="color:green;">Вы успешно зарегистрированы! Можете перейти на страницу <a href="/">авторизации</a>.<br>Автоматический переход через 3 секунды.</div><hr>';
			header('Refresh: 3; URL=login.php'); 
		}else
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>
<div class='login'>
	<div class='logo'>
            <a href='index.php'>
		<img src="img/logo.jpg">
            </a>
        </div>
<form action="/signup.php" method="POST">
	<input type="text" name="login" placeholder='Логин'><br/>

	<input type="password" name="password" placeholder='Пароль'><br/>

	<input type="password" name="password_2" placeholder='Повторите пароль'><br/>

        <input type="text" name="name" placeholder='Имя'><br/>

        <input type="text" name="surname" placeholder='Фамилия'><br/>

	<button type="submit" name="do_signup">Регистрация</button>

</form>
</div>
</body>
</html>
