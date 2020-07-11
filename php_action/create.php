<?php
// conexão
require_once 'db_connect.php';

if(isset($_POST['btn_cadastrar'])){
$cpf = mysqli_escape_string($connect, $_POST['cpf']);
$nome = mysqli_escape_string($connect, $_POST['cpf']);
$sobrenome = mysqli_escape_string($connect, $_POST['cpf']);
$cep = mysqli_escape_string($connect, $_POST['cpf']);
$rua = mysqli_escape_string($connect, $_POST['cpf']);
$numero = mysqli_escape_string($connect, $_POST['cpf']);
$complemento = mysqli_escape_string($connect, $_POST['cpf']);
$bairro = mysqli_escape_string($connect, $_POST['cpf']);
$cidade = mysqli_escape_string($connect, $_POST['cpf']);
$data = mysqli_escape_string($connect, $_POST['cpf']);


}



?>