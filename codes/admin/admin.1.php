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
    <a href="admin.1.php" class="active">
        <i class="fa fa-helmet-safety"></i>
        <span>Cadastro de novos campos</span>
    </a>

    <a href="admin.2.php">
            <i class="fa fa-user-plus"></i>
            <span>Cadastro de usuários</span>
        </a>
</div>

    <div>
        <h2 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-pen"><B> CADASTRO DE NOVOS CAMPOS</B></i></h2>
    </div>

    <div class="container" style="border: 5px solid black; width: 80%; border-radius: 10px; padding: 25px;">
    <div>
        <h3 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-helmet-safety"><B> SEGURANÇA DO TRABALHO</B></i></h2>
    </div>

    <center>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px; margin-bottom: 35px">
            <div>
                <form action="admin.1.php" method="post">
                    <div class="row justify-content-center text-left">
                                                    <label>Cadastrar novo <B>TIPO DE EPI:</b></label>
                        <div class="form-group col-8 flex-column d-flex">
                            <div class="input-group mb-3">
                                <input class="form-control" list="nomeTipo" name="nomeTipo" aria-describedby="emailHelp" />
                                <datalist id="nomeTipo" name="nomeTipo">
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

                                $selectDepartamentos = "SELECT * FROM `tipoepi`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['nomeTipo']; ?>">
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                            </div>
                        </div>
                    </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar_tipo" name="confirmar_tipo" class="btn btn-outline-primary" style="border-radius: 15px;">Confirmar</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>

    </center>

    <div>
        <h3 style="font-family: 'Roboto', sans-serif; text-align: center;"><i class="fa fa-id-card"><B> RECURSOS HUMANOS</B></i></h2>
    </div>

    <center>
    <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px; margin-bottom: 20px">
            <div>
                <form action="admin.1.php" method="post">
                    <div class="row justify-content-center text-left">
                    <label>Cadastrar nova <B>EMPRESA:</b></label>
                        <div class="form-group col-8 flex-column d-flex">
                            
                            <div class="input-group mb-3">
                                <input class="form-control" list="nomeEmpresa" name="nomeEmpresa" aria-describedby="emailHelp" />
                                <datalist id="nomeEmpresa" name="nomeEmpresa">
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

                                $selectDepartamentos = "SELECT * FROM `empresas`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['nomeEmpresa']; ?>">
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                            </div>
                        </div>
                    </div>

                    </div>
                    <center>
                        <div>
                            <button type="submit" id="confirmar_empresa" name="confirmar_empresa" class="btn btn-outline-primary" style="border-radius: 15px;">Confirmar</button>
                        </div>
                    </center>
                </form>

        </div>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px; margin-bottom: 20px">
            <div>
                <form action="admin.1.php" method="post">
                    <div class="row justify-content-center text-left">

                        <label style="margin-bottom: 25px">Cadastrar novo <B>DEPARTAMENTO:</b></label>

                        <div class="form-group col-8 flex-column d-flex">
                            
                            <div>
                            <label>Código do Departamento</b></label>
                                <input class="form-control" list="codDepartamento" name="codDepartamento" aria-describedby="emailHelp" />
                                <datalist id="codDepartamento" name="codDepartamento">
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

                                $selectDepartamentos = "SELECT * FROM `departamentos`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codDepartamento']; ?>"><?php echo $rowDepartamentos['nomeDepartamento']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                            </div>

                        <div>
                           <label>Nome do Departamento:</label>
                                <input class="form-control" list="nomeDepartamento" name="nomeDepartamento" aria-describedby="emailHelp" />
                                <datalist id="nomeDepartamento" name="nomeDepartamento">
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

                                $selectDepartamentos = "SELECT * FROM `departamentos`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['nomeDepartamento']; ?>">
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>

                        <div>
                            <label>Código da Empresa</b></label>
                                <input class="form-control" list="codEmpresa" name="codEmpresa" aria-describedby="emailHelp" />
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
                                    alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</>");
                                } else {
                                    //echo "Conexao realizada com sucesso";
                                }

                                $selectDepartamentos = "SELECT * FROM `empresas`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codEmpresa']; ?>"><?php echo $rowDepartamentos['nomeEmpresa']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>
                    </div>
                </div>

                    <center>
                        <div>
                            <button type="submit" id="confirmar_departamento" name="confirmar_departamento" class="btn btn-outline-primary" style="border-radius: 15px;">Confirmar</button>
                        </div>
                    </center>
                </form>
                                        </div>

        </div>

        <div class="container" style="border: 1px solid silver; width: 50%; border-radius: 10px; padding: 25px;">
            <div>
                <form action="admin.1.php" method="post">
                <label style="margin-bottom: 25px">Cadastrar novo <B>GHE:</b></label>
                    <div class="row justify-content-center text-left">

                    

                        <div class="form-group col-8 flex-column d-flex">

                            <div>
                            <label>Código do GHE</b></label>
                                <input class="form-control" list="codGHE" name="codGHE" aria-describedby="emailHelp" />
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
                                    alert('Falha na Conexão: .')" . mysqli_connect_error() . ";</>");
                                } else {
                                    //echo "Conexao realizada com sucesso";
                                }

                                $selectDepartamentos = "SELECT * FROM `ghe`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codGHE']; ?>"><?php echo $rowDepartamentos['nomeGHE']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                            </div>

                        <div>
                           <label>Nome do GHE:</label>
                                <input class="form-control" list="nomeGHE" name="nomeGHE" aria-describedby="emailHelp" />
                                <datalist id="nomeGHE" name="nomeGHE">
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

                                $selectDepartamentos = "SELECT * FROM `ghe`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['nomeGHE']; ?>">
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>

                        <div>
                            <label>Código da Empresa</b></label>
                                <input class="form-control" list="codEmpresa1" name="codEmpresa1" aria-describedby="emailHelp" />
                                <datalist id="codEmpresa1" name="codEmpresa1">
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

                                $selectDepartamentos = "SELECT * FROM `empresas`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codEmpresa']; ?>"><?php echo $rowDepartamentos['nomeEmpresa']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>

                        <div>
                            <label>Código do Departamento</b></label>
                                <input class="form-control" list="codDepartamento1" name="codDepartamento1" aria-describedby="emailHelp" />
                                <datalist id="codDepartamento1" name="codDepartamento1">
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

                                $selectDepartamentos = "SELECT * FROM `departamentos`";
                                $result = mysqli_query($conn, $selectDepartamentos);

                                while ($rowDepartamentos = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $rowDepartamentos['codDepartamento']; ?>"><?php echo $rowDepartamentos['nomeDepartamento']; ?>
                                    </option><?php

                                            }
                                                ?>
                            </datalist>
                        </div>
                    </div>
                </div>

            </div>
                    <center>
                        <div>
                            <button type="submit" id="confirmar_ghe" name="confirmar_ghe" class="btn btn-outline-primary" style="border-radius: 15px;">Confirmar</button>
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
                    Nessa tela você pode cadastrar novos campos caso os usuários solicitem.
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


    $confirmarEmpresa = $_POST['confirmar_empresa'];
    $confirmarDepartamento = $_POST['confirmar_departamento'];
    $confirmarGHE = $_POST['confirmar_ghe'];
    $confirmarTipo = $_POST['confirmar_tipo'];
    
    $codDepartamento = $_POST['codDepartamento'];
    $codDepartamento1 = $_POST['codDepartamento1'];
    $codGHE = $_POST['codGHE'];


    $codEmpresa = $_POST['codEmpresa'];
    $codEmpresa1 = $_POST['codEmpresa1'];

    $nomeEmpresa = $_POST['nomeEmpresa'];
    $nomeDepartamento = $_POST['nomeDepartamento'];
    $nomeGHE = $_POST['nomeGHE'];
    $nomeTipo = $_POST['nomeTipo'];


    if (isset($confirmarTipo)) {
        $sql = "INSERT INTO `tipoepi`(`codTipo`, `nomeTipo`) VALUES (null, '$nomeTipo')";
        

        $comparar = "SELECT * FROM `tipoepi` WHERE (`nomeTipo` = '" . $nomeTipo . "')";

        $result = mysqli_query($conn, $comparar);
    
        if (mysqli_num_rows($result) >= 1) {
            echo "<script>
    alert('Este Tipo de EPI já Existe!');
    </script>";
            mysqli_error($conn);
        }
        else{
            if ($nomeTipo == null) {
            echo "<script>
  alert('Preencha todos campos do formulário.');
  </script>";
    }else if (mysqli_query($conn, $sql)) {
                echo "<script>
        alert('Tipo de EPI cadastrado com Sucesso!');
        </script>";
                mysqli_free_result($result);
            } else {
                echo "<script>
        alert('O TIpo de EPI Não Foi Cadastrado');
        </script>";
            }
            mysqli_error($conn);
        }      
    };

    if (isset($confirmarEmpresa)) {
        
        $sql = "INSERT INTO `empresas`(`codEmpresa`, `nomeEmpresa`) VALUES (null, '$nomeEmpresa')";
        

            $comparar = "SELECT * FROM `empresas` WHERE (`nomeEmpresa` = '" . $nomeEmpresa . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Esta Empresa já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($nomeEmpresa == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Empresa cadastrada com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('A Empresa Não Foi Cadastrada');
            </script>";
                }
                mysqli_error($conn);
            }      
    };

    if (isset($confirmarDepartamento)) {

        $sql = "INSERT INTO `departamentos`(`codDepartamento`, `nomeDepartamento`, `codEmpresa`) VALUES ('$codDepartamento', '$nomeDepartamento', '$codEmpresa')";
        

            $comparar = "SELECT * FROM `departamentos` WHERE (`codDepartamento` = '" . $codDepartamento . "') OR (`nomeDepartamento` = '" . $nomeDepartamento . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Esta Departamento já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($codDepartamento == null || $nomeDepartamento == null || $codEmpresa == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('Departamento Cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O Departamento Não Foi Cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }      


    };
    if (isset($confirmarGHE)) {
        $sql = "INSERT INTO `ghe`(`codGHE`, `nomeGHE`, `codEmpresa`, `codDepartamento`) VALUES ('$codGHE', '$nomeGHE', '$codEmpresa1', '$codDepartamento1')";
        

            $comparar = "SELECT * FROM `ghe` WHERE (`codGHE` = '" . $codGHE . "') OR (`nomeGHE` = '" . $nomeGHE . "')";

            $result = mysqli_query($conn, $comparar);
        
            if (mysqli_num_rows($result) >= 1) {
                echo "<script>
        alert('Este GHE já Existe!');
        </script>";
                mysqli_error($conn);
            }
            else{
                if ($codGHE == null || $nomeGHE == null || $codEmpresa1 == null || $codDepartamento1 == null) {
                echo "<script>
      alert('Preencha todos campos do formulário.');
      </script>";
        }else if (mysqli_query($conn, $sql)) {
                    echo "<script>
            alert('GHE Cadastrado com Sucesso!');
            </script>";
                    mysqli_free_result($result);
                } else {
                    echo "<script>
            alert('O GHE Não Foi Cadastrado');
            </script>";
                }
                mysqli_error($conn);
            }      



    };

?>
</body>

</html>