<?php
//Sessao
session_start();
// conexão
require_once 'db_connect.php';


if(isset($_POST['bnt-cadastrar'])){
    $contrato = mysqli_escape_string($connect,$_POST['contrato']);
    $nome = mysqli_escape_string($connect,$_POST['nome']);
    $cep = mysqli_escape_string($connect,$_POST['cep']);
    $rua = mysqli_escape_string($connect,$_POST['rua']);
    $numero =mysqli_escape_string($connect,$_POST['numero']);
    $complemento = mysqli_escape_string($connect,$_POST['complemento']);
    $bairro = mysqli_escape_string($connect,$_POST['bairro']);
    $cidade = mysqli_escape_string($connect,$_POST['cidade']);
    $data = date("Y/m/d");

    $sql= "INSERT INTO endereco(rua,numero,complemento, bairro,cidade, data_inclusao, contrato, nome) 
            VALUES ('$rua','$numero','$complemento','$bairro','$cidade','$data',
            '$contrato', '$nome') ";

    if (mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Cadastrado com sucesso";
        header('Location: ../adicionar.php');
    }else{
        $_SESSION['mensagem']= "erro ao cadastrar";
        die(mysqli_error($connect));
        header('Location: ../adicionar.php');
    }

}



?>