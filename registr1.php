<?php
session_start();
?>

<html>
<head>
<meta http-equiv = "Content-Type" content = "text/html; charset = windows-1251" />
<title> Авторизация </title>
</head>

<style>
.b1
{
    background: #fffddf;
    color: #834d18;
    font-size: 11pt;
}
</style>

<?php
    if(!empty($_POST['nameU']) && !empty($_POST['pass']))
  {
    include("base.php");
    if (!get_magic_quotes_gpc())
    {
      $_POST['nameU'] = mysqli_real_escape_string($link,$_POST['nameU']);
      $_POST['pass'] = mysqli_real_escape_string($link,$_POST['pass']);
    }
    $pp=($_POST['pass']);
	 echo $pp;
	 $query = "SELECT COUNT(*) FROM user
              WHERE Login ='$_POST[nameU]' AND Password ='$pp'";
    $usr = mysqli_query($link,$query);
    if(!$usr) exit("Ошибка в блоке авторизации");
   define("TOTAL", 1);
  if(defined("TOTAL"))
  {
	$query = "SELECT SNILS_p FROM patients
              WHERE Login = '$_POST[nameU]' AND Password = '$_POST[pass]'";
    $usr = mysqli_query($link,$query);
	$user = mysql_fetch_array($usr);

	$_SESSION['nameU'] = $_POST['nameU'];
    $_SESSION['pass'] = $_POST['pass'];
	$_SESSION['iduser'] = $user['SNILS_p'];
 	$k = 1;
  }
  if(isset($_SESSION['nameU']))
  {
  	echo "<form method = 'GET' action = 'index.php'>
    <h3> Добро пожаловать, ".$_SESSION['nameU']."!&nbsp; </h3>
    <br>
    <input type = submit value = 'Выход' name = 'kk'> </form> <br>
    <a href = 'cabinet.php'> <h3> Переход в личный кабинет <h3> </a>
    </form>";
    $f = 'kk';
  }
  else
  {
    echo "Вы не зарегистрированы!";
  }
  }
   else
  {
  if(empty($_GET['kk']) and isset($_SESSION['nameU']))
  {
   echo"<form method = 'GET' action = 'index.php'>
   <h3> Добро пожаловать, ".$_SESSION['nameU']."!&nbsp; </h3>
   <br>
   <input type = submit value = 'Выход' name = 'kk'> </form> <br>
   </form>";
   if  (($_GET['j']) != $f)
   {
   echo "<a href = 'cabinet.php?$f'> <h3> Переход в личный кабинет <h3> </a>
   </form>";
   }
  }
  else
  {
    unset($_SESSION['nameU']);
    unset($_SESSION['pass']);
    unset($_SESSION['iduser']);

    echo "<form method = 'post' action = 'index.php'>";
    if (($_GET['i'])!=='yes')
    {
       	echo "&nbsp;&nbsp; <a href = 'index.php?i=yes'> <h2> Авторизация </h2> </a>";
       	echo "&nbsp;&nbsp; <a href = reg.php> <h2> Регистрация </h2> </a>";
       	session_destroy ();
    }
    elseif      (($_GET['i'])=='yes')
      {
    	echo "<table cellpadding = '6'>
		<tr>
 		<td>
		<h4> Логин </h4> </td> <td> <input type = text name = 'nameU' size = 10 value = ''> </td> </tr>
		<tr> <td>
		<h4> Пароль </h4> </td> <td> <input type = password name = 'pass' size = 10 value = ''> </td> </tr>
		<tr> <td>
		<input type = submit value = 'Вход'> </td> <td> <a href = 'index.php?i=no'> <h4> Отмена </h4> </a> </td> </tr>
		</table>";
	}
	echo"</form>";
 	}
  }
?>
</body>
</html>