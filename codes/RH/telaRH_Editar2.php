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

$selectDepartamentos = "SELECT `registroEmpresa`, `nomeEmpregado`, `cpf`, `rg`, `dtNasc`, `endereco`, `cidade`, `bairro`, `complemento`, `email`, `codEmpresa`, `codDepartamento`, `codCargo`, `descCargo`, `codGHE` FROM `empregados` where (`registroEmpresa` = '" . $id . "') LIMIT 1";
$result = mysqli_query($conn, $selectDepartamentos);

$rowDepartamentos = mysqli_fetch_assoc($result);

$departamento1 = $rowDepartamentos['codDepartamento'];
$cargo1 = $rowDepartamentos['codCargo'];
$ghe1 = $rowDepartamentos['codGHE'];
$descCargo1 = $rowDepartamentos['descCargo'];
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

    <div style="margin-top:24px;">
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-user-pen"><B> EDITAR EMPREGADOS</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <label><b>Mude os dados de um campo e clique em "confirmar" para editá-lo<b><label>
                <form action="<?php echo "telaRH_Editar2.php?id= " . $id . ">" ?>" method="post">

                    <label>
                        <h3 style="border: 1px solid black; border-radius:30px; padding: 5px; margin-top:20px"><b>DADOS PESSOAIS</b></h3>
                    </label>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-9 flex-column d-flex">
                            <label>Nome do empregado:</label>
                            <input type="text" class="form-control" id="nomeEmpregado" name="nomeEmpregado" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[nomeEmpregado]";  ?>">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Número do registro:</label>
                            <input type="number" class="form-control" id="registroEmpresa" name="registroEmpresa" min="10000" max="99999" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[registroEmpresa]";  ?>">
                        </div>
                    </div>

                    <div class="row justify-content-left text-left">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>CPF</label>
                            <input type="number" class="form-control" id="cpf" name="cpf" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[cpf]";  ?>">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>RG</label>
                            <input type="number" class="form-control" id="rg" name="rg" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[rg]";  ?>">
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dtNasc" name="dtNasc" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[dtNasc]";  ?>">
                        </div>
                    </div>
                    <div class="row justify-content-left text-left">

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[endereco]";  ?>">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[cidade]";  ?>">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[bairro]";  ?>">
                        </div>

                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label>Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[complemento]"; ?>">
                        </div>
                        <div class="form-group col-sm-12 flex-column d-flex">
                            <label>Email do empregado:</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[email]"; ?>">
                        </div>
                    </div>

                    <label style="padding-top: 20px;">
                        <h3 style="border: 1px solid black; border-radius:30px; padding: 5px;"><b>DADOS PROFISSIONAIS</b></h3>
                    </label>

                    <div class="row justify-content-left text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código da Empresa:</label>
                            <input class="form-control" list="codEmpresa" name="codEmpresa" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$rowDepartamentos[codEmpresa]"; ?>"/>
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
                            <input class="form-control" list="codDepartamento" name="codDepartamento" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$departamento1"; ?>"/>
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
                            <input class="form-control" list="codCargo" name="codCargo" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$cargo1"; ?>"/>
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
                            <input class="form-control" list="codGHE" name="codGHE" aria-describedby="emailHelp" value="<?php error_reporting(0); echo "$ghe1"; ?>"/>
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
                            <textarea class="form-control" id="descCargo" name="descCargo" rows="3"><?php error_reporting(0); echo "$descCargo1"?></textarea>
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
                <button type="button" onclick="window.location.href='telaRh_Editar.php'" id="Voltar" name="Voltar" class="btn btn-outline-primary" style="border-radius: 15px; margin-top: 25px;">Voltar</button>
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
                    Nessa tela é possível ver todos os dados do funcionário selecionado. <br> <br> Você pode editar qualquer campo. O banco de dados será atualizado automaticamente.
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




        $sql = "UPDATE `empregados` SET `registroEmpresa`='$registroEmpresa',`nomeEmpregado`='$nome',`cpf`='$cpf',`rg`='$rg',`dtNasc`='$dtNasc',`endereco`='$endereco',`cidade`='$cidade',`bairro`='$bairro',`complemento`='$complemento',`email`='$email',`codEmpresa`='$codEmpresa',`codDepartamento`='$codDepartamento',`codCargo`='$codCargo',`descCargo`='$descCargo',`codGHE`='$codGHE' WHERE (`registroEmpresa` = '" . $id . "') and 1";

        if ($registroEmpresa == null || $nome == null || $cpf == null || $rg == null || $dtNasc == null || $endereco == null || $cidade == null || $bairro == null || $complemento == null || $email == null || $codEmpresa == null || $codDepartamento == null || $codCargo == null || $codGHE == null || $descCargo == null) {
            echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        } else {
                if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Empregado atualizado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('Empregado não foi atualizado');
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