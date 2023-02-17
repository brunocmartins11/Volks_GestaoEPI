<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/gestaoepi/codes/images/Logo 1 (Variação 1) (Sem Slogan).png">

    <!-- SCRIPTS -->
    <link rel="stylesheet" href="http://localhost/gestaoepi/styles/telaSeguranca.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/93b1b18bdc.js" crossorigin="anonymous"></script>


    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- SCRIPTS -->

    <title>Tela Recursos Humanos</title>
</head>

<body>
    <?php

    session_start();

    if (!isset($_SESSION['UsuarioID']) and (!isset($_SESSION['UsuarioNivel']))) {
        header("Location: http://localhost/gestaoepi/codes/login.html");
        exit;
    }


    ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="meuModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true" style="color:red;font-size:60px">&times;</span>
        </button>

    <div id="carousel-example" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
    <li data-target="#carousel-example" data-slide-to="2" ></li>
</ol>

<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="http://localhost/gestaoepi/codes/images/Tela Tutorial 1 (PNG) [2].png" class="d-block w-100" alt="slide-img-1">
        <div class="carousel-caption">
            <h3 style="color: black;">1. Introdução</h1>
                <div class="carousel-caption-description">
                    <p style="color: black;">Olá! Seja bem-vindo ao seu ambiente de trabalho!</p>
                </div>
        </div>
    </div>
    <div class="carousel-item">
        <img src="http://localhost/gestaoepi/codes/images/Tela Tutorial 2 (PNG).png" class="d-block w-100" alt="slide-img-2">
        <div class="carousel-caption">
            <h3 style="color: black;">2. Menu</h3>
            <div class="carousel-caption-description">
                <p style="color: black;">Clique no quadrado preto para abrir o menu. Lá, você terá acesso a todas as funcionalidades.</p>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <img src="http://localhost/gestaoepi/codes/images/Tela Tutorial 3 (PNG).png" class="d-block w-100" alt="slide-img-3">
        <div class="carousel-caption">
            <h3 style="color: black;">3. Ajuda</h3>
            <div class="carousel-caption-description">
                <p style="color: black;">Ficou com alguma dúvida sobre como preencher algum campo? Clique no botão de interrogação na parte inferior da tela para receber ajuda.</p>
            </div>
        </div>
    </div>
</div>

<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
    <span class="fa fa-chevron-circle-left fa-xl" style="color: black; text-size: 30px"></span>
</a>
<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
    <span class="fa fa-chevron-circle-right fa-xl" style="color: black; text-size: 30px"></span>
</a>
</div>
    </div>
  </div>
</div>

    <header>
        <nav class="navbar navbar-custom" style="height: 75px; ">
            <a><img class="logoVW" src="http://localhost/gestaoepi/codes/images/logoVolksW.png"></a>
            <p class="logo centro"><b>Tela de Acesso -- Recursos Humanos</b></p>
            <ul class="NavBarLinks">
                <li><a href="http://localhost/gestaoepi/codes/php/logout.php" class="centro cor"><b>Sair</b></a></li>
            </ul>
        </nav>
    </header>

    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa fa-bars" id="btn"></i>
        <i class="fa fa-times" id="cancel"></i>
    </label>
    <div class="sidebar" style="margin-top: -24px;">
        <header>Menu</header>
        <a href="telaRH_CadastroF.php">
            <i class="fa fa-id-card"></i>
            <span>Cadastrar</span>
        </a>
        <a href="telaRH_Editar.php">
            <i class="fa fa-users"></i>
            <span>Editar Empregados</span>
        </a>
        <!-- <a href="telaRH_GHE.php">
            <i class="fa fa-users"></i>
            <span>Cadastro de GHE</span>
        </a> -->
    </div>

    <div style=" position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
  font-size: 20px;
  opacity: 0.5;"><img src="http://localhost/gestaoepi/codes/images/Logo1 - Sem slogan e sem fundo.png" style="width: 350px; margin: auto;" class="Logotipo"><br><b>Seja bem-vindo(a) ao seu espaço de trabalho!</b></div>

<script>

$('#meuModal').modal('show');

</script>

</body>

</html>