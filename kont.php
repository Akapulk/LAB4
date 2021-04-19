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
<title> Автосалон </title> </head>

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
<a href = "index.php"> <center> <img src = "Логотип.jpg" width = "300" height = "300" /> </center> </a><br>
</div>

<div id = "as">
<table width = "100%" height = "973" border = "0">
<tr> <td width = "60%" valign = "top"> <font size = "3">
</div>

<div id = "as">
<p>
<br>
<br>
<H1 style = "text-align: center; font-size: 30px;"> Автохолдинг "Аларм-Моторс" </H1></p>
<br>
<p class = "x"> 
<br>
Аларм-Моторс – один из крупнейших автомобильных холдингов Северо-Запада России.
 <br>
Предприятия холдинга являются официальными дилерами коммерческих автомобилей Ford, Hyundai (легковые автомобили), KIA (легковые автомобили), Peugeot (легковые и коммерческие автомобили), Suzuki (легковые автомобили), Haval, УАЗ (легковые и коммерческие), FIAT Professional (коммерческий транспорт).
<br>
Автоцентры автохолдинга Аларм-Моторс в г. Санкт-Петербург:
<br>
Аларм-Моторс ЛАХТА (дилерский центр KIA),Выборгское шоссе, д.27 к.1<br>
Аларм-Моторс ОЗЕРКИ (дилерский центр Hyundai, Mazda, Geely, сервисный центр Ford),Выборгское шоссе, д.23 к.1<br>
Аларм-Моторс ЮГО-ЗАПАД (дилерский центр KIA, Suzuki, Haval),Коломяжский пр., д.18А<br>
Аларм-Моторс КОЛОМЯЖСКИЙ (дилерский центр Ford Transit, УАЗ, Peugeot, Suzuki и FIAT Professional),ул. Савушкина, д.108<br>
</a>
</div>
<div >

	<div>
		
		<ul>
			<li><h6>Номер телефона: 8800553535</h6></li>
		</ul>
		</div>
	
</div> <br>
<div>
	<h5>Если у вас есть вопросы, вы можете написать в службу подержки используя следующую форму</h5>

	<form method="post" action="" >
		Укажите вашу почту для ответа: <input type="text" name="umail"><br><br>
		 <textarea placeholder="Ваше сообщение" rows="10" cols="50" name="msg"></textarea>
		 <input type="submit" name="Отправить">
	</form><br>
</div>
</body>
</html>
