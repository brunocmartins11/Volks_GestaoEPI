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

    <title>Tela Logistica</title>
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
        <nav class="navbar navbar-custom" style="height: 75px; ">
            <a><img class="logoVW" src="http://localhost/gestaoepi/codes/images/logoVolksW.png"></a>
            <p class="logo centro"><b>Tela de Acesso -- Logística</b></p>
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
        <a href="telaLogistica_Estoque.php" class="active">
            <i class="fa fa-box"></i>
            <span>Cadastro de Estoque</span>
        </a>
        <a href="telaLogistica_Busca.php">
            <i class="fa fa-search"></i>
            <span>Busca</span>
        </a>
    </div>

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-box"><B> CADASTRO
                    DE ESTOQUE</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form action="telaLogistica_Estoque.php" method="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-8 flex-column d-flex">
                            <label>Código de Cadastro do EPI:</label>
                            <div class="input-group mb-3">
                                <input class="form-control" list="codCadastro" name="codCadastro" aria-describedby="emailHelp" />
                                <datalist id="codCadastro" name="codCadastro">
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

                                    $selectDepartamentos = "SELECT * FROM `epis`";
                                    $result = mysqli_query($conn, $selectDepartamentos);

                                    while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $rowDepartamentos['codCadastro']; ?>"><?php echo $rowDepartamentos['nomeEPI']; ?>
                                        </option><?php

                                                }
                                                    ?>
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código do Lote:</label>
                            <input class="form-control" list="codLote" name="codLote" aria-describedby="emailHelp" placeholder="Insira o código do lote">
                            <datalist id="codLote" name="codLote">
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

                                $selectDepartamentos = "SELECT * FROM `lotes`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codLote']; ?>">
                                    </option><?php

                                            }
                                                ?>
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Nome do Fornecedor:</label>
                            <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" aria-describedby="emailHelp" placeholder="Insira o nome do fornecedor">
                        </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Data de Validade:</label>
                            <input type="date" class="form-control" id="dataValidade" name="dataValidade" aria-describedby="emailHelp" placeholder="Insira a data de validade">
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Data de recebimento:</label>
                            <input type="date" class="form-control" id="dataRecebimento" name="dataRecebimento" aria-describedby="emailHelp" placeholder="Insira a data de recebimento">
                        </div>
                    </div>


                    <div class="row justify-content-center text-left">

                        <div class="form-group col-sm-8 flex-column d-flex">
                            <label>Quantidade:</label>
                            <input type="number" class="form-control" id="qntd" name="qntd" aria-describedby="emailHelp" placeholder="Insira a Quantidade">
                        </div>

                    </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar" name="confirmar" class="btn btn-outline-primary" style="border-radius: 15px; margin-top: 25px;">Confirmar</button>
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
                    Nessa tela você pode cadastrar os EPI'S que entram no estoque. Certifique-se de inserir o código de lote corretamente.
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

    $enviar = $_POST['confirmar'];

    if (isset($enviar)) {

        $codLote = $_POST['codLote'];
        $codEPI = $_POST['codCadastro'];
        $nomeFornecedor = $_POST['nomeFornecedor'];
        $dataValidade = $_POST['dataValidade'];
        $dataRecebimento = $_POST['dataRecebimento'];
        $quantidade = $_POST['qntd'];


        $sql = "INSERT INTO `lotes`(`codLote`, `codCadastro`, `nomeFornecedor`, `dataValidade`, `dataRecebimento`, `quantidade`) VALUES 
        ('$codLote', '$codEPI', '$nomeFornecedor', '$dataValidade','$dataRecebimento', '$quantidade')";

        if ($codEPI == null || $codLote == null || $nomeFornecedor == null || $dataValidade == null || $dataRecebimento == null || $quantidade == null) {
            echo "<script>
alert('Preencha todos campos do formulário.');
</script>";
        } else {


                if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Lote cadastrado com sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O lote não foi cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }
        }
    unset($empresa);
    unset($departamento);
    unset($codGHE);
    unset($nomeGHE);



    ?>
</body>

</html>