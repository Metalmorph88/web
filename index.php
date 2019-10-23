<!DOCTYPE html> <html> <head>
    <meta charset="UTF-8">
    <title>Money Keeper</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
</head>
<body>
    
    <?php
            require_once 'connection.php'; // подключаем скрипт

            $link = mysqli_connect($host, $user, $password, $database) 
                or die("Ошибка " . mysqli_error($link)); 
    ?>
    
    <div class='top'>
        <div class='mk'>
            <img src="img/logo.jpg">
        </div>
        <div class='stats'>
            <table>
                <th style="background-color:LightGreen">Доход</th>
                <th style="background-color:Coral">Расход</th>
                <th style="background-color:SkyBlue">Баланс</th>
                <tr>
                    <td style="background-color:Honeydew">  
                            <?php                
                                $query1 ="select sum(cost) from material where groupid in (select id from category where type ='+')";

                                $in = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link)); 
                                if($in)
                                {
                                        $row1 = mysqli_fetch_row($in);
                                            echo $row1[0];
                                }
                            ?>
                    </td>
                    <td style="background-color:AntiqueWhite">  
                            <?php                
                                $query2 ="select sum(cost) from material where groupid in (select id from category where type ='-')";

                                $out = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link)); 
                                if($out)
                                {
                                        $row2 = mysqli_fetch_row($out);
                                            echo $row2[0];
                                }
                            ?>
                    </td>
                    <td style="background-color:LightCyan">  
                            <?php 
                                echo $row1[0]-$row2[0];
                            ?>
                    </td>
                </tr>
            </table>
        </div>
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
    </div>
    
    <div class='left'>
        <div class='forms'>
            <iframe name='form' height='100%' width=100% frameborder='0' src="add_cost.php">
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
        <div class='menu'>
            <ul>
                <li><a href='index.php'>На главную</a></li>
                <li><a href='signup.php'>Регистрация</a></li>
                <li><a href='login.php'>Авторизация</a></li>
                <br>
                <li><a href='add_category.php' target='form'>Добавить категорию</a></li>
                <li><a href='add_cost.php' target='form'>Добавить запись</a></li>
                <br>
                <li><a href='show.php' target='workplace'>Статистика</a></li>
                <li><a href='show.php' target='workplace'>Пользователи</a></li>
                <li><a href='show_cost.php' target='workplace'>Расходы</a></li>
                <li><a href='show.php' target='workplace'>Доходы</a></li>
                <li><a href='show.php' target='workplace'>Категории</a></li>
            </ul>
        </div>
    </div>
        <?php   
            mysqli_close($link);
        ?>
</body>
</html>