<?php
$server= "localhost"  ;
    $user="root" ;
    $password="";
    $DB="lab3_1";
    $reply="sva_volhov@mail.ru";
    $dp=@mysql_connect($server,$user,$password) OR die ("Невозможно соединиться с mysql-сервером.
    Выполнение программы остановлено");
    @mysql_select_db($DB,$dp) OR  Die ("База не подключилась");
    mysql_query("SET NAMES cp1251");

?>







