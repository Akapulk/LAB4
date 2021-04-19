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
  if ($_SESSION['iduser'] == 0)
  {
  	echo "<center> <h2> Авторизуйтесь, чтобы получить доступ к записи! <br> <br>
  	</h2> </center>";
  }
  else
  {
  if (!empty($_POST['ok']))
  {		
  $sq66=mysql_query("SELECT * FROM `testdrive` WHERE Autoid='$_POST[otd]' and Date='$_POST[datain]'");
  if($sq66<>0){
	  echo "<center> <h2> Запись не возможна данная машина на данную дату забронирована </h2>";
  }else{
			echo $_POST[otd];
				echo $_POST[datain];
    			$sql2 = mysql_query("INSERT INTO testdrive (Autoid, Date) VALUES ('$_POST[otd]','$_POST[datain]')");
				$sql2 = mysql_query("SELECT * FROM `testdrive` ORDER BY IDTD DESC LIMIT 1");
				//$sql="INSERT INTO teastdrives (UserID, IDTD) VALUES ('$_SESSION[iduser]','".$sq28[0]."'"
				
				$sq32 = mysql_query("INSERT INTO `teastdrives`(`UserID`, `IDTD`) VALUES('$_SESSION[iduser]','$sql2[0]')");
    			if($sq32)
  				{
     					echo "<center> <h2> Запись осуществлена! </h2>";
   						echo "</center> </form>";
   				}
   				else
 				{
    					echo "<center> <h2> Запись не осуществлена!";
    					echo "<br> Возможно вы уже осуществили запись ранее!";
    					echo "<br> <br> <a href = hosp.php> Возврат </a>";
    					echo "</h2> </center>";
  				}
	}
  }
  else
  {
  ?>

 <div>
 <center>
 <h1 style> Запись на тест драйв </h1>
 <br>
 <form action = "" method = "post" name = "form_register">
 <table align = center cellpadding = '7' cellspacing = '6'>
 <tbody>
 <tr> <td> <h3> Выберите машину </h3> </td>
 <td>
 <?php
 	$sql = mysql_query("SELECT idAuto, Model FROM auto, manufacturer WHERE idMf=Manufacturer");
 	echo "<select name = 'otd' size = '1'>";
 	while ($s = mysql_fetch_array($sql))
 	{
 		$i = $s['idAuto'];
 	 	echo "<option value = $i>";
 	 	echo $s['Model'];
 	 	echo "</option>";
 }
 ?>
 </select>
 <tr> <td> <h3> Выберите дату тест драйва </h3> </td> <td>
 <input type = "date" name = "datain" required = "required"> </td> </tr> <tr>
 </td> </tr>
 <tr>
 <br>
 <br>
 </tr> </table>
 <br> <input type = "submit" name = "ok" value = "Сохранить">
 <br> <br> <br>
 <br> <br> </form> </center> </div>

 <?php
 }
 }
 ?>

</body>
</html>

