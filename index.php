<!DOCTYPE html> <html> <head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>

    <div class='left'>
        <div class='mk'>
            <img src="img/logo.jpg">
        </div>
        <div class='forms'>
            <iframe name='form' height='100%' width=100% frameborder='0'>
            </iframe>
        </div>
    </div>
    <div class='center'>
        <div class='workplace'>
            <iframe name='workplace' height='100%' width=100% frameborder='0'>
            </iframe>
        </div>
    </div>

    <div class='right'>
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
                <li><a href='add_cost.php' target='form'>Добавить расход</a></li>
                <li><a href='show.php' target='workplace'>Пользователи</a></li>
                <li><a href='show.php' target='workplace'>Расходы</a></li>
                <li><a href='show.php' target='workplace'>Доходы</a></li>
                <li><a href='show.php' target='workplace'>Категории</a></li>
            </ul>
        </div>
    </div>
</body>
</html>