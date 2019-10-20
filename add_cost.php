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
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 

$query ="SELECT name FROM groups where name is not null order by level, name";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

?>

<div class='add_cost'>
        <form>
                <select>
                    <option disabled selected>Категория</option>
                <?php
                    if($result)
                    {
                            $rows = mysqli_num_rows($result); // количество полученных строк

                        for ($i = 0 ; $i < $rows ; ++$i)
                        {
                            $row = mysqli_fetch_row($result);
                                for ($j = 0 ; $j < 1 ; ++$j) echo "<option>$row[$j]</option>";
                        }
                        // очищаем результат
                        mysqli_free_result($result);
                    }
                    ?>
                </select>
        </form>
</div>
<?php
mysqli_close($link);
?>
</body>
</html>


