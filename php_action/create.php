<?php
// conexão
require_once 'db_connect.php';

if(isset($_POST['btn_cadastrar'])){
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $rua = mysqli_escape_string($connect, $_POST['rua']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $complemento = mysqli_escape_string($connect, $_POST['complemento']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $data = mysqli_escape_string($connect, $_POST['data']);

    $sql= "INSERT INTO usuario(cpf,nome,sobrenome) VALUES ('$cpf', '$nome', '$sobrenome'), 
                    INSERT INTO endereco('cep', 'rua','numero','complemento','cidade', 'bairro', 'data_inclusão')
                    VALUES ('$cep','$rua','$numero','$complemento','$bairro','$cidade','$data') ";
    if(mysqli_query($connect, $sql)){
        header('location: index.php?sucesso');
    }else{
        header('location:index.php?sucesso');
    }
}



?>