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
        <a href="http://localhost/gestaoepi/codes/Logistica/telaLogistica_Estoque.php">
            <i class="fa fa-box"></i>
            <span>Cadastro de Estoque</span>
        </a>
        <a href="http://localhost/gestaoepi/codes/Logistica/telaLogistica_Busca.php" class="active">
            <i class="fa fa-search"></i>
            <span>Busca</span>
        </a>
    </div>


    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-search"><B> BUSCA</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 60%; border-radius: 10px; padding: 25px;">
            <div>
                <form action="telaLogistica_Busca.php" method="POST">
                    <div class="form-group row col-8">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="buscaLote" name="buscaLote" aria-describedby="emailHelp" placeholder="Pesquise o EPI ou o Cod que deseja">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="filtro" id="filtro"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código do Lote</th>
                        <th scope="col">Código do EPI</th>
                        <th scope="col">Nome do Fornecedor</th>
                        <th scope="col">Data de Validade</th>
                        <th scope="col">Data de Recebimento</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
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
                        alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</>");
                    } else {
                        //echo "Conexao realizada com sucesso";
                    }

                    $filtrar = $_POST['buscaLote'];
                    $filtro = $_POST['filtro'];

                    if (isset($filtro)) {

                        $selectDepartamentos = "SELECT * FROM `lotes` where (`codLote` like '" . '%' . $filtrar . '%' . "') or (`codCadastro` like '" . '%' . $filtrar . '%' . "') or (`nomeFornecedor` like '" . '%' . $filtrar . '%' . "') ";
                        $result = mysqli_query($conn, $selectDepartamentos);

                        while ($rowDepartamentos = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" .  $rowDepartamentos['codLote']  . "</td>";
                            echo  "<td>" . $rowDepartamentos['codCadastro'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['nomeFornecedor'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['dataValidade'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['dataRecebimento'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['quantidade'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        $selectDepartamentos = "SELECT * FROM `lotes`";
                        $result = mysqli_query($conn, $selectDepartamentos);

                        while ($rowDepartamentos = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" .  $rowDepartamentos['codLote']  . "</td>";
                            echo  "<td>" . $rowDepartamentos['codCadastro'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['nomeFornecedor'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['dataValidade'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['dataRecebimento'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['quantidade'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }

                    ?>
                </tbody>
            </table>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    Aqui você pode verificar todo o estoque cadastrado no sistema.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>