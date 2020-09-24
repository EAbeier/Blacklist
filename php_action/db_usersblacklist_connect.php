<?php
$servername = "127.0.0.1";
$username = "root";
$password = "131519";
$dbName = "users_blacklist";

$mysqli = mysqli_connect($servername, $username, $password, $dbName, 3308);
mysqli_set_charset($mysqli,"utf8");
if(mysqli_connect_error()) {
    echo "Erro na conexão" . mysqli_connect_error();
}

?>