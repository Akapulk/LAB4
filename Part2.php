<html>
<head>
    <title>Lab3</title>
<style>
th {
background: IndianRed;
color: white;
padding: 10px;
}
body {
font-family: Arial, sans-serif;
}
td {
background: AliceBlue;
padding: 10px;
text-align: center;
}
button {
font-size: 16px;
}

</style>
</head>
<center>
<body bgcolor="AliceBlue">
    <?php
       include "base.php";

        $man = $_GET[ "field" ];
    ?>

    <?php
        $req_model = "SELECT * FROM `auto` WHERE `Manufacturer`=".$man;

        $res_model = mysql_query( $req_model) or die("Ошибка " . mysqli_error($link));

        if ( $res_model )
        {
            $cnt = mysql_num_rows( $res_model );

            echo "<table border='1'><tr><th>ID</th><th>Производитель</th><th>Тип</th><th>Стоимость (рублей)</th><th>Модель двигателя</th><th>Цвет</th></tr>";
            for ( $i = 0; $i < $cnt; $i++ )
            {
                $row = mysql_fetch_row($res_model);
                echo "<tr>";
                for ( $j = 0; $j < 6; $j++ )
                {
                    echo "<td>$row[$j]</td>";
                }
                echo "<tr>";
            }
        } else {
            echo "DB is empty";
        }
    ?>
</center>
</body>

</html>
