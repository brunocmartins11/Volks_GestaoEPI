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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



    <!-- SCRIPTS -->

    <title>Validação</title>
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
    
    $selectDepartamentos = "SELECT * FROM `empregados` where (`registroEmpresa` = '" . $id . "')";
    $result = mysqli_query($conn, $selectDepartamentos);

    $rowDepartamentos = mysqli_fetch_assoc($result);


    $nome = $rowDepartamentos['nomeEmpregado'];
    $ghe = $rowDepartamentos['codGHE'];
    $epi = $_POST['codEPI'];
    $quantidade = $_POST['qntd'];

    $selectEntregas = "SELECT * FROM `entregas` where (`dataEntrega` != '" . date('d-m-y') . "')";
    $result = mysqli_query($conn, $selectDepartamentos);

    $rowDepartamentos = mysqli_fetch_assoc($result);
    $sql = "INSERT INTO `entregas`(`codEntrega`, `nomeEmpregado`, `codGHE`, `codEPI`, `quantidade`, `verificado`, `dataEntrega`) VALUES (null,'$nome','$ghe','$epi','$quantidade', '0', NOW())";

            if ($nome == '' || $ghe == '' || $epi == '' || $quantidade == '') {
                echo "<script>
                alert('Preencha todos campos do formulário.');
                </script>";

            }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
                alert('Entrega realizada! Insira sua senha para verificar.');
                </script>";
                    mysqli_free_result($resultSenha);
                } else {
                    echo "<script>
                alert('Entrega não realizada!');
                </script>";   
                }
                mysqli_error($conn); 
    
    ?>

    <div class="container"><img src="http://localhost/gestaoepi/codes/images/Logo 1 (Variação 1) (Sem Slogan).png" class="rounded mx-auto d-block" style="width:300px; /* you can use % */ 
    height: auto;"> </div>

    <div class="container" style="border: 1px solid silver; width: 30%; border-radius: 10px; padding: 25px;   position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);">
        <div>
            <form action="<?php echo "telaSenha.php?id= " . $id . "/" ?>" method="post">
                <center>
                    <label><b>Insira a senha para validar a entrega e receber os EPI´S</b></label>
                </center>
                <div class="row justify-content-center text-left">
                    <div class="form-group col-sm-12 flex-column d-flex">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock"></i></span>
                            </div>
                            <input class="form-control" type="password" id="pass" name="pass" aria-describedby="emailHelp" placeholder="Senha" />
                        </div>
                        <center>
                            <div>
                                <button type="submit" id="confirmar" name="confirmar" class="btn btn-outline-success" style="border-radius: 15px; margin-top: 25px;">Validar</button>
                                <button type="button" id="voltar" onclick="window.location.href='<?php echo 'telaGestor_Entrega.php?id= ' . $id . '' ?>'" name="voltar" class="btn btn-outline-primary" style="border-radius: 15px; margin-top: 25px;">Voltar</button>
                            </div>
                        </center>
                        <center>
                            <br>
                            <p style="color: black">Não possui uma senha? <a href="<?php echo "telaSenha2.php?id= " . $id . "/" ?>"><b>Cadastre uma nova</b></a>
                            <p>
                        </center>
            </form>
        </div>

    </div>
    </center>
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
        
        $id = $_GET['id'];
        $senha = $_POST['pass'];

        $selectSenha = "SELECT `senha` FROM `empregados` WHERE (`registroEmpresa` = '" . $id . "') LIMIT 1;";
        $resultSenha = mysqli_query($conn, $selectSenha);
        $rowSenha = mysqli_fetch_assoc($resultSenha);

        if ($senha == $rowSenha['senha']) {

            $sql = "UPDATE `entregas` SET `verificado`='1' WHERE 1";

            if (mysqli_query($conn, $sql)) {
                    echo "<script>
                alert('Entrega verificada!');
                </script>";
                    mysqli_free_result($resultSenha);
                } else {
                    echo "<script>
                alert('Entrega não verificada, tente novamente!');
                </script>";   
                }
                mysqli_error($conn); 
            
            }else{
                echo "<script>
                alert('Sua senha está errada ou não foi cadastrada.');
                </script>";
            }
            
        } 
    ?>
</body>

</html>