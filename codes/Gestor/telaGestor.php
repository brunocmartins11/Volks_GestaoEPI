<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SCRIPTS -->
    <link rel="stylesheet" href="http://localhost/gestaoepi/styles/telaSeguranca.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/93b1b18bdc.js" crossorigin="anonymous"></script>
    
    
    <!-- BOOTSTRAP -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    
    
    <!-- SCRIPTS -->

    <title>Tela Gestor (EM PROGRESSO)</title>
</head>
<body>
<?php

session_start();

if (!isset($_SESSION['UsuarioID']) and (!isset($_SESSION['UsuarioNivel']))) {
    header("Location: http://localhost/gestaoepi/codes/login.html");
    exit;
}


?>
    <header>
    <nav>
        <a><img class="logoVW" src="http://localhost/gestaoepi/images/logoVolksW.png"></a>
        <p class="logo">Tela de Acesso -- Gestor</p>
        <ul class="NavBarLinks">
            <li><a href="/"><img class="notificacao" src="http://localhost/gestaoepi/images/sino.png"></a></li>
            <li><a href="http://localhost/gestaoepi/codes/php/logout.php">Sair</a></li>
        </ul>
    </nav>
    </header>

    <input type="checkbox" id="check">
    <label for="check">
       <i class="fa fa-bars" id="btn"></i>
       <i class="fa fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Menu</header>
        <a href="telaGestor_Lista.php">
            <i class="fa fa-users"></i>
            <span>Lista de Empregados</span>
        </a>
        <a href="telaSeguranca_Criar.php">
            <i class="fa fa-file-pen"></i>
            <span>Criar relatório</span>
        </a>
        <a href="telaSeguranca_Consultar.php">
            <i class="fa fa-search"></i>
            <span>Consultar relatório</span>
        </a>
    </div>

</body>
</html>