<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="/css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>

<?php 
	require 'db.php';
	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('user', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( password_verify($data['password'], $user->password) )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
				echo '<div>Вы авторизованы!<br/> Можете перейти на <a href="/">главную</a> страницу.<br>Автоматический переход через 3 секунды</div><hr>';
				header('Refresh: 3; URL=index.php'); 
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}
		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
			echo '<div>' .array_shift($errors). '</div><hr>';
		}
	}
?>


<div class='login'>
        <div class='logo'>
            <a href='index.php'>
                <img src="img/logo.jpg">        
            </a>
        </div>
        <form  action="login.php" method="POST">
            
            <input type="text" name="login" placeholder='Логин'><br/>

            <input type="password" name="password" placeholder='Пароль'><br/>

            <button type="submit" name="do_login">Войти</button>
        </form>
    </div>
</body>
</html>
