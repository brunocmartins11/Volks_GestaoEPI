<?php
include "conexao.php";

  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
      header("Location: http://localhost/gestaoepi/codes/login.html"); exit;
  }

  $usuario = $_POST['login'];
  $senha = $_POST['senha'];

  // Validação do usuário/senha digitados
  $sql = "SELECT `id`, `nivel` FROM `usuarios` WHERE (`usuario` = '". $usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
  $query = mysqli_query($conn, $sql);


  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Login inválido!"; exit;
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);

      if (!isset($_SESSION)) session_start();

      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];
      

  }

  if (isset($_SESSION['UsuarioID']) AND ($_SESSION['UsuarioNivel'] == 1)) {

    
    // Redireciona o visitante de volta pro login
    header("Location: http://localhost/gestaoepi/codes/Gestor/telaGestor.php");

}elseif (isset($_SESSION['UsuarioID']) AND ($_SESSION['UsuarioNivel'] == 2)) {
    // Redireciona o visitante de volta pro login
    header("Location: http://localhost/gestaoepi/codes/SegurancaDoTrabalho/telaSeguranca.php");

}elseif (isset($_SESSION['UsuarioID']) AND ($_SESSION['UsuarioNivel'] == 3)) {
    // Redireciona o visitante de volta pro login
    header("Location: http://localhost/gestaoepi/codes/Logistica/telaLogistica.php");
}
elseif (isset($_SESSION['UsuarioID']) AND ($_SESSION['UsuarioNivel'] == 4)) {
    // Redireciona o visitante de volta pro login
    header("Location: http://localhost/gestaoepi/codes/RH/telaRH.php");
}
elseif (isset($_SESSION['UsuarioID']) AND ($_SESSION['UsuarioNivel'])== 5) {
    // Redireciona o visitante de volta pro login
    header("Location: http://localhost/gestaoepi/codes/admin/admin.php");
}
else{
    session_destroy();
    header("Location: http://localhost/gestaoepi/codes/login.html"); exit;
}


?>