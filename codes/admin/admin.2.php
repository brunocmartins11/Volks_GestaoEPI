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

    <title>Tela Admin</title>
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
            <p class="logo centro"><b>Tela de Acesso -- ADMIN (KEY-USER)</b></p>
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
    <a href="admin.1.php">
        <i class="fa fa-helmet-safety"></i>
        <span>Cadastro de novos campos</span>
    </a>

    <a href="admin.2.php"  class="active">
            <i class="fa fa-user-plus"></i>
            <span>Cadastro de usuários</span>
        </a>
</div>

<CENTER>
    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-user-plus"><B> CADASTRO DE USUÁRIOS</B></i></h2>
    </div>
</CENTER>

<div class="container" style="border: 5px solid black; width: 80%; border-radius: 10px; padding: 25px;">
    <div>
        <h3 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-helmet-safety"><B> CADASTRO: SEGURANÇA DO TRABALHO</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 80%; border-radius: 10px; padding: 25px; margin-bottom: 35px">
            <div>
                <form action="admin.2.php" method="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>LOGIN:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="loginSeguranca" name="loginSeguranca" aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>SENHA:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="senhaSeguranca" name="senhaSeguranca" aria-describedby="emailHelp" />
                            </div>
                        </div>
                    </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar_seguranca" name="confirmar_seguranca" class="btn btn-outline-success" style="border-radius: 15px;">Cadastrar</button>
                        </div>
                    </center>
                </form>

        </div>

    </center>

    <div>
        <h3 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-id-card"><B> CADASTRO: RECURSOS HUMANOS</B></i></h2>
    </div>

    <center>
    <div class="container" style="border: 1px solid silver; width: 80%; border-radius: 10px; padding: 25px; margin-bottom: 35px">
            <div>
                <form action="admin.2.php" method="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>LOGIN:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="loginRH" name="loginRH" aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>SENHA:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="senhaRH" name="senhaRH" aria-describedby="emailHelp" />
                            </div>
                        </div>
                    </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar_rh" name="confirmar_rh" class="btn btn-outline-success" style="border-radius: 15px;">Cadastrar</button>
                        </div>
                    </center>
                </form>

        </div>
                    </div>

                    <div>
        <h3 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-clipboard"><B> CADASTRO: GESTORES</B></i></h2>
    </div>

           <div class="container" style="border: 1px solid silver; width: 80%; border-radius: 10px; padding: 25px; margin-bottom: 35px">
            <div>
                <form action="admin.2.php" method="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>LOGIN:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="loginGestor" name="loginGestor" aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>SENHA:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="senhaGestor" name="senhaGestor" aria-describedby="emailHelp" />
                            </div>
                        </div>
                    </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar_gestor" name="confirmar_gestor" class="btn btn-outline-success" style="border-radius: 15px;">Cadastrar</button>
                        </div>
                    </center>
                </form>

        </div>
                    </div>

                    <div>
                    <h3 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-clipboard"><B> CADASTRO: LOGÍSTICA</B></i></h2>
    </div>

           <div class="container" style="border: 1px solid silver; width: 80%; border-radius: 10px; padding: 25px; margin-bottom: 35px">
            <div>
                <form action="admin.2.php" method="post">
                    <div class="row justify-content-center text-left">
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>LOGIN:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="loginLogistica" name="loginLogistica" aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="form-group col-6 flex-column d-flex">
                            <label><B>SENHA:</b></label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="senhaLogistica" name="senhaLogistica" aria-describedby="emailHelp" />
                            </div>
                        </div>
                    </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar_logistica" name="confirmar_logistica" class="btn btn-outline-success" style="border-radius: 15px;">Cadastrar</button>
                        </div>
                    </center>
                </form>

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
                    Nessa tela você pode cadastrar os usuários que acessarão o sistema.
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
         alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</>");
     } else {
         //echo "Conexao realizada com sucesso";
     }
    
    $confirmarSeguranca = $_POST['confirmar_seguranca'];
    $confirmarRH = $_POST['confirmar_rh'];
    $confirmarGestor = $_POST['confirmar_gestor'];
    $confirmarLogistica = $_POST['confirmar_logistica'];

    $loginSeguranca = $_POST['loginSeguranca'];
    $senhaSeguranca = $_POST['senhaSeguranca'];

    $loginRH = $_POST['loginRH'];
    $senhaRH = $_POST['senhaRH'];

    $loginGestor = $_POST['loginGestor'];
    $senhaGestor = $_POST['senhaGestor'];

    $loginLogistica = $_POST['loginLogistica'];
    $senhaLogistica = $_POST['senhaLogistica'];


    if (isset($confirmarSeguranca)) {
        
        $sql = "INSERT INTO `usuarios`(`id`, `usuario`, `senha`, `nivel`, `ativo`, `cadastro`) VALUES (null, '$loginSeguranca', sha1('$senhaSeguranca'), '2', '1', NOW())";
        

            $comparar = "SELECT * FROM `usuarios` WHERE (`usuario` = '" . $loginSeguranca . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Este Usuário já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($loginSeguranca == null || $senhaSeguranca == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Segurança do Trabalho cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O Segurança do Trabalho Não Foi Cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }      
    };

    if (isset($confirmarRH)) {
        
        $sql = "INSERT INTO `usuarios`(`id`, `usuario`, `senha`, `nivel`, `ativo`, `cadastro`) VALUES (null, '$loginRH', sha1('$senhaRH'), '4', '1', NOW())";
        

            $comparar = "SELECT * FROM `usuarios` WHERE (`usuario` = '" . $loginRH . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Este Usuário já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($loginRH == null || $senhaRH == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Usuário de RH cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O Usuário Não Foi Cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }      
    };

    if (isset($confirmarGestor)) {
        
        $sql = "INSERT INTO `usuarios`(`id`, `usuario`, `senha`, `nivel`, `ativo`, `cadastro`) VALUES (null, '$loginGestor', sha1('$senhaGestor'), '1', '1', NOW())";
        

            $comparar = "SELECT * FROM `usuarios` WHERE (`usuario` = '" . $loginGestor . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Este Usuário já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($loginGestor == null || $senhaGestor == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Usuário de Gestoria cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O Usuário Não Foi Cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }      
    };
    
    if (isset($confirmarLogistica)) {
        
        $sql = "INSERT INTO `usuarios`(`id`, `usuario`, `senha`, `nivel`, `ativo`, `cadastro`) VALUES (null, '$loginLogistica', sha1('$senhaLogistica'), '3', '1', NOW())";
        

            $comparar = "SELECT * FROM `usuarios` WHERE (`usuario` = '" . $loginLogistica . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Este Usuário já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($loginLogistica == null || $senhaLogistica == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Usuário de Logística Cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O Usuário não Foi Cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }      
    };
    ?>
</body>

</html>