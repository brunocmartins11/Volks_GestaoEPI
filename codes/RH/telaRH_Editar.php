<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://tccepi.epizy.com/gestaoEPI/codes/images/Logo 1 (Variação 1) (Sem Slogan).png">

    <!-- SCRIPTS -->
    <link rel="stylesheet" href="http://tccepi.epizy.com/gestaoEPI/styles/telaSeguranca.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/93b1b18bdc.js" crossorigin="anonymous"></script>

    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- SCRIPTS -->

    <title>Tela RH</title>
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

session_start();

if (!isset($_SESSION['UsuarioID']) and (!isset($_SESSION['UsuarioNivel']))) {
    header("Location: http://tccepi.epizy.com/gestaoEPI/codes/login.html");
    exit;
}


    

?>
<header>
        <nav class="navbar navbar-custom" style="height: 75px; ">
            <a><img class="logoVW" src="http://tccepi.epizy.com/gestaoEPI/codes/images/logoVolksW.png"></a>
            <p class="logo centro"><b>Tela de Acesso -- Recursos Humanos</b></p>
            <ul class="NavBarLinks">
                <li><a href="http://tccepi.epizy.com/gestaoEPI/codes/php/logout.php" class="centro cor"><b>Sair</b></a></li>
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
        <a href="telaRH_CadastroF.php">
            <i class="fa fa-id-card"></i>
            <span>Cadastrar</span>
        </a>
        <a href="telaRH_Editar.php" class="active">
            <i class="fa fa-users"></i>
            <span>Consultar</span>
        </a>
    </div>

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-users"><B> EDITAR EMPREGADOS</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form action="telaRH_Editar.php" method="POST">

                    <label>Selecione o funcionário que gostaria de editar:</label>

                            <div class="row justify-content-center text-left">
                                <div class="form-group col-8 flex-column d-flex">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="filtrar" id="filtrar" aria-describedby="emailHelp" placeholder="Pesquisar">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="filtro" id="filtro"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Nome do Funcionário</th>
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
                        };

                        $filtrar = $_POST['filtrar'];
                        $filtro = $_POST['filtro']; 
                        
                        if (isset($filtro)) {
                
                        $selectEmpregado = "SELECT * FROM `empregados` where (`registroEmpresa` like '" . '%' . $filtrar . '%' . "') or (`nomeEmpregado` like '" . '%' . $filtrar . '%' . "') or (`codEmpresa` like '" . '%' . $filtrar . '%' . "')";
                        $result = mysqli_query($conn, $selectEmpregado);

                        while ($rowEmpregado = mysqli_fetch_assoc($result)) {
                            echo "<tr data-href='telaRH_Editar2.php?id= " . $rowEmpregado['registroEmpresa'] . "'>";
                            echo "<td>" .  $rowEmpregado['registroEmpresa']  . "</td>";
                            echo  "<td>" . $rowEmpregado['nomeEmpregado'] . "</td>";
                            echo "</tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "<script>
                        $(function(){
                            $('*[data-href]').on('click', function() {
                                 window.location = $(this).data('href');
                            });
                        });
                    </script>";
                        
                    }else{
                        $selectEmpregado = "SELECT * FROM `empregados` where (`registroEmpresa` like '" . '%' . $filtrar . '%' . "') or (`nomeEmpregado` like '" . '%' . $filtrar . '%' . "') or (`codEmpresa` like '" . '%' . $filtrar . '%' . "')";
                        $result = mysqli_query($conn, $selectEmpregado);

                        while ($rowEmpregado = mysqli_fetch_assoc($result)) {
                            echo "<tr data-href='telaRH_Editar2.php?id= " . $rowEmpregado['registroEmpresa'] . "'>";
                            echo "<td>" .  $rowEmpregado['registroEmpresa']  . "</td>";
                            echo  "<td>" . $rowEmpregado['nomeEmpregado'] . "</td>";
                            echo "</tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                    echo "<script>
                        $(function(){
                            $('*[data-href]').on('click', function() {
                                 window.location = $(this).data('href');
                            });
                        });
                    </script>";
                    };
  
                        ?>
                    </tbody>
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
                    Nessa tela você pode ver todos os funcionários já cadastrados no sistema. <br><br>Ao clicar em um, você será redirecionado para uma tela em que poderá editar as informações do funcionário.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>