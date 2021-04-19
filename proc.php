<?php
	session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Gallery  </title>
<link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />
<link href = "style.css" rel = "stylesheet" type = "text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="script.js"></script>
<script>
var t;
function up()
{var top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
if(top > 0)
{window.scrollBy(0,-100); t = setTimeout('up()',20);} else clearTimeout(t); return false;}
</script>

<style>
.b1
{
    background: #fffddf;
    color: #834d18;
    font-size: 11pt;
}
</style>

<link href = "style.css" rel = "stylesheet" type = "text/css">
<meta charset = "windows-1251 /">
<title> Госпиталь </title> </head>

<body>
<div id = "r2">
<a href = "index.php?j=gl"> <b> ГЛАВНАЯ </b> </a>
<a href = "proc.php?j=us"> <b> АВТОМОБИЛИ В ПРОДАЖЕ </b> </a>
<a href = "hosp.php?j=br"> <b> ЗАПИСЬ НА ТЕСТ ДРАЙВ </b> </a>
<a href = "kont.php?j=r"> <b> КОНТАКТЫ </b> </a>
<a href = "foto.php?j=r"> <b> ФОТО </b> </a>
</div>

<div>
<br>
<br>
<?php
 	include "base.php";
?>
<a href = "index.php"> <center> <img src = "Логотип.jpg" width = "300" height = "300" /> </center> </a><br>
</div>
 <center>
 <?php
        $manufacurer = array();

        $req_man = "SELECT * FROM  `manufacturer`";
        $res_man = mysql_query($req_man) or die("Ошибка " . mysqli_error($link));

        if ( $res_man )
        {
            $cnt = mysql_num_rows( $res_man );

            for ( $i = 0; $i < $cnt; $i++ )
            {
                $row = mysql_fetch_row($res_man);

                $manufacurer[$row[ 0 ]] =  $row[ 1 ];
            }
        }
        else {
            echo "DB is empty";
        }

    ?>
<h4>Автомобили производителя<br></h4>

<form action="" method="get">
        Выберите производителя: <br>
        <select name = "field">
            <?php
                foreach ( $manufacurer as $key => $val )
                    echo "<option value=\"" . $key . "\">". $val ."</option>";
             echo $_POST["field"];
			?>
        </select><br>

        <input type="submit" value="Поиск"><br>
   </form>
  <?php
   $man = $_GET[ "field" ];
if($man != 0) {
//	
$req_model = "SELECT `Brand`,`Model`,`Pacet`,`Col`,`Volume`,`Price`,`Photo` FROM `auto`,`engine`,`manufacturer` WHERE `EngId`=`IdEngine`AND `Manufacturer`=`idMf`AND `Manufacturer`=".$man;
//$req_model = "SELECT * FROM `auto` WHERE `Manufacturer`=".$man;

        $res_model = mysql_query( $req_model) or die("Ошибка " . mysqli_error($link));

        if ( $res_model )
        {
            $cnt = mysql_num_rows( $res_model );

            echo "<table border='1'><tr><th>Бренд</th><th>Модель</th><th>Комплектация</th><th>Цвет</th><th>Двигатель</th><th>Цена</th><th>Фото</th></tr>";
            for ( $i = 0; $i < $cnt; $i++ )
            {
                $row = mysql_fetch_row($res_model);
                echo "<tr>";
                for ( $j = 0; $j < 7; $j++ )
                {
                    if($j<6)
					{
					echo "<td>$row[$j]</td>";
					}
					else
					{
echo "<td>";

			?>
			<img src="<?php echo $row[$j]; ?>">;<?php
						echo "</td>";
					}
                }
                echo "<tr>";
            }
        } else {
            echo "DB is empty";
        }
 }
?>


</body>
</html>


