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

    $selectDepartamentos = "SELECT `nomeEmpregado`, `codGHE` FROM `empregados` where (`registroEmpresa` = '" . $id . "')";
    $result = mysqli_query($conn, $selectDepartamentos);

    $rowDepartamentos = mysqli_fetch_assoc($result);


    $selectEPI = "SELECT * FROM `epighe` where (codGHE = '" . $rowDepartamentos['codGHE'] . "')";
    $resultEPI = mysqli_query($conn, $selectEPI);

    $rowEPI = mysqli_fetch_assoc($resultEPI);

    $selectNome = "SELECT `nomeEPI` FROM `epis` where (codCadastro = '" . $rowEPI['codEPI'] . "')";
    $resultNome = mysqli_query($conn, $selectNome);   

    $rowNome = mysqli_fetch_assoc($resultNome);
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
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-truck-ramp-box"><B> ENTREGA DE EPI'S</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <label><b>Selecione qual EPI será entregue e sua quantidade:</b><label>
                        <form action="<?php echo "telaSenha.php?id= " . $id . "/" ?>" method="post">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex" style="margin-top:20px;">
                                    <label>Nome do Empregado:</label>
                                    <input type="text" class="form-control" id="nomeEmpregado" name="nomeEmpregado" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[nomeEmpregado]";  ?>" disabled>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex" style="margin-top:20px;">
                                    <label>Código de GHE</label>
                                    <input type="text" class="form-control" id="codGHE" name="codGHE" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[codGHE]";  ?>" disabled>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                <b><label>Código do EPI:</label></b>
                            <input type="text" class="form-control" list="codEPI" name="codEPI" aria-describedby="emailHelp" placeholder="Insira o código do EPI">
                            <datalist id="codEPI" name="codEPI">
                                <?php
                                $servidor = "localhost";
                                $usuario = "root";
                                $senha = "";
                                $dbname = "gestaoepi_bd";
                                //Criar a conexao
                                $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

                                if (!$conn) {
                                    die("<script>
                                    alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</>");
                                } else {
                                    //echo "Conexao realizada com sucesso";
                                }

                                $id = $_GET['id'];

                                $selectGHE = "SELECT `codGHE` FROM `empregados` where (`registroEmpresa` = '" . $id . "')";
                                $result = mysqli_query($conn, $selectGHE);
                            

                                while($rowGHE = mysqli_fetch_assoc($result)){
                                    $selectEPI = "SELECT * FROM `epighe` where (`codGHE` = '" . $rowGHE['codGHE'] . "')";
                                    $resultEPI = mysqli_query($conn, $selectEPI);
                                
    
                                    while ($rowEPI = mysqli_fetch_assoc($resultEPI)) { 
                                        $selectNome = "SELECT `nomeEPI` FROM `epis` where (`codCadastro` = '" . $rowEPI['codEPI'] . "')";
                                        $resultNome = mysqli_query($conn, $selectNome); 

                                        while ($rowNome = mysqli_fetch_assoc($resultNome)){
                                        ?>
                                        <option value="<?php echo $rowEPI['codEPI']; ?>"><?php echo $rowNome['nomeEPI']; ?>
                                        </option><?php
    
                                                }
                                            }
                                        }
                                ?>
                            </datalist> 
                                </div>

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label>Quantidade:</label>
                                    <input type="number" class="form-control" id="qntd" name="qntd" min="0" max="999" aria-describedby="emailHelp" placeholder="Quantidade">
                                </div>
                            </div>
                            <!-- <input class="form-control" list="codCadastro" name="codCadastro" aria-describedby="emailHelp" /> -->

                            <center>
                                <div>
                                    <button type="submit" class="btn btn-outline-primary" name="confirmar" id="confirmar" style="border-radius: 15px; margin-top: 25px;">Confirmar</button>
                                        
                                    <button type="button" onclick="window.location.href='telaGestor_Entrega.php'" id="Voltar" name="Voltar" class="btn btn-outline-primary" style="border-radius: 15px; margin-top: 25px;">Voltar</button>
                                </div>

                            </center>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    Aqui você pode selecionar qual EPI entregar para o funcionário selecionado, podendo entregar mais de uma EPI por vez, alterando a quantidade.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

   
   $selectDepartamentos = "SELECT * FROM `empregados` where (`registroEmpresa` = '" . $id . "')";
    $result = mysqli_query($conn, $selectDepartamentos);

    $rowDepartamentos = mysqli_fetch_assoc($result);


    $nome = $rowDepartamentos['nomeEmpregado'];
    $ghe = $rowDepartamentos['codGHE'];
    $epi = $_POST['codEPI'];
    $quantidade = $_POST['qntd'];

    $enviar = $_POST['confirmar'];

    if (isset($enviar)) {

        $sql = "INSERT INTO `entregas`(`codEntrega`, `nomeEmpregado`, `codGHE`, `codEPI`, `quantidade`, `verificado`, `dataEntrega`) VALUES (null,'$nome','$ghe','$epi','$quantidade', '0', NOW())";

            if ($nome == '' || $ghe == '' || $epi == '' || $quantidade == '') {
                echo "<script>
                alert('Preencha todos campos do formulário.');
                </script>";

            }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
                alert('Entrega realizada! Insira sua senha para verificar.');
                </script>";
                mysqli_free_result($resultSenha);
                    
                } 
                if (!mysqli_query($conn, $sql)) {
                    echo "<script>
                alert('Entrega não realizada!');
                </script>";   
                }
                mysqli_error($conn); 

    }
    
   ?>
</body>

</html>