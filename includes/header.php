<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cleannet - Blacklist</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script href="https://code.jquery.com/jquery-2.0.3.min.js"></script>
    <style>
        .logo{
            max-height: 10%;
            max-width: 10%;
            min-height: 10%;
            min-width: 10%;
            position: relative;
            top:100%;
            bottom:90%;
            left: 50%;
            right: 50%;
            transform: translate(-50%,-50%);

        }
        .erro{
            color: red;
        }
    </style>
    <script>
        function formatar(mascara,documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(i);
            if (texto.substring(0,1)!= saida){
                documento.value += texto.substring(0,1);
            }
        }
    </script>
</head>

<body>