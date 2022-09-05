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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
    <!-- SCRIPTS -->

    <title>Tela Logistica (EM PROGRESSO)</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-custom" style="height: 75px; ">
            <a><img class="logoVW" src="http://localhost/gestaoepi/images/logoVolksW.png"></a>
            <p class="logo centro">Tela de Gestão -- Logística</p>
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
        <a href="telaLogistica_Estoque.php">
            <i class="fa fa-box"></i>
            <span>Cadastro de Estoque</span>
        </a>
        <a href="telaLogistica_Busca.php">
          <i class="fa fa-search"></i>
          <span>Busca</span>
      </a>
        <a href="telaLogistica_Checagem.php">
          <i class="fa fa-search"></i>
          <span>Checagem</span>
      </a>
      <a href="telaLogistica_Estoque.php">
          <i class="fa fa-search"></i>
          <span>Estoque</span>
      </a>
        <a href="telaLogistica_Mensagem.php">
          <i class="fa fa-message"></i>
            <span>Mensagem</span>
        </a>
    </div> 
    
    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-box"><B> CADASTRO
                    DE ESTOQUE</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form>
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-8 flex-column d-flex">
                            <label>Nome do EPI:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="Nome_do_EPI" aria-describedby="emailHelp" placeholder="Pesquise o EPI ou o Cod que deseja">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Código do Lote:</label>
                            <input type="text" class="form-control" id="Nome_do_EPI" aria-describedby="emailHelp" placeholder="Insira o código do lote">
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Nome do Fornecedor:</label>
                            <input type="number" class="form-control" id="Codigo_do_EPI" aria-describedby="emailHelp" placeholder="Insira o nome do fornecedor">
                        </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Data de Validade:</label>
                            <input type="date" class="form-control" id="Nome_do_EPI" aria-describedby="emailHelp" placeholder="Insira a data de validade">
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label>Data de recebimento:</label>
                            <input type="date" class="form-control" id="Codigo_do_EPI" aria-describedby="emailHelp" placeholder="Insira a data de recebimento">
                        </div>
                    </div>


                        <div class="row justify-content-center text-left">

                            <div class="form-group col-sm-8 flex-column d-flex">
                                <label>Quantidade:</label>
                                <input type="number" class="form-control" id="qtnd" aria-describedby="emailHelp" placeholder="Insira a Quantidade">
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

    <a><button class="floating-right-bottom-btn" data-toggle="modal" data-target="#exampleModalCenter">
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
                    Teste
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






        $sql = "INSERT INTO `empregados`(`registroEmpresa`, `nomeEmpregado`, `cpf`, `rg`, `dtNasc`, `endereco`, `cidade`, `bairro`, `complemento`, `codEmpresa`, `codDepartamento`, `codCargo`, `descCargo`, `codGHE`) VALUES 
        ('$registroEmpresa', '$nome', 'sha1($cpf)', 'sha1($rg)','$dtNasc', '$endereco', '$cidade', '$bairro', '$complemento', '$codEmpresa', '$codDepartamento', '$codCargo', '$descCargo', '$codGHE')";

        if ($registroEmpresa == null || $nome == null || $cpf == null || $rg == null || $dtNasc == null || $endereco == null || $cidade == null || $bairro == null || $complemento == null || $codEmpresa == null || $codDepartamento == null || $codCargo == null || $codGHE == null || $descCargo == null) {
            echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        } else {


            $comparar = "SELECT * FROM `empregados` WHERE (`registroEmpresa` = '" . $registroEmpresa . "') or (`cpf` = '" . sha1($cpf) . "')";

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