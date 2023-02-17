<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/gestaoepi/codes/images/Logo 1 (Variação 1) (Sem Slogan).png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

session_start();

if (!isset($_SESSION['UsuarioID']) and (!isset($_SESSION['UsuarioNivel']))) {
    header("Location: http://localhost/gestaoepi/codes/login.html");
    exit;
}



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
        <a href="telaGestor_Entrega.php" class="active">
            <i class="fa fa-truck-ramp-box"></i>
            <span>Entrega de EPI's</span>
        </a>
        <a href="telaGestor_Lista_Relatorio.php">
            <i class="fa fa-file-lines"></i>
            <span>Relatórios de Entregas</span>
        </a>
        <a href="telaGestor_Relatorio.php">
            <i class="fa fa-file-circle-xmark"></i>
            <span>Relatórios Atrasados</span>
        </a>
    </div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-truck-ramp-box"><B> ENTREGA DE EPI'S</B></i></h2>
    </div>

                    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">

        <form method="post" action="telaGestor_Entrega.php">
            <label><b>Selecione o funcionário que deseja entregar os EPI'S:</b></label>
            <div class="form-group row col-10">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="filtrar" name="filtrar" aria-describedby="emailHelp" placeholder="Pesquise o funcionário">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="filtro" name="filtro"><i
                                        class="fa fa-search"></i>
                    </div>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome do Funcionário</th>
                            <th scope="col">Código da Empresa</th>
                            <th scope="col">Código do Cargo</th>
                            <th scope="col">Descrição de Cargo</th>
                            <th scope="col">Código do GHE</th>
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

                        $filtrar = $_POST['filtrar'];
                        $filtro = $_POST['filtro']; 
                        
                        if (isset($filtro)) {
                
                        $selectDepartamentos = "SELECT * FROM `empregados` where (`registroEmpresa` like '" . '%' . $filtrar . '%' . "') or (`nomeEmpregado` like '" . '%' . $filtrar . '%' . "')";
                        $result = mysqli_query($conn, $selectDepartamentos);

                        while ($rowDepartamentos = mysqli_fetch_assoc($result)) {
                            echo "<tr data-href='telaGestor_Entrega2.php?id= " . $rowDepartamentos['registroEmpresa'] . "'>";
                            echo "<td>" .  $rowDepartamentos['registroEmpresa']  . "</td>";
                            echo  "<td>" . $rowDepartamentos['nomeEmpregado'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codEmpresa'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codCargo'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['descCargo'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codGHE'] . "</td>";
                            echo "</tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                        
                    } else{

                        $selectDepartamentos = "SELECT * FROM `empregados`";
                        $result = mysqli_query($conn, $selectDepartamentos);

                        while ($rowDepartamentos = mysqli_fetch_assoc($result)) {
                            echo "<tr data-href='telaGestor_Entrega2.php?id= " . $rowDepartamentos['registroEmpresa'] . "'>";
                            echo "<td>" .  $rowDepartamentos['registroEmpresa']  . "</td>";
                            echo  "<td>" . $rowDepartamentos['nomeEmpregado'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codEmpresa'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codCargo'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['descCargo'] . "</td>";
                            echo  "<td>" . $rowDepartamentos['codGHE'] . "</td>";
                            echo "</tr>";


                        }
                        echo "</tbody>";
                        echo "</table>";
                    }       
                    echo "<script>
                        $(function(){
                            $('*[data-href]').on('click', function() {
                                 window.location = $(this).data('href');
                            });
                        });
                    </script>"
                        ?>
                        </center>
                    </tbody>
                    <table>
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
                    Nesse tela é possível ver todos os funcionários registrados em seu setor. <br><br>Ao clicar em um funcionário, você será redirecionado(a) para uma página em que poderá entregar EPI'S para o mesmo. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

</body>

</html>