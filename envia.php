<?php
$nomeremetente  = $_POST['nome'];
$aluno= $_POST['aluno'];
$emailremetente    = trim($_POST['email']);
$emaildestinatario = 'nelfabbri@gmail.com'; // Digite seu e-mail aqui, lembrando que este arquivo deve estar em seu servidor web
$cel= $_POST['cel'];
$res= $_POST['res'];
$periodo = $_POST['periodo'];
$mensagem = $_POST['texto'];
  
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>FORMULARIO PREENCHIDO NO SITE WWW.FABBRI.PRO.BR</P>
<p><b>Nome:</b> '.$nomeremetente.'
<p><b>Aluno:</b> '.$aluno.'
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Fone Cel.:</b> '.$cel.'
<p><b>Fone Res.:</b> '.$res.'
<p><b>Periodo:</b> '.$periodo.'
<p><b>Mensagem:</b> '.$mensagem.'</p><hr>';
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser  mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, 'Contato do Site', $mensagemHTML, $headers); 
 
 if ($envio)
echo "<script>
	window.alert('Mensagem Enviada com Sucesso !'); 
	window.location.href='../index.php';
	</script>"; // Página que será redirecionada
?>