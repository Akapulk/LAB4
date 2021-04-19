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
<?php
 	include "registr.php";
?>

<a href = "index.php"> <center> <img src = "Логотип.jpg" width = "300" height = "300" /> </center> </a><br>
</div>

<div id = "as">
<div class = "block_for_messages">
<?php
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"]))
        {
            echo $_SESSION["error_messages"];
            unset($_SESSION["error_messages"]);
        }
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"]))
        {
            echo $_SESSION["success_messages"];
            unset($_SESSION["success_messages"]);
        }
?>
</div>

<?php
  include "base.php";
  if (!empty($_POST['ok']))
  {
  		if ( "1742" != $_SESSION['capcha'])
 		{ 			echo "<center> <h2> Код введен неверно! <br> <br>";
 			echo "<a href = reg.php> Возврат </a> </h2> </center>";
 		}
   		else
   		{   			$a = mysql_query("SELECT COUNT(1) FROM patients WHERE Login = '$_POST[login]'");
			$b = mysql_fetch_array($a);
    		if($b[0] != 0)
    		{
    			echo "<center> <h2> Этот логин занят, придумайте другой! <br> <br>";
 				echo "<a href = reg.php> Возврат </a> </h2> </center>";
    		}
    		else
    		{
   				$sql = mysql_query("INSERT INTO patients (Surname, Name, Patronym, Gender, Phone, Email, Login, Password)
  	 			VALUES ('$_POST[fam]', '$_POST[imya]', '$_POST[otch]', '$_POST[pol]', '$_POST[nomer]', '$_POST[email]', '$_POST[login]', '$_POST[parol]')");
  	 			if($sql)
  				{
     				echo "<center> <h2> Данные успешно добавлены! </h2>";
   					echo "</form>";
   				}
  				else
 				{
    				echo "<h2> Ошибка - ".mysql_error();
    				echo "</h2> </center>";
  				}
  			}
  		}
  }
  else
  {
  ?>

 <div>
 <center>
 <h1 style = 'color: red'> Регистрация </h1>
 <br>
 <form action = "" method = "post" name = "form_register">
 <table align = center cellpadding = '7' cellspacing = '6'>
 <tbody> <tr>
 <td> <h3> Введите логин </h3> </td> <td>
 <input type = "text" name = "login" required = "required"> </td> </tr> <tr>
 </td> </tr>
 <tr> <td> <h3> Введите Email </h3> </td>
 <td> <input type = "email" name = "email" required = "required"> <br>
 <span id = "valid_email_message" class = "mesage_error"> </span>
 </td> </tr>
 <tr>
 <td> <h3> Введите пароль </h3> </td>
 <td> <input type = "password" name = "parol" placeholder = " Минимум 6 символов!" required = "required"> <br>
 <span id = "valid_parol_message" class = "mesage_error"> </span>
 </td> </tr>
 <tr> <td> <h3> Введите фамилию </h3> </td> <td>
 <input type = "text" name = "fam" required = "required"> </td> </tr> <tr>
 </td> </tr>
 <tr> <td> <h3> Введите имя </h3> </td> <td>
 <input type = "text" name = "imya" required = "required"> </td> </tr> <tr>
 </td> </tr>
 <tr> <td> <h3> Введите отчество </h3> </td> <td>
 <input type = "text" name = "otch" required = "required"> </td> </tr> <tr>
 </td> </tr>
 <tr> <td> <h3> Введите номер телефона </h3> </td> <td>
 <input type = "text" name = "nomer" required = "required"> </td> </tr> <tr>
 </td> </tr>
 <tr> <td> <h3> Выберите пол </h3> </td> <td>
 <select name = "pol" size = "1">
    <option selected value = "Мужской"> Мужской </option>
    <option value = "Женский"> Женский </option>
 </select>
 </td> </tr>
<tr>
 <td> <h3> Введите символы с картинки </h3> </td>
 <td>
 <img style = "border: 1px solid gray; background: url('bg_capcha.png');" src = "captcha.php" width = "120" height = "40"/><br>
 <input type = "text" name = "capcha" placeholder = "Проверочный код" required = "required">
 </p> </td> </tr>
 <tr>
 <br>
 <td colspan = "2">
 <input type = "submit" name = "ok" value = "Зарегистрироваться!">
 </td> </tr>
 </table> </form> </center> </div>

 <?php
 }
 ?>

</body>
</html>


