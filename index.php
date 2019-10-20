<!DOCTYPE html> <html> <head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>

<div>
<?php 
        require 'db.php';
?>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
<?php
header("Location:mk.php");
?>
<?php else : ?>
Вы не авторизованы<br/>
<a href='login.php'>Авторизация</a>
<a href='signup.php'>Регистрация</a>
<?php endif; ?>

</div>
</body>
</html>
