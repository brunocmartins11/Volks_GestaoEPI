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
            <p class="logo centro"><b>Tela de Acesso -- Segurança do Trabalho</b></p>
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
        <a href="telaSeguranca_EPI.php" class="active">
            <i class="fa fa-helmet-safety"></i>
            <span>Cadastro de EPi's</span>
        </a>
        <a href="telaSeguranca_GHE.php">
            <i class="fa fa-users"></i>
            <span>EPI's para GHE</span>
        </a>
    </div>

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-helmet-safety"><B> CADASTRO
                    DE EPI´S</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form method="post" action="telaSeguranca_EPI.php">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label>Código de Cadastro</label>
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

                    <div class="form-group col-sm-6 flex-column d-flex">
                        <label>Tipo do EPI:</label>
                        <select id="tipoEPI" name="tipoEPI" class="form-control">
                            <option>Selecione o EPI</option>
                            <option value="Auditiva">Proteção Auditiva</option>
                            <option value="Respiratoria">Proteção Respiratória</option>
                            <option value="Visual">Proteção Visual</option>
                            <option value-="Facial">Proteção Facial</option>
                        </select>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Nome do EPI:</label>
                            <input class="form-control" list="nomeEPI" name="nomeEPI" aria-describedby="emailHelp" />
                            <datalist id="nomeEPI" name="nomeEPI">
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

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código do CA:</label>
                            <input class="form-control" list="codCA" name="codCA" aria-describedby="emailHelp" />
                            <datalist id="codCA" name="codCA">
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
                                    <option value="<?php echo $rowDepartamentos['codCA']; ?>"><?php echo $rowDepartamentos['nomeEPI']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>
                    </div>




                    <div class="container" style="border: 1px solid silver; width: 60%; border-radius: 10px;">

                        <i class="fa fa-clock" style="font-size: 30px; padding-top: 10px; padding-bottom: 10px;"></i>

                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label>Frequência:</label>
                                <select class="form-control" id="frequencia" name="frequencia">
                                    <option value="0">Selecione a frequência</option>
                                    <option value="1">Diária</option>
                                    <option value="7">Semanal</option>
                                    <option vakue="15">Quinzenal</option>
                                    <option value="30">Mensal</option>
                                    <option value="365">Anual</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label>Quantidade:</label>
                                <input type="number" class="form-control" id="qntd" name="qntd" aria-describedby="emailHelp" placeholder="Insira a Quantidade">
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
                    Código de Cadastro - Neste campo deve ser inserido o código de cadastro do EPI. Caso não saiba qual código utilizar em seguida, a filtragem inteligente te mostrará qual foi o número do último EPI cadastrado.<br><br>

                    Tipo do EPI - Neste campo deve ser inserido o tipo específico do EPI. Caso você não encontre o tipo de EPI que precisa, entre em contato com o administrador.<br><br>

                    Nome do EPI - Neste campo deve ser inserido o nome do EPI.<br><br>

                    Código do CA - Neste campo deve ser inserido o código do certificado de autorização do EPI.<br><br>

                    Frequência e Quantidade - Neste campo deve ser inserido a frequência da entrega do EPI, junto da quantidade. Por exemplo, ao selecionar "Diário" e escrever na quantidade "5", significa que o usúario receberá 5 EPIs por dia.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <a href="#" class="floating-right-bottom-btn">
        <i class="fa fa-circle-question meu-float"></i>
    </a> -->

    <!-- <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
        <form>
            <div class="row mb-3">
        <div class="col-6">
          <label for="Nome_do_EPI">Nome do EPI</label>
          <input type="text" class="form-control" id="Nome_do_EPI" aria-describedby="emailHelp" placeholder="Insira o nome do EPI">
        </div>
        <div class="row mb-3">
          <label for="Tipo_do_EPI">Tipo do EPI</label>
          <input type="text" class="form-control" id="Tipo_do_EPI" placeholder="Senha">
        </div>
            <div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div> -->

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

        $codCadastro = $_POST['codCadastro'];
        $tipoEPI = $_POST['tipoEPI'];
        $nomeEPI = $_POST['nomeEPI'];
        $codCA = $_POST['codCA'];
        $frequencia = $_POST['frequencia'];
        $quantidade = $_POST['qntd'];

        if ($frequencia == "0") {
            echo "<script>
    alert('Selecione a frequência!');
    </script>";
        }

        $sql = "INSERT INTO `epis`(`codCadastro`, `tipoEPI`, `nomeEPI`, `codCA`, `frequencia`, `quantidade`) VALUES 
        ('$codCadastro', '$tipoEPI', '$nomeEPI', '$codCA','$frequencia', '$quantidade')";

        if ($codCadastro == null || $tipoEPI == null || $nomeEPI == null || $codCA == null || $frequencia == null || $quantidade == null) {
            echo "<script>
alert('Preencha todos campos do formulário.');
</script>";
        } else {



            $comparar = "SELECT * FROM `epis` WHERE (`codCadastro` = '" . $codCadastro . "') or (`nomeEPI` = '" . $nomeEPi . "') or (`codCA` = '" . $codCA . "')";

            $result = mysqli_query($conn, $comparar);

            if (mysqli_num_rows($result) >= 1) {

                echo "<script>
    alert('Este EPI já existe!');
    </script>";
                mysqli_error($conn);
            } else {
                if (mysqli_query($conn, $sql)) {
                    echo "<script>
        alert('EPI cadastrado com Sucesso!');
        </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
        alert('EPI não foi cadastrado');
        </script>";
                }
                mysqli_error($conn);
            }
        }
    }

    ?>
</body>
</html>