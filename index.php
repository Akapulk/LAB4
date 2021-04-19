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

<link href = "style.css" rel = "stylesheet" type = "text/css">
<meta charset = "windows-1251 /">
<title> Аларм моторс </title> </head>

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
 	include "stat.php";
?>
<a href = "index.php"> <center> <img src = "Логотип.jpg" width = "300" height = "300" /> </center> </a><br>
</div>

<div id = "as">
<p>
<br>
<br>
<H1 style = "text-align: center; font-size: 30px;"> О нас </H1></p>
<br>
<p class = "x"> Информация о нас:
<br>
«Аларм-Моторс» — один из крупнейших автомобильных холдингов Северо-Запада России, основанный в 2003 году. Официальный дилер Ford, Hyundai, KIA, Geely, Mazda, Suzuki, Peugeot, Haval, УАЗ и Fiat.
</a>
</div>
<center> <img src = "ZAL.jpg" width = "600" height = "800" /> </center>
<a  href = "seestats.php?j=gl"> <b> Статистика посещений сайта </b> </a>
</body>
</html>
