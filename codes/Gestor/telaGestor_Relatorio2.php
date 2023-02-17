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

    <title>Tela Gestor</title>
</head>

<body>
    <?php
    error_reporting(0);

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "gestaoepi_bd";
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if (!$conn) {
        die("<script>
    alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</script>");
    } else {
        //echo "Conexao realizada com sucesso";
    }

    session_start();

    if (!isset($_SESSION['UsuarioID']) and (!isset($_SESSION['UsuarioNivel']))) {
        header("Location: http://localhost/gestaoepi/codes/login.html");
        exit;
    }

    $id = $_GET['id'];

    $selectDepartamentos = "SELECT * FROM `relatorios` where (`codRelatorio` = '" . $id . "')";
    $result = mysqli_query($conn, $selectDepartamentos);

    $rowDepartamentos = mysqli_fetch_assoc($result);
    ?>
<header>
        <nav class="navbar navbar-custom" style="height: 75px; ">
            <a><img class="logoVW" src="http://localhost/gestaoepi/codes/images/logoVolksW.png"></a>
            <p class="logo centro"><b>Tela de Acesso -- Gestor</b></p>
            <ul class="NavBarLinks">
                <li><a href="http://localhost/gestaoepi/codes/php/logout.php" class="centro cor"><b>Sair</b></a></li>
            </ul>
        </nav>
    </header>


    <div style="margin-top: 24px;">
    <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-file-lines"><B> RELATÓRIOS</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding-bottom: 25px;">
                <form action="" method="post">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex" style="margin-top:20px;">
                            <label>Nome do funcionário:</label>
                            <input type="text" class="form-control" id="nomeEmpregado" name="nomeEmpregado" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[nomeEmpregado]";  ?>" disabled>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex" style="margin-top:20px;">
                            <label>Situação de atraso:</label>
                            <input type="text" class="form-control" id="situacao" name="situacao" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[situacao]";  ?>" disabled>
                        </div>
                    </div>
            <center>
            <div>
                <button type="submit" id="confirmar" name="confirmar" class="btn btn-outline-success" style="border-radius: 15px; margin-top: 25px;">Solucionado</button>

                <button type="button" onclick="window.location.href='telaGestor_Relatorio.php'" id="Voltar" name="Voltar" class="btn btn-outline-primary" style="border-radius: 15px; margin-top: 25px;">Voltar</button>
            </div>

        </center>
        </div>


        </form>
        </div>

        </div>

    </center>

    <a><button style="position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #1b1b1b;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 2px 2px 3px #999;
    font-size: 35px;" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-circle-question meu-float"></i>
        </button></a>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tutorial</h5>


                </div>
                
                
                <div class="modal-body">
                    Nessa tela você deve clicar no botão "solucionado" caso o atraso da EPI tenha sido resolvido. Com isso, a ocorrência irá desaparecer da lista na tela anterior.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
   error_reporting(0);


   $servidor = "localhost";
   $usuario = "root";
   $senha = "";
   $dbname = "gestaoepi_bd";
   //Criar a conexao
   $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

   if (!$conn) {
       die("<script>
       alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</script>");
   } else {
       //echo "Conexao realizada com sucesso";
   }
    
   $enviar = $_POST['confirmar'];

    if (isset($enviar)) {
        
        $id = $_GET['id'];
        $sql = "DELETE FROM `relatorios` where (`codRelatorio` = '" . $id . "') LIMIT 1";


            if (mysqli_query($conn, $sql)) {
                    echo "<script>
                alert('Problema Solucionado! Relatório Excluído');
                </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
                alert('Relatório não Excluido');
                </script>";   
                }
                mysqli_error($conn); 
            
            }


    
   ?>
</body>

</html>