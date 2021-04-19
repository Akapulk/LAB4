<?php
	session_start();
	include "base.php";
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
 	include "registr.php";
?>
<a href = "index.php"> <center> <img src = "Логотип.jpg" width = "300" height = "300" /> </center> </a><br>
</div>

<div id = "as">
<table width = "100%" height = "973" border = "0">
<tr> <td width = "60%" valign = "top"> <font size = "3">

<?php
    $sql = mysql_query("SELECT * FROM user WHERE SNILS_p = " .$_SESSION['iduser']);
    echo "<center> <h2> Информация о вас </h2>";
    if(!$sql) exit(mysql_error());
    echo "<form action = '' method = 'GET'>";
    echo "<br> <input type = 'submit' value = 'Показать' name = 'ok'> <br>";
    echo "<br> <input type = 'submit' value = 'Скрыть' name = 'nok'> <br>";
    echo "<br>";
    if (isset($_GET['ok']))
    {
    	$user = mysql_fetch_array($sql);
    	echo "<h4> Вашa фамилия: ".$user['Surname']."<br>";
    	echo "Ваше имя: ".$user['Name']."<br>";
    	echo "Ваше отчество: ".$user['Patronym']."<br>";
    	echo "Ваш пол: ".$user['Gender']."<br> </h4>";
    	echo "Ваша почта: ".$user['Email']."<br>";
    	echo "Ваш телефон: ".$user['Phone']."<br>";
    	echo "Ваш логин: ".$user['Login']."<br>";
    	echo "Ваш пароль: ".$user['Password']."<br>";
    }
    echo "<br> <br>";
    echo "<h2> Ваши тестдрайвы </h2>";
    echo "<br>";
	$sql2 = mysql_query("SELECT * FROM `teastdrives` , `auto` , `testdrive` , `manufacturer` WHERE `teastdrives`.`IDTD` = `testdrive`.`IDTD` AND `auto`.`idAuto` = `testdrive`.`Autoid` AND `auto`.`Manufacturer` = `manufacturer`.`idMf` AND `teastdrives`.`UserID` =1"); 
	 //$sql2 = mysql_query("SELECT * FROM `teastdrives` , `auto` , `testdrive`,`manufacturer` WHERE `teastdrives`.`IDTD`=`testdrive`.`IDTD`AND `auto`.`idAuto`=`testdrive`.`Autoid` AND `auto`.`Manufacturer`=`manufacturer`.`idMf`and UserID =".$_SESSION['iduser']); 
    //$sql2 = mysql_query("SELECT * FROM departments, hospjournal, doctors WHERE hospjournal.SNILS_d = doctors.SNILS_d AND departments.Code_dep = hospjournal.Code_dep AND hospjournal.SNILS_p = " .$_SESSION['iduser']);
  //  $a1 = mysql_query("SELECT COUNT(1) FROM departments, hospjournal WHERE departments.Code_dep = hospjournal.Code_dep AND hospjournal.SNILS_p = " .$_SESSION['iduser']);
	$b1 = mysql_fetch_array($sql2);

    if($b1[0] == 0)
    {
    	echo "<center> <h3> <br> Вы еще не записывались на госпитализацию! <br>";    }
    else
    {
    echo "<center> <table cellpadding = '20'>";
	echo "<tr align = 'center'>";
	echo "<td> <h3 style = 'color: red'> Дата </h3> </td>";
	echo "<td> <h3 style = 'color: red'> Автопроизводитель </h3> </td>";
	echo "<td> <h3 style = 'color: red'> Модель </h3> </td>";
	echo "<td> <h3 style = 'color: red'> Год выпуска </h3> </td>";
	echo "<td> <h3 style = 'color: red'> Цена </h3> </td>";
	echo "</tr>";
	$s = 0;
	while ($s<$b1[0])
	{
		echo "<tr align = 'center'>";
    	echo "<td>";
    	echo $b1['Date'] ;
    	echo "</td>";
    	echo "<td>";
    	echo $b1['Brand'] ;
    	echo "</td>";
    	echo "<td>";
    	echo $b1['Model'] ;
    	echo "</td>";
    	echo "<td>";
    	echo $b1['year'] ;
    	echo "</td>";
    	echo "<td>";
    	echo $b1['Price'] ;
    	echo "</td>";
    	echo "</tr>";
	$s=$s+1;
	}
	echo " </center> </table>";
	}
    echo "<br> <br> <br>";
    
    echo "<br> <br> <br> </form> </div>";
?>

</body>
</html>
