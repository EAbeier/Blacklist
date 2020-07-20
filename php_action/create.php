<?php
//Sessao
session_start();
// conexão
require_once 'db_connect.php';

if(isset($_POST['bnt-cadastrar'])){
    $cpf = mysqli_escape_string($connect,$_POST['cpf']);
    $nome = mysqli_escape_string($connect,$_POST['nome']);
    $sobrenome = mysqli_escape_string($connect,$_POST['sobrenome']);
    $cep = mysqli_escape_string($connect,$_POST['cep']);
    $rua = mysqli_escape_string($connect,$_POST['rua']);
    $numero =mysqli_escape_string($connect,$_POST['numero']);
    $complemento = mysqli_escape_string($connect,$_POST['complemento']);
    $bairro = mysqli_escape_string($connect,$_POST['bairro']);
    $cidade = mysqli_escape_string($connect,$_POST['cidade']);
    $data =mysqli_escape_string($connect,$_POST['data']);

        if(strlen($cpf)===11){
            $bloco1 = substr($cpf,0,3);
            $bloco2 = substr($cpf,3,3);
            $bloco3 = substr($cpf,6,3);
            $dig= substr($cpf,-2);
            $cpfCnpjFormat = $bloco1.".".$bloco2.".".$bloco3."-".$dig;
        }else{
            $bloco1 = substr($cpf,0,2);
            $bloco2 = substr($cpf,2,3);
            $bloco3 = substr($cpf,5,3);
            $bloco4 = substr($cpf,8,4);
            $dig= substr($cpf,-2);
            $cpfCnpjFormat = $bloco1.".".$bloco2.".".$bloco3."/".$bloco4."-". $dig;
        }
    $blcep1= substr($cpf,0,5);
    $blcep2= substr($cpf,5,3);
    $cepFormat = $blcep1."-".$blcep2;
    $sql= "INSERT INTO endereco(cep, rua,numero,complemento, bairro,cidade, data_inclusao,cpf, nome, sobrenome) 
            VALUES ('$cepFormat','$rua','$numero','$complemento','$bairro','$cidade','$data',
            '$cpfCnpjFormat', '$nome', '$sobrenome') ";

    if (mysqli_query($connect, $sql)){
        $_SESSION['mensagem']= "Cadastrado com sucesso";
        header('Location: ../index.php');
    }else{
        $_SESSION['mensagem']= "erro ao cadastrar";
        die(mysqli_error($connect));
        header('Location: ../index.php');
    }
}



?>