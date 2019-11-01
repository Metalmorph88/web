<!DOCTYPE html> <html> <head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>
    
    <?php 
        require 'db.php';
    ?>
    <?php 
        if ( isset ($_SESSION['logged_user']) ) :
    ?>
    <?php 
        else : header("Location:login.php"); 
    ?>
    <?php 
        endif;
    ?>
    
    <div class='top'>
        <div>
            <img src="img/logo.jpg">
        </div>
        <div class='stat_short'>
            <iframe name='short_stat' height='100%' width=100% frameborder='0' src="show_stats_short.php"></iframe>
        </div>
        <div>
            <?php 
                if ( isset ($_SESSION['logged_user']) ) :
            ?>
            <p> 
                Привет, 
                    <?php 
                        echo $_SESSION['logged_user']->name;
                    ?>
                !
            </p>
            <a href="logout.php">
                Выйти
            </a>
            <?php
                else : header("Location:login.php"); 
            ?>
            <?php 
                endif;
            ?>
        </div>
    </div>
    
    <div class='left'>
            <iframe name='form' height='100%' width=100% frameborder='0' src="add_cost.php"></iframe>
    </div>
    
    <div class='center'>
            <iframe name='workplace' height='100%' width=100% frameborder='0' src='show_stats_month.php'></iframe> 
    </div>

    <div class='right'>
            <ul>
                <li><a href='index.php'>На главную</a></li>
                <li><a href='signup.php'>Регистрация</a></li>
                <li><a href='login.php'>Авторизация</a></li>
                <br>
                <li><a href='add_category.php' target='form'>Добавить категорию</a></li>
                <li><a href='add_cost.php' target='form'>Добавить запись</a></li>
                <br>
                <li><a href='show_pay.php' target='workplace'>Доходы</a></li>
                <li><a href='show_cost.php' target='workplace'>Расходы</a></li>
                <li><a href='show_stats.php' target='workplace'>Статистика</a></li>
                <li><a href='show_category.php' target='workplace'>Категории</a></li>
                <li><a href='show_users.php' target='workplace'>Пользователи</a></li>
            </ul>
    </div>
    
        <?php   
            mysqli_close($link);
        ?>
</body>
</html>


                                