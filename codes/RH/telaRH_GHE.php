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

    <title>Tela Segurança</title>
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
        <a href="telaRH_CadastroF.php" >
            <i class="fa fa-id-card"></i>
            <span>Cadastrar Empregados</span>
        </a>
        <a href="telaSeguranca_GHE.html">
            <i class="fa fa-users"></i>
            <span>Editar Empregados</span>
        </a>
        <!-- <a href="telaRH_GHE.php" class="active">
            <i class="fa fa-users" ></i>
            <span>Cadastro de GHE</span>
        </a> -->
    </div>

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-users"><b> CADASTRO DE GHE</b></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form action="telaRH_GHE.php" method="post">

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Empresa:</label>
                            <select class="form-control" id="Nome_Empresa" name="Nome_Empresa" aria-describedby="emailHelp" >
                                <option>Selecione</option>
                                <?php
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
                                
                                    $selectEmpresas = "select * from `empresas`";
                                    $result = mysqli_query($conn, $selectEmpresas);

                                    while($rowEmpresas = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $rowEmpresas['codEmpresa']; ?>"><?php echo $rowEmpresas['nomeEmpresa']; ?>
                                    </option><?php

                                    }
                                    ?>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Departamento:</label>
                            <select class="form-control" id="Nome_Departamento" name="Nome_Departamento" aria-describedby="emailHelp">
                                <option>Selecione</option>
                                <?php
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
                                
                                    $selectDepartamentos = "select * from `departamentos`";
                                    $result = mysqli_query($conn, $selectDepartamentos);

                                    while($rowDepartamentos = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $rowDepartamentos['codDepartamento']; ?>"><?php echo $rowDepartamentos['nomeDepartamento']; ?>
                                    </option><?php

                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Nome GHE:</label>
                            <input class="form-control"  list="Nome_GHE" name="Nome_GHE" aria-describedby="emailHelp" placeholder="Insira o Nome do GHE"/>
                            <datalist id="Nome_GHE" name="Nome_GHE" >
                                <?php
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
                                
                                    $selectEmpresas = "select * from `ghe`";
                                    $result = mysqli_query($conn, $selectEmpresas);

                                    while($rowEmpresas = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $rowEmpresas['nomeGHE']; ?>">
                                    </option><?php

                                    }
                                    ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Código GHE:</label>
                            <input class="form-control"  list="Codigo_GHE" name="Codigo_GHE" aria-describedby="emailHelp" placeholder="Insira o Código do GHE"/>
                            <datalist id="Codigo_GHE" name="Codigo_GHE" >
                                <?php
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
                                
                                    $selectEmpresas = "select * from `ghe`";
                                    $result = mysqli_query($conn, $selectEmpresas);

                                    while($rowEmpresas = mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $rowEmpresas['codGHE']; ?>"><?php echo $rowEmpresas['nomeGHE']; ?>
                                    </option><?php

                                    }
                                    ?>
                            </datalist>
                        </div>
                    </div>
                    <center>
                        <div>
                            <button type="submit" id="confirmar" name="confirmar" class="btn btn-outline-primary" style="border-radius: 15px;">Confirmar</button>
                        </div>
                    </center>
            </div>
            </form>
        </div>
        </div>
    </center>

    <a><button style="position:absolute; right:0; bottom:0"><button style="position: fixed;
    width: 60px;
    height: 60px;
    bottom: 40px;
    right: 40px;
    background-color: #1b1b1b;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    box-shadow: 2px 2px 3px #999;
    font-size: 35px;" data-toggle=" modal " data-target=" #exampleModalCenter ">
            <i class=" fa fa-circle-question meu-float "></i>
        </button></a>

    <div class=" modal fade " id=" exampleModalCenter " tabindex=" -1 " role=" dialog " aria-labelledby=" exampleModalCenterTitle " aria-hidden=" true ">
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



        $empresa = $_POST['Nome_Empresa'];
        $departamento = $_POST['Nome_Departamento'];
        $codGHE = $_POST['Codigo_GHE'];
        $nomeGHE = $_POST['Nome_GHE'];



        $sql = "INSERT INTO `ghe` (`codGHE`, `nomeGHE`, `codEmpresa`, `codDepartamento`) VALUES ('$codGHE', '$nomeGHE', '$empresa', '$departamento')";

        if ($empresa == null ||  $departamento == null || $nomeGHE == null || $codGHE == null) {
            echo "<script>
      alert('Preencha os campos restantes.');
      </script>";
        } else {


            $comparar = "SELECT `codGHE`, `nomeGHE` FROM `ghe` WHERE (`codGHE` = '" . $codGHE . "') or (`nomeGHE` = '" . $nomeGHE . "')";

            $result = mysqli_query($conn, $comparar);

            if (mysqli_num_rows($result) >= 1) {

                echo "<script>
        alert('Este GHE já existe!');
        </script>";
                mysqli_error($conn);
            } else {
                if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('GHE Cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                    
                } else {
                    echo "<script>
            alert('GHE não foi Cadastrado');
            </script>";
                    mysqli_error($conn);
                }
            }
        }
        unset($empresa);
    unset($departamento);
    unset($codGHE);
    unset($nomeGHE);
    }
    

    ?>

</body>


</html>