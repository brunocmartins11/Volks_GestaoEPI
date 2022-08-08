<?php
$conexao = mysql_connect('localhost','root','','');

if($conexao === false){
    die("Erro na conexâo." . mysqli_connect_error());
}
?>