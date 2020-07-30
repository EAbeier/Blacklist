<?php
$servername = "127.0.0.1";
$username = "<user do db>";
$password = "<senha do db>";
$dbName = "<nome do db>";

$connect = mysqli_connect($servername, $username, $password, $dbName, 3308);
mysqli_set_charset($connect,"utf8");
if(mysqli_connect_error()) {
    echo "Erro na conexão" . mysqli_connect_error();
}

?>
