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
            <a><img class="logoVW" src="http://localhost/gestaoepi/images/logoVolksW.png"></a>
            <p class="logo centro">Tela de Acesso -- Gestor</p>
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
        <a href="telaGestor_Lista.php" class="active">
            <i class="fa fa-users"></i>
            <span>Lista de Empregados</span>
        </a>
        <a href="telaGestor_Criar.php">
            <i class="fa fa-file-pen"></i>
            <span>Criar relatório</span>
        </a>
        <a href="telaGestor_Consultar.php">
            <i class="fa fa-search"></i>
            <span>Consultar relatório</span>
        </a>
    </div>
    <a><button class="floating-right-bottom-btn" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-circle-question meu-float"></i>
        </button></a>
    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-users"><B> LISTA DE EMPREGADOS</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">

            <div class="form-group row col-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="Nome_do_EPI" aria-describedby="emailHelp" placeholder="Pesquise o funcionário">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i
                                        class="fa fa-search"></i></button>
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
                        }

                                              
                        $selectDepartamentos = "SELECT * FROM `empregados`";
                        $result = mysqli_query($conn, $selectDepartamentos);

                        while ($rowDepartamentos = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" .  $rowDepartamentos['registroEmpresa']  . "</td>";
                            echo  "<td>" . $rowDepartamentos['nomeEmpregado'] . "</td>";
                            echo "</tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                        
                        
                        ?>

                        

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