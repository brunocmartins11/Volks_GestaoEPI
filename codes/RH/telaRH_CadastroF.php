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
        <a href="telaRH_CadastroF.php" class="active">
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

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-id-card"><B> CADASTRO
                    DE EMPREGADOS</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form action="telaRH_CadastroF.php" method="post">

                    <label>
                        <h3 style="border: 1px solid black; border-radius:30px; padding: 5px;"><b>DADOS PESSOAIS</b></h3>
                    </label>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-9 flex-column d-flex">
                            <label>Nome do empregado:</label>
                            <input type="text" class="form-control" id="nomeEmpregado" name="nomeEmpregado" aria-describedby="emailHelp" placeholder="Insira o nome do Empregado">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Número do registro:</label>
                            <input type="number" class="form-control" id="registroEmpresa" name="registroEmpresa" min="10000" max="99999" aria-describedby="emailHelp" placeholder="Nº de Registro">
                        </div>
                    </div>

                    <div class="row justify-content-left text-left">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>CPF</label>
                            <input type="number" class="form-control" id="cpf" name="cpf" aria-describedby="emailHelp" placeholder="Insira o CPF">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>RG</label>
                            <input type="number" class="form-control" id="rg" name="rg" aria-describedby="emailHelp" placeholder="Insira o RG">
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dtNasc" name="dtNasc" aria-describedby="emailHelp" placeholder="Insira o Número de CA">
                        </div>
                    </div>
                    <div class="row justify-content-left text-left">

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp" placeholder="Insira o Endereço">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="emailHelp" placeholder="Insira a Cidade">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" aria-describedby="emailHelp" placeholder="Insira o Bairro">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" aria-describedby="emailHelp" placeholder="Insira o Complemento">
                        </div>
                        <div class="form-group col-sm-12 flex-column d-flex">
                            <label>Email do empregado:</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Insira o Email do empregado">
                        </div>
                    </div>

                    <label style="padding-top: 20px;">
                        <h3 style="border: 1px solid black; border-radius:30px; padding: 5px;"><b>DADOS PROFISSIONAIS</b></h3>
                    </label>

                    <div class="row justify-content-left text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código da Empresa:</label>
                            <input class="form-control" list="codEmpresa" name="codEmpresa" aria-describedby="emailHelp" />
                            <datalist id="codEmpresa" name="codEmpresa">
                            
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

                                $selectDepartamentos = "select * from `empresas`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codEmpresa']; ?>"><?php echo $rowDepartamentos['nomeEmpresa']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </input>
                            </datalist>
                        </div>


                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código de Departamento:</label>  
                            <input class="form-control" list="codDepartamento" name="codDepartamento" aria-describedby="emailHelp" />
                            <datalist id="codDepartamento" name="codDepartamento">
                                <?php

                                $codEmpresa = $_POST['codEmpresa'];
                                $selectDepartamentos = "SELECT * FROM `departamentos`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codDepartamento']; ?>"><?php echo $rowDepartamentos['nomeDepartamento']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>



                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código de Cargo:</label>
                            <input class="form-control" list="codCargo" name="codCargo" aria-describedby="emailHelp" />
                            <datalist id="codCargo" name="codCargo">
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

                                $selectDepartamentos = "select * from `cargos`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codCargo']; ?>"><?php echo $rowDepartamentos['nomeCargo']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>GHE:</label>
                            <input class="form-control" list="codGHE" name="codGHE" aria-describedby="emailHelp" />
                            <datalist id="codGHE" name="codGHE">
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

                                $selectDepartamentos = "select * from `ghe`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codGHE']; ?>"><?php echo $rowDepartamentos['nomeGHE']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Descrição do Cargo:</label>
                            <textarea class="form-control" id="descCargo" name="descCargo" rows="3"></textarea>
                        </div>

                        <!-- <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Assinatura:</label>
                            <input type="file" class="form-control" id="Codigo_do_EPI" aria-describedby="emailHelp" placeholder="Insira o Número de CA">
                        </div> -->

                    </div>
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

    <a style="position:absolute; right:0; bottom:0"><button style="position: fixed;
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
            <i class="fa fa-circle-question" style="margin-top:10px"></i>
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
                    Aqui você deve cadastrar tanto os dados pessoais do funcionário, tanto os profissionais. <br><br>Caso você não encontre o que deseja nos seguintes campos: (Código da Empresa, Código de Departamento, Código de Cargo, GHE), contate o usuário administrador.
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



        $registroEmpresa = $_POST['registroEmpresa'];
        $nome = $_POST['nomeEmpregado'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $dtNasc = $_POST['dtNasc'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];
        $email = $_POST['email'];
        $codEmpresa = $_POST['codEmpresa'];
        $codDepartamento = $_POST['codDepartamento'];
        $codCargo = $_POST['codCargo'];
        $codGHE = $_POST['codGHE'];
        $descCargo = $_POST['descCargo'];


        $sql = "INSERT INTO `empregados`(`registroEmpresa`, `nomeEmpregado`, `cpf`, `rg`, `dtNasc`, `endereco`, `cidade`, `bairro`, `complemento`, `email`, `senha`, `codEmpresa`, `codDepartamento`, `codCargo`, `descCargo`, `codGHE`) VALUES 
        ('$registroEmpresa', '$nome', '$cpf', '$rg','$dtNasc', '$endereco', '$cidade', '$bairro', '$complemento', '$email', '', '$codEmpresa', '$codDepartamento', '$codCargo', '$descCargo', '$codGHE')";

        if ($registroEmpresa == null || $nome == null || $cpf == null || $rg == null || $dtNasc == null || $endereco == null || $cidade == null || $bairro == null || $complemento == null || $email == null || $codEmpresa == null || $codDepartamento == null || $codCargo == null || $codGHE == null || $descCargo == null) {
            echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        } else {


            $comparar = "SELECT * FROM `empregados` WHERE (`registroEmpresa` = '" . $registroEmpresa . "') or (`cpf` = '" . $cpf . "')";

            $result = mysqli_query($conn, $comparar);

            if (mysqli_num_rows($result) >= 1) {

                echo "<script>
        alert('Este Empregado já existe!');
        </script>";
                mysqli_error($conn);
            } else {
                if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Empregado Cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('Empregado não foi cadastrado');
            </script>";
                }
                mysqli_error($conn);
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