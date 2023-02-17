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

    <title>Tela Gestor (EM PROGRESSO)</title>
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
            <p class="logo centro">Tela de Acesso -- Gestor</p>
            <ul class="NavBarLinks">
                <li>
                    <a href="/" class="centro"><img class="notificacao" src="http://localhost/gestaoepi/codes/images/sino.png"></a>
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
        <a href="telaGestor_Lista.php">
            <i class="fa fa-users"></i>
            <span>Lista de Empregados</span>
        </a>
        <!-- <a href="telaGestor_Criar.php">
            <i class="fa fa-file-pen"></i>
            <span>Criar relatório</span>
        </a>
        <a href="telaGestor_Consultar.php" class="active">
            <i class="fa fa-search"></i>
            <span>Consultar relatório</span>
        </a> -->
        <a href="telaGestor_Entrega.php">
            <i class="fa fa-truck-ramp-box"></i>
            <span>Entrega de EPI's</span>
        </a>
    </div>

   
    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-search"><B> CONSULTAR RELATÓRIOS</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 75%; border-radius: 10px; padding: 25px;">
            <form>
            <label>Nome ou número do empregado:</label>
            <div class="row justify-content-center text-left">
                <div class="form-group col-8 flex-column d-flex">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="buscaEmpregado" aria-describedby="emailHelp" placeholder="Pesquisar">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <label>Departamento do empregado:</label>
            <div class="row justify-content-center text-left">
            <form>
                <div class="form-group col-8 flex-column d-flex">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="filtro" aria-describedby="emailHelp" placeholder="Pesquisar">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <label>Período do funcionário:</label><br>
                <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="periodo" id="periodo1" value="matinal">
                            <label class="form-check-label" for="periodo1">Matinal</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="periodo" id="periodo2" value="vespertino">
                            <label class="form-check-label" for="periodo2">Vespertino</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="periodo" id="periodo3" value="noturno">
                            <label class="form-check-label" for="periodo3">Noturno</label>
                          </div>
                        </div><br>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código Relatório</th>
                            <th scope="col">Código do Funcionário</th>
                            <th scope="col">Período</th>
                            <th scope="col">Código da Empresa</th>
                            <th scope="col">Código de Departamento</th>
                            <th scope="col">Quantidade de EPIs</th>
                            <th scope="col">Tipo de EPI</th>
                            <th scope="col">Código do EPI</th>
                            <th scope="col">Prazo</th>
                            <th scope="col">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
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

                                              
                        $selectDepartamentos = "SELECT * FROM `relatorios`";
                        $selectEmpregado = "SELECT `registroEmpresa` FROM `relatorios`";
                        $selectNome = "SELECT `nomeEmpregado` FROM `relatorios` where (`registroEmpresa` = '" . $selectEmpregado . "')";
                        $result = mysqli_query($conn, $selectDepartamentos);
                        $result2 = mysqli_query($conn, $selectNome);

                        while ($rowDepartamentos = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" .  $rowDepartamentos['codRelatorio']  . "</td>";
                            echo  "<td>" . $rowDepartamentos['registroEmpresa'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['periodo'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codEmpresa'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codDepartamento'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['numEPIs'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['tipoEPI'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codCadastro'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['statusPrazo'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['descricao'] . "</td>";
                            echo "</tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                        
                        
                        ?>

                        <center>
                            <div>
                                <button type="submit" class="btn btn-outline-primary" style="border-radius: 15px; margin-bottom: 25px;">Pesquisar relatório</button>
                            </div>
                        </center>
                    </tbody>
                </table>

                    </form>
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
                                        Teste
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                    </div>       

</body>

</html>