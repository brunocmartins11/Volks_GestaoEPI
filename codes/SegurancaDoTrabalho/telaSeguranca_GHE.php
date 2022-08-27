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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- SCRIPTS -->

    <title>Tela Segurança (EM PROGRESSO)</title>
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
        <nav class="navbar navbar-custom " style="height: 75px;">
            <a><img class="logoVW" src="http://localhost/gestaoepi/images/logoVolksW.png"></a>
            <p class="logo centro">Tela de Gestão -- Segurança do Trabalho</p>
            <ul class="NavBarLinks">
                <li>
                    <a href="/" class="centro"><img class="notificacao" src="http://localhost/gestaoepi/images/sino.png"></a>
                </li>
                <li><a href="http://localhost/gestaoepi/codes/php/logout.php" class="centro cor">Sair</a></li>
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
        <a href="telaSeguranca_EPI.php">
            <i class="fa fa-helmet-safety"></i>
            <span>Cadastro de EPi's</span>
        </a>
        <a href="telaSeguranca_GHE.php" class="active">
            <i class="fa fa-users"></i>
            <span>Cadastro de GHE</span>
        </a>
        <a href="telaSeguranca_Mensagem.php">
            <i class="fa fa-message"></i>
            <span>Mensagem</span>
        </a>
    </div>

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-users"><b> CADASTRO DE GHE</b></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Empresa:</label>
                            <input type="text" class="form-control" id="Nome_Empresa" aria-describedby="emailHelp" placeholder="Insira a Empresa">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Departamento:</label>
                            <input type="text" class="form-control" id="Nome_Departamento" aria-describedby="emailHelp" placeholder="Insira o Departamento">
                        </div>
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Nome GHE:</label>
                            <input type="text" class="form-control" id="Nome_GHE" aria-describedby="emailHelp" placeholder="Insira o Nome do GHE">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Código GHE:</label>
                            <input type="number" class="form-control" id="Codigo_GHE" aria-describedby="emailHelp" placeholder="Insira o Código do GHE">
                        </div>
                    </div>
                    <center>
                        <div>
                            <button type="submit" class="btn btn-outline-primary" style="border-radius: 15px;">Confirmar</button>
                        </div>
                    </center> 
                    </div>
                </form>
            </div>
        </div>
    </center>
    
    <a><button class=" floating-right-bottom-btn " data-toggle=" modal " data-target=" #exampleModalCenter ">
        <i class=" fa fa-circle-question meu-float "></i>
    </button></a>

<div class=" modal fade " id=" exampleModalCenter " tabindex=" -1 " role=" dialog "
    aria-labelledby=" exampleModalCenterTitle " aria-hidden=" true ">
    <div class=" modal-dialog modal-dialog-centered " role=" document ">
        <div class=" modal-content ">
            <div class=" modal-header ">
                <h5 class=" modal-title " id=" exampleModalLongTitle ">Tutorial</h5>
                <button type=" button " class=" close " data-dismiss=" modal " aria-label=" Close ">
                    <span aria-hidden=" true ">&times;</span>
                </button>

            </div>
            <div class=" modal-body ">
                Teste
            </div>
            <div class=" modal-footer ">
                <button type=" button " class=" btn btn-secondary " data-dismiss=" modal ">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>