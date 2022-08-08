<?php
session_start();

if (isset($_SESSION["id_usuario"]) && $_SESSION['id_usuario'] === true){
    header("location: index.html");
    exit;
}
?>