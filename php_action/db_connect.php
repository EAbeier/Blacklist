<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbName = "db_blacklist";

$connect = mysqli_connect($servername, $username, $password, $dbName, 3308);
mysqli_set_charset($connect,"utf8");
if(mysqli_connect_error()) {
    echo "Erro na conexão" . mysqli_connect_error();
}

?>
