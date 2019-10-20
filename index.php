<!DOCTYPE html> <html> <head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>

<iframe class='workplace' name='workplace' width='100%' height='100%' frameborder='no' seamless>
</iframe>
    
<div class='auth'>
        <?php 
            require 'db.php';
        ?>

        <?php 
            if ( isset ($_SESSION['logged_user']) ) :
        ?>
        <p>Привет, 
            <?php 
                echo $_SESSION['logged_user']->name;
            ?>
        !</p>
        <a href="logout.php">Выйти</a>
        <?php 
            else : header("Location:login.php"); 
        ?>
        <?php 
            endif;  
        ?>
</div>
    
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