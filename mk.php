<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>

<div class='auth'>
<?php 
        require 'db.php';
?>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
        <p>Привет, 
            <?php echo $_SESSION['logged_user']->name;
            ?>!</p>
        <a href="logout.php">Выйти</a>

<?php else : ?>
Вы не авторизованы<br/>
<a href='login.php'>Авторизация</a>
<a href='signup.php'>Регистрация</a>
<?php endif; ?>


</div>

<iframe name='workplace', class='workplace' src='add_cost.php'>

</iframe>


<div class='menu'>
        <ul>
            <li><a href='index.php'>На главную</a></li>
            <li><a href='signup.php'>Создать пользователя</a></li>
            <li><a href='login.php'>Авторизация</a></li>
            <li><a href='add_cost.php' target='workplace'>Записать расходы</a></li>
            <li></li>
        </ul>
</div>
</body>
</html>
